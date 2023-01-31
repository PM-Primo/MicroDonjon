<?php

namespace App\Controller;

use App\Entity\Chapitre;
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
        
        return $this->render('admin/editor.html.twig', [
            'chapitres' => $allChapitres
        ]);
        
    }

}
