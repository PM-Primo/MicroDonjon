<?php

namespace App\Controller;

use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
use App\Entity\SortieCombat;
use App\Form\ChapCombatType;
use App\Entity\ChapCondition;
use App\Entity\SortieStandard;
use App\Form\ChapStandardType;
use App\Entity\SortieCondition;
use App\Form\ChapConditionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/editor", name="admin_editor")
     */
    public function openEditor(ManagerRegistry $doctrine): Response
    {

        $repository = $doctrine->getRepository(Chapitre::class);
        $allChapitres = $repository->findAll();
        $grandTableau = [];

        foreach($allChapitres as $chapitre){

            $tableauChapitre = [];
            array_push($tableauChapitre, $chapitre);

            if($chapitre->getTypePage() == "Standard"){
                //On récupère toutes les sorties possibles et on fait un tableau avec le chapitre + ses sorties Et on array push ce tableau dans un grand tableau de tableaux avec tous les chapitres
                $repositoryChapStandard = $doctrine->getRepository(ChapStandard::class);
                $chapStandard = $repositoryChapStandard->findOneBy(['chapitre' => $chapitre]);
                $sorties = $chapStandard->getSorties();
            }
            elseif($chapitre->getTypePage() == "Combat"){
                $repositoryChapCombat = $doctrine->getRepository(ChapCombat::class);
                $chapCombat = $repositoryChapCombat->findOneBy(['chapitre' => $chapitre]);
                $sorties = $chapCombat->getSorties();
            }
            elseif($chapitre->getTypePage() == "Condition"){
                $repositoryChapCondition = $doctrine->getRepository(ChapCondition::class);
                $chapCondition = $repositoryChapCondition->findOneBy(['chapitre' => $chapitre]);
                $sorties = $chapCondition->getSorties();
            }

            array_push($tableauChapitre, $sorties);
            array_push($grandTableau, $tableauChapitre);
        }
        
        return $this->render('admin/editor.html.twig', [
            'tableauTotal' => $grandTableau,
        ]);
        
    }
    
    /**
     * @Route("/add/standard", name="add_standard")
     */
    public function addStandard(ManagerRegistry $doctrine, Request $request){

        $form = $this->createForm(ChapStandardType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre = new Chapitre;
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapitre->setTypePage("Standard");
            $chapStandard = new ChapStandard;
            $chapStandard = $form->getData();
            $chapStandard->setChapitre($chapitre);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapStandard);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        return $this->render('admin/chapstandard_add.html.twig', [
            'formAddChapStandard' =>$form->createView(),
        ]);
    }

    /**
     * @Route("/add/combat", name="add_combat")
     */
    public function addCombat(ManagerRegistry $doctrine, Request $request){

        $form = $this->createForm(ChapCombatType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre = new Chapitre;
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapitre->setTypePage("Combat");
            $chapCombat = new ChapCombat;
            $chapCombat = $form->getData();
            $chapCombat->setChapitre($chapitre);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapCombat);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        return $this->render('admin/chapcombat_add.html.twig', [
            'formAddChapCombat' =>$form->createView(),
        ]);
    }

    /**
     * @Route("/add/condition", name="add_condition")
     */
    public function addCondition(ManagerRegistry $doctrine, Request $request){

        $form = $this->createForm(ChapConditionType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre = new Chapitre;
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapitre->setTypePage("Condition");
            $chapCondition = new ChapCondition;
            $chapCondition = $form->getData();
            $chapCondition->setChapitre($chapitre);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapCondition);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        return $this->render('admin/chapcondition_add.html.twig', [
            'formAddChapCondition' =>$form->createView(),
        ]);
    }


    /**
     * @Route("/edit/routing/{id}", name="edit_routing")
     */
    public function editRouting(Chapitre $chapitre): Response
    {
       
        //On redirige vers la fonction d'affichage correspondant au type de chapitre
        $type = $chapitre->getTypePage();
        if($type == 'Standard'){
            return $this->redirectToRoute('edit_standard', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Combat'){
            return $this->redirectToRoute('edit_combat', ['id' => $chapitre->getId()]);
        }
        elseif($type == 'Condition'){
            return $this->redirectToRoute('edit_condition', ['id' => $chapitre->getId()]);
        }

        return $this->redirectToRoute('app_home');
    }

    /**
     * @Route("/edit/standard/{id}", name="edit_standard")
     */
    public function editStandard(ManagerRegistry $doctrine, Chapitre $chapitre, Request $request): Response
    {    
        $repositoryChapStandard = $doctrine->getRepository(ChapStandard::class);
        $chapStandard = $repositoryChapStandard->findOneBy(['chapitre' => $chapitre]);

        $form = $this->createForm(ChapStandardType::class, $chapStandard);
        $form->get('titreChapitre')->setData($chapitre->getTitreChapitre());
        $form->get('zone')->setData($chapitre->getZone());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapStandard = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapStandard);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        //Vue pour afficher le formulaire d'ajout
        return $this->render('admin/chapstandard_add.html.twig', [
            'formAddChapStandard' =>$form->createView(),
            'chapitre' => $chapitre
        ]);
    }

    /**
     * @Route("/edit/combat/{id}", name="edit_combat")
     */
    public function editCombat(ManagerRegistry $doctrine, Chapitre $chapitre, Request $request): Response
    {
        $repositoryChapCombat = $doctrine->getRepository(ChapCombat::class);
        $chapCombat = $repositoryChapCombat->findOneBy(['chapitre' => $chapitre]);

        $form = $this->createForm(ChapCombatType::class, $chapCombat);
        $form->get('titreChapitre')->setData($chapitre->getTitreChapitre());
        $form->get('zone')->setData($chapitre->getZone());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapCombat = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapCombat);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        //Vue pour afficher le formulaire d'ajout
        return $this->render('admin/chapcombat_add.html.twig', [
            'formAddChapCombat' =>$form->createView(),
            'chapitre' => $chapitre
        ]);
    }

    /**
     * @Route("/edit/condition/{id}", name="edit_condition")
     */
    public function editCondition(ManagerRegistry $doctrine, Chapitre $chapitre, Request $request): Response
    {
        $repositoryChapCondition = $doctrine->getRepository(ChapCondition::class);
        $chapCondition = $repositoryChapCondition->findOneBy(['chapitre' => $chapitre]);

        $form = $this->createForm(ChapConditionType::class, $chapCondition);
        $form->get('titreChapitre')->setData($chapitre->getTitreChapitre());
        $form->get('zone')->setData($chapitre->getZone());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $chapitre->setTitreChapitre($form->get("titreChapitre")->getData());
            $chapitre->setZone($form->get("zone")->getData());
            $chapCondition = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($chapitre);
            $entityManager->persist($chapCondition);
            $entityManager->flush(); 

            return $this->redirectToRoute('admin_editor');
        }

        //Vue pour afficher le formulaire d'ajout
        return $this->render('admin/chapcondition_add.html.twig', [
            'formAddChapCondition' =>$form->createView(),
            'chapitre' => $chapitre
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {
        $entityManager = $doctrine->getManager();
        
        //On redirige vers la fonction d'affichage correspondant au type de chapitre
        $type = $chapitre->getTypePage();

        if($type == 'Standard'){
            $repositoryStandard = $doctrine->getRepository(ChapStandard::class);
            $chapStandard = $repositoryStandard->findOneBy(['chapitre' => $chapitre]);

            return $this->render('admin/show_standard.html.twig', [
                'chapitre' => $chapitre,
                'chapStandard' => $chapStandard
            ]);
        }
        elseif($type == 'Combat'){
            $repositoryCombat = $doctrine->getRepository(ChapCombat::class);
            $chapCombat = $repositoryCombat->findOneBy(['chapitre' => $chapitre]);

            return $this->render('admin/show_combat.html.twig', [
                'chapitre' => $chapitre,
                'chapCombat' => $chapCombat
            ]);        
        }
        elseif($type == 'Condition'){
            $repositoryCondition = $doctrine->getRepository(ChapCondition::class);
            $chapCondition = $repositoryCondition->findOneBy(['chapitre' => $chapitre]);

            return $this->render('admin/show_condition.html.twig', [
                'chapitre' => $chapitre,
                'chapCondition' => $chapCondition
            ]);   
        }

        return $this->redirectToRoute('app_home');
    }

    /**
     * @Route("/delete/chapitre/{id}", name="delete")
     */
    public function delete(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {
        $entityManager = $doctrine->getManager();
        $type = $chapitre->getTypePage();
        
        switch ($type) {
            case 'Standard':
                $repositoryStandard = $doctrine->getRepository(ChapStandard::class);
                $chapStandard = $repositoryStandard->findOneBy(['chapitre' => $chapitre]);
                $entityManager->remove($chapStandard);
                $entityManager->flush();
            break;

            case 'Combat':
                $repositoryCombat = $doctrine->getRepository(ChapCombat::class);
                $chapCombat = $repositoryCombat->findOneBy(['chapitre' => $chapitre]);
                $entityManager->remove($chapCombat);
                $entityManager->flush();            
            break;

            case 'Condition':
                $repositoryCondition = $doctrine->getRepository(ChapCondition::class);
                $chapCondition = $repositoryCondition->findOneBy(['chapitre' => $chapitre]);
                $entityManager->remove($chapCondition);
                $entityManager->flush();
            break;

        }

        return $this->redirectToRoute('admin_editor');

    }

}
