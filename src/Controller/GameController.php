<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\Combat;
use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
use App\Service\PathChecker;
use App\Entity\ChapCondition;
use App\Service\StatsManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

        $entityManager = $doctrine->getManager();
 
        
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
    public function displayStandard(ManagerRegistry $doctrine, Chapitre $chapitre, StatsManager $statsManager, PathChecker $pathChecker): Response
    {

        $check = $pathChecker->checkPath($chapitre);
        if(!$check){
            return $this->render('game/tricheur.html.twig');
        }

        $repository = $doctrine->getRepository(ChapStandard::class);
        $entityManager = $doctrine->getManager();
        $chapStandard = $repository->findOneBy(['chapitre' => $chapitre]);


        //On vérifie que le joueur n'est pas déjà passé par ce chapitre pour appliquer les effets
        if(!$this->getUser()->getChapitres()->contains($chapitre)){
            
            //Si de l'or doit être récupéré/perdu
            if($chapStandard->getModifGold()){

                if($this->getUser()->getGold() + $chapStandard->getModifGold() < 0){
                    $manque = -($this->getUser()->getGold() + $chapStandard->getModifGold());
                    return $this->render('game/needgold.html.twig', ['manque' => $manque]);
                }
                else{
                     $this->getUser()->setGold($this->getUser()->getGold() + $chapStandard->getModifGold()); 
                    $entityManager->persist($this->getUser());
                    $entityManager->flush(); 
                }
            }

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

            //Si des PV doivent être récupérés/perdus
            if($chapStandard->getModifPV()){
                $modifPV = $chapStandard->getModifPV();
                $statsManager->changePV($modifPV);
                //On fait la modification de PV depuis un Service pour éviter de répéter le code dans Combat + Boire potion etc.
            }

            //Si l'attaque doit être modifiée
            if($chapStandard->getModifAttaque()){
                $this->getUser()->setAttaque($this->getUser()->getAttaque() + $chapStandard->getModifAttaque()); 
                $entityManager->persist($this->getUser());
                $entityManager->flush(); 
            }
        }

        //On ajoute la zone à l'historique de l'utilisateur
        if($chapitre->getZone()){
            $this->getUser()->addVisite($chapitre->getZone());
        }
        //On ajoute le chapitre à l'historique de l'utilisateur
        $this->getUser()->addChapitre($chapitre);
        //Et on définit le chapitre en cours
        $this->getUser()->setChapitreEnCours($chapitre->getId());
        $entityManager->persist($this->getUser());
        $entityManager->flush();


        return $this->render('game/standard.html.twig', [
            'chapitre' => $chapitre,
            'chapStandard' => $chapStandard
        ]);

    }

    /**
     * @Route("/game/combat/{id}", name="display_combat")
     */
    public function displayCombat(ManagerRegistry $doctrine, Chapitre $chapitre, PathChecker $pathChecker): Response
    {

        $repository = $doctrine->getRepository(ChapCombat::class);
        $entityManager = $doctrine->getManager();

        $chapCombat = $repository->findOneBy(['chapitre' => $chapitre]);

        $check = $pathChecker->checkPath($chapitre);
        if(!$check){
            return $this->render('game/tricheur.html.twig');
        }

        if(!$this->getUser()->getChapitres()->contains($chapitre)){
            $combat=new Combat;
            $combat->setAventurier($this->getUser());
            $combat->setMonstres($chapCombat->getMonstre());
            $combat->setPVactuelsMonstre($chapCombat->getMonstre()->getPVmaxMonstre());

            $entityManager->persist($combat);
            $entityManager->flush(); 
        }
        else{
            //Aller chercher le bon combat dans la base de données
            $repositoryCombat = $doctrine->getRepository(Combat::class);
            $combat = $repositoryCombat->findOneBy(['aventurier' => $this->getUser(), 'monstres' => $chapCombat->getMonstre() ]);
        }    

        //On ajoute la zone à l'historique de l'utilisateur
        if($chapitre->getZone()){
            $this->getUser()->addVisite($chapitre->getZone());
        }        
        //On ajoute le chapitre à l'historique de l'utilisateur
        $this->getUser()->addChapitre($chapitre);
        //Et on définit le chapitre en cours
        $this->getUser()->setChapitreEnCours($chapitre->getId());
        $entityManager->persist($this->getUser());
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
    public function displayCondition(ManagerRegistry $doctrine, Chapitre $chapitre, PathChecker $pathChecker): Response
    {

        $repository = $doctrine->getRepository(ChapCondition::class);
        $entityManager = $doctrine->getManager();
        $chapCondition = $repository->findOneBy(['chapitre' => $chapitre]);

        $check = $pathChecker->checkPath($chapitre);
        if(!$check){
            return $this->render('game/tricheur.html.twig');
        }

        $itemCondition = $chapCondition->getItemCondition();
        $inventaire = $this->getUser()->getInventaire();

        $condition = false;
        if($inventaire->contains($itemCondition)){
            $condition = true;
        }

        //On ajoute la zone à l'historique de l'utilisateur
        if($chapitre->getZone()){
            $this->getUser()->addVisite($chapitre->getZone());
        }        
        //On ajoute le chapitre à l'historique de l'utilisateur
        $this->getUser()->addChapitre($chapitre);
        //Et on définit le chapitre en cours
        $this->getUser()->setChapitreEnCours($chapitre->getId());
        $entityManager->persist($this->getUser());
        $entityManager->flush();

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

        $repository = $doctrine->getRepository(Item::class);
        $dague = $repository->findOneBy(['id' => '1']);
        $armure_cuir = $repository->findOneBy(['id' => '2']);
        $user->addInventaire($dague);
        $user->addInventaire($armure_cuir);
        
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('home/index.html.twig');

    }

    /**
     * @Route("/game_over", name="game_over")
     */
    public function gameOver(ManagerRegistry $doctrine, StatsManager $statsManager){

        $repository = $doctrine->getRepository(Item::class);
        $entityManager = $doctrine->getManager();

        $inventaire = $this->getUser()->getInventaire();
        $gourde = $repository->findOneBy(['id' => '5']);
        $eau = $repository->findOneBy(['id' => '6']);
        $potion = $repository->findOneBy(['id' => '7']);

        if($inventaire->contains($eau)){
            //On ajoute les pv, on retire l'eau de l'inventaire, on ajoute la gourde vide et on redirige vers la page où on boit
            $this->getUser()->removeInventaire($eau); 
            $this->getUser()->addInventaire($gourde); 
            $statsManager->changePV(25);
            $entityManager->persist($this->getUser());
            $entityManager->flush(); 
            return $this->render('game/gameover.html.twig', ['boire' => true, 'boisson' => "l'eau revigorante",]);
        }
        if($inventaire->contains($potion)){
            $this->getUser()->removeInventaire($potion); 
            $this->getUser()->addInventaire($gourde);
            $statsManager->changePV(50);
            $entityManager->persist($this->getUser());
            $entityManager->flush(); 
            return $this->render('game/gameover.html.twig', ['boire' => true, 'boisson' => "la potion de soin",]);
        }

        return $this->render('game/gameover.html.twig', ['boire' => false, 'boisson' => " ",]);
    }

    /**
     * @Route("/combattre/{idcombat}/{idchap}/{idchapcombat}", name="combattre")
     * @ParamConverter("combat", options={"mapping" : {"idcombat": "id"}})
     * @ParamConverter("chapitre", options={"mapping": {"idchap": "id"}})
     * @ParamConverter("chapCombat", options={"mapping": {"idchapcombat": "id"}})
     */
    public function combattre(Combat $combat, Chapitre $chapitre, ChapCombat $chapCombat, ManagerRegistry $doctrine, StatsManager $statsManager){
        
        for($i = 0; $i <= 3; $i++){
            $lancersDes[$i]= rand(1, 6);
        }

        $totalJoueur = $lancersDes[0] + $lancersDes[1] + $this->getUser()->getAttaque();
        $totalMonstre = $lancersDes[2] + $lancersDes[3] + $combat->getMonstres()->getAttaqueMonstre();

        $itemRepository = $doctrine->getRepository(Item::class);

        $inventaire = $this->getUser()->getInventaire();
        $bottes = $itemRepository->findOneBy(['id' => '14']);
        $cape = $itemRepository->findOneBy(['id' => '15']);

        if($totalJoueur>$totalMonstre){ //Le joueur inflige des dégâts à la créature
            if($lancersDes[0] + $lancersDes[1]>=11){ // Ces dégâts sont critiques
                if($inventaire->contains($bottes) && rand(1, 6) == 6 ){ //Ces dégâts sont amplifiés par les botts
                    $texteCombat = "<div class='game__box game__getAttack'>Les bottes de vivacité vous permettent d'infliger un second coup à la suite d'un coup critique ! Vous infligez 5 dégats à la créature</div>";
                    $combat->setPVactuelsMonstre($combat->getPVactuelsMonstre() - 5);
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($combat);
                    $entityManager->flush();
                }
                else{ // Dégâts critiques non amplifiés par les bottes
                    $texteCombat = "<div class='game__box game__getAttack'> Coup Critique ! Vous infligez 3 dégâts à la créature</div>";
                    $combat->setPVactuelsMonstre($combat->getPVactuelsMonstre() - 3);
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($combat);
                    $entityManager->flush();
                }
            }
            else{                
                if($inventaire->contains($bottes) && rand(1, 6) == 6 ){ //Dégâts normaux amplifiés par les bottes
                    $texteCombat = "<div class='game__box game__getAttack'>Les bottes de vivacité vous permettent d'infliger deux coups  d'affilée ! Vous infligez 4 dégats à la créature</div>";
                    $combat->setPVactuelsMonstre($combat->getPVactuelsMonstre() - 4);
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($combat);
                    $entityManager->flush();
                }
                else{ // Dégâts normaux
                    $texteCombat = "<div class='game__box game__getItem'> Vous infligez 2 dégâts à la créature</div>";
                    $combat->setPVactuelsMonstre($combat->getPVactuelsMonstre() - 2);
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($combat);
                    $entityManager->flush();
                }
            }
        }
        elseif($totalJoueur<$totalMonstre){ //La créature inflige des dégâts au joueur
            if($lancersDes[0] + $lancersDes[1] <= 3){ // Dégâts critiques
                if($inventaire->contains($cape) && rand(1, 6) == 1 ){ // Dégâts critiques atténués par la capt
                    $texteCombat = "<div class='game__box game__loseHP'>Désorientée par la cape trompe-l'oeil, la créature ne vous inflige qu'un point de dégât</div>";
                    $statsManager->changePV(-1);   
                }
                else{ // Dégâts critiques non atténués
                    $texteCombat = "<div class='game__box game__loseHP'>Blessure critique ! La créature vous inflige 3 dégâts</div>";
                    $statsManager->changePV(-3);
                }
            }
            else{
                if($inventaire->contains($cape) && rand(1, 6) == 1 ){ // Dégâts normaux annulés par l'attaque
                    $texteCombat = "<div class='game__box game__getItem'>La créature est désorientée par la cape trompe-l'oeil, vous esquivez son attaque</div>";
                }
                else{ // Dégâts normaux
                    $texteCombat = "<div class='game__box game__loseHP'>La créature vous inflige 2 dégâts</div>";
                    $statsManager->changePV(-2);
                }
            }
        }
        else{
            $texteCombat = "<div class='game__box game__getItem'>La créature et vous esquivez mutuellement vos attaques</div>";
        }

        return $this->render('game/combat.html.twig', [
            'chapitre' => $chapitre,
            'chapCombat' => $chapCombat,
            'combat' => $combat,
            'attaque' => true, 
            'lancers' => $lancersDes, 
            'texteCombat' => $texteCombat,
            'totalJoueur' => $totalJoueur,
            'totalMonstre' => $totalMonstre,
        ]);  

    }

}
