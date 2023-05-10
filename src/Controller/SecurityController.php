<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    /**
     * @Route("/profile/{id}", name="view_profile")
     */
    public function viewProfile(User $user)
    {
        if($this->getUser() == $user){
            return $this->render('security/profile.html.twig', [
                'user' => $user,
            ]);  
        }
        else{
            return $this->render('home/index.html.twig'); 
        }
    }

    /**
     * @Route("/editprofile/{id}", name="edit_profile")
     */
    public function editProfile(ManagerRegistry $doctrine, User $user, Request $request)
    {
        if($this->getUser() == $user){

            $repository = $doctrine->getRepository(User::class);
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $user = $form->getData();

                $entityManager = $doctrine->getManager();
                $entityManager->persist($user);
                $entityManager->flush(); 

                return $this->redirectToRoute('view_profile', ['id' => $user->getId()]);
            }

            return $this->render('security/edit_profile.html.twig', [
                'formUser' =>$form->createView(),
                'user' => $user
            ]);

        }
        else{
            return $this->render('home/index.html.twig'); 
        }
    }

}
