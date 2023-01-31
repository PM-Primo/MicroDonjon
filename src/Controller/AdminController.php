<?php

namespace App\Controller;

use App\Entity\Chapitre;
use App\Entity\ChapCombat;
use App\Entity\ChapStandard;
use App\Entity\SortieCombat;
use App\Entity\ChapCondition;
use App\Entity\SortieStandard;
use App\Entity\SortieCondition;
use Doctrine\Persistence\ManagerRegistry;
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
                $repositorySortieStandard = $doctrine->getRepository(SortieStandard::class);
                $sorties = $repositorySortieStandard->findBy(['chapStandard' => $chapStandard]);
            }
            elseif($chapitre->getTypePage() == "Combat"){
                $repositoryChapCombat = $doctrine->getRepository(ChapCombat::class);
                $chapCombat = $repositoryChapCombat->findOneBy(['chapitre' => $chapitre]);
                $repositorySortieCombat = $doctrine->getRepository(SortieCombat::class);
                $sorties = $repositorySortieCombat->findBy(['chapCombat' => $chapCombat]);
            }
            elseif($chapitre->getTypePage() == "Condition"){
                $repositoryChapCondition = $doctrine->getRepository(ChapCondition::class);
                $chapCondition = $repositoryChapCondition->findOneBy(['chapitre' => $chapitre]);
                $repositorySortieCondition = $doctrine->getRepository(SortieCondition::class);
                $sorties = $repositorySortieCondition->findBy(['chapCondition' => $chapCondition]);
            }

            array_push($tableauChapitre, $sorties);
            array_push($grandTableau, $tableauChapitre);
        }
        
        return $this->render('admin/editor.html.twig', [
            'tableauTotal' => $grandTableau,
        ]);

    }

    /**
     * @Route("/edit/routing/{id}", name="edit_routing")
     */
    public function editRouting(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {

        $entityManager = $doctrine->getManager();
 
        
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
    public function editStandard(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {
    
    }

    /**
     * @Route("/edit/combat/{id}", name="edit_combat")
     */
    public function editCombat(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {
    
    }

    /**
     * @Route("/edit/condition/{id}", name="edit_condition")
     */
    public function editCondition(ManagerRegistry $doctrine, Chapitre $chapitre): Response
    {
    
    }

}
