<?php

namespace App\Controller;

use App\Entity\Combat;
use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
use App\Entity\ChapCondition;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="app_game")
     */
    public function index(): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/game/routing/{id}", name="routing")
     */
    public function routing(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {

        //On ajoute le chapitre à l'historique de l'utilisateur
        $this->getUser()->addChapitre($chapitre);
        //Et on définit le chapitre en cours
        $this->getUser()->setChapitreEnCours($chapitre->getId());

        $entityManager = $doctrine->getManager();
        $entityManager->persist($this->getUser());
        $entityManager->flush(); 
        
        //On redirige vers la fonction d'affichage correspondant au type de chapitre
        $type = $chapitre->getTypePage();
        if($type == 'Standard'){
            return $this->redirectToRoute('display_standard', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Combat'){
            return $this->redirectToRoute('display_combat', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Condition'){
            return $this->redirectToRoute('display_condition', ['id' => $chapitre->getId()]);
        }

        return $this->redirectToRoute('app_home');
    }

    /**
     * @Route("/game/standard/{id}", name="display_standard")
     */
    public function displayStandard(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {

        $repository = $doctrine->getRepository(ChapStandard::class);
        $entityManager = $doctrine->getManager();

        $chapStandard = $repository->findOneBy(['chapitre' => $chapitre]);

        //Si il y a un objet à récupérer
        if($chapStandard->getItemPrendre()){
            $nvItem = $chapStandard->getItemPrendre();
            $this->getUser()->addInventaire($nvItem);

            //Si l'utilisateur récupère l'armure, on augmente ses PV max
            //Si d'autres items avaient des effets "à la récupération" on aurait fait une fonction dédiée avec tous les choix
            if($nvItem->getId() == 9){
                $this->getUser()->setPVmax(125);
                $this->getUser()->setPVactuels($this->getUser()->getPVactuels() + 25);
            }
            
            $entityManager->persist($this->getUser());
            $entityManager->flush();
        }

        //Si il y a un objet à perdre
        if($chapStandard->getItemPerdre()){
            $inventaire = $this->getUser()->getInventaire();
            $item = $chapStandard->getItemPerdre();
            if($inventaire->contains($item)){
                $this->getUser()->removeInventaire($chapStandard->getItemPerdre()); 
                $entityManager->persist($this->getUser());
                $entityManager->flush(); 
            }
        }

        //Si de l'or doit être récupéré/perdu
        if($chapStandard->getModifGold()){
            $this->getUser()->setGold($this->getUser()->getGold() + $chapStandard->getModifGold()); 
            $entityManager->persist($this->getUser());
            $entityManager->flush(); 
        }

        //Si des PV doivent être récupérés/perdus
        if($chapStandard->getModifPV()){

            $modifPV = $chapStandard->getModifPV();
            $PVuser = $this->getUser()->getPVactuels();
            $PVmax = $this->getUser()->getPVmax();

            //Cas où on dépasse le max de PV
            if($PVuser + $modifPV >= $PVmax){
                $this->getUser()->setPVactuels($PVmax); 
                $entityManager->persist($this->getUser());
                $entityManager->flush(); 
            }
            if($PVuser + $modifPV <= 0){
                $this->getUser()->setPVactuels(0); 
                $entityManager->persist($this->getUser());
                $entityManager->flush();
                //Gestion de la mort à ajouter
            }
            else{
                $this->getUser()->setPVactuels($this->getUser()->getPVactuels() + $chapStandard->getModifPV()); 
                $entityManager->persist($this->getUser());
                $entityManager->flush(); 
            }
        }

        //Si l'attaque doit être modifiée
        if($chapStandard->getModifAttaque()){
            $this->getUser()->setAttaque($this->getUser()->getAttaque() + $chapStandard->getModifAttaque()); 
            $entityManager->persist($this->getUser());
            $entityManager->flush(); 
        }

        return $this->render('game/standard.html.twig', [
            'chapitre' => $chapitre,
            'chapStandard' => $chapStandard
        ]);

    }

    /**
     * @Route("/game/combat/{id}", name="display_combat")
     */
    public function displayCombat(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {

        $repository = $doctrine->getRepository(ChapCombat::class);
        $entityManager = $doctrine->getManager();

        $chapCombat = $repository->findOneBy(['chapitre' => $chapitre]);

        $combat=new Combat;
        $combat->setAventurier($this->getUser());
        $combat->setMonstres($chapCombat->getMonstre());
        $combat->setPVactuelsMonstre($chapCombat->getMonstre()->getPVmaxMonstre());      

        $entityManager->persist($combat);
        $entityManager->flush(); 

        return $this->render('game/combat.html.twig', [
            'chapitre' => $chapitre,
            'chapCombat' => $chapCombat,
            'combat' => $combat
        ]);

    }

    /**
     * @Route("/game/condition/{id}", name="display_condition")
     */
    public function displayCondition(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {

        $repository = $doctrine->getRepository(ChapCondition::class);
        $entityManager = $doctrine->getManager();

        $chapCondition = $repository->findOneBy(['chapitre' => $chapitre]);

        $itemCondition = $chapCondition->getItemCondition();
        $inventaire = $this->getUser()->getInventaire();

        $condition = false;
        if($inventaire->contains($itemCondition)){
            $condition = true;
        }

        return $this->render('game/condition.html.twig', [
            'chapitre' => $chapitre,
            'chapCondition' => $chapCondition,
            'condition' => $condition
        ]);

    }

    /**
     * @Route("/reset", name="reset")
     */
    public function reset(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $user = $this->getUser();
        $user->setPVmax(100);
        $user->setPVactuels(100);
        $user->setPVmax(100);
        $user->setGold(0);
        $user->setAttaque(10);
        $user->setChapitreEnCours(null);       

        foreach($user->getInventaire() as $item){
            $user->removeInventaire($item);
        }
        foreach($user->getChapitres() as $chapitre){
            $user->removeChapitre($chapitre);
        }
        foreach($user->getVisites() as $zone){
            $user->removeVisite($zone);
        }
        foreach($user->getCombats() as $combat){
            $entityManager->remove($combat, $flush=true);
        }
        
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('home/index.html.twig');

    }

}
