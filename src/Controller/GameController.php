<?php

namespace App\Controller;

use App\Entity\Combat;
use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
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
    public function routing(Chapitre $chapitre): Response
    {
        $type = $chapitre->getTypePage();
        if($type == 'Standard'){
            return $this->redirectToRoute('display_standard', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Combat'){
            return $this->redirectToRoute('display_combat', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Condition'){
            //return $this->redirectToRoute('display_condition', ['id' => $chapitre->getId()]);
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

        if($chapStandard->getItemPrendre()){
            $this->getUser()->addInventaire($chapStandard->getItemPrendre()); 
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

}
