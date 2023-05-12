<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\EmailVerifier;
use Symfony\Component\Mime\Address;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

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
     * @Route("/profile/", name="view_profile")
     */
    public function viewProfile()
    {
        return $this->render('security/profile.html.twig');  
    }

    /**
     * @Route("/editprofile/", name="edit_profile")
     */
    public function editProfile(ManagerRegistry $doctrine, Request $request)
    {

        $user = $this->getUser();
        $oldEmail = $user->getEmail();

        $repository = $doctrine->getRepository(User::class);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $newEmail = $form->get('email')->getData();
            
            if($newEmail != $oldEmail){

                $this->getUser()->setIsVerified(false);

                $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                    (new TemplatedEmail())
                        ->from(new Address('admin@microdonjon.fr', 'Admin Microdonjon'))
                        ->to($newEmail)
                        ->subject('Confirmation de l\'adresse mail')
                        ->htmlTemplate('registration/confirmation_email.html.twig')
                );
            }

            $user = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('view_profile');
        }

        return $this->render('security/edit_profile.html.twig', [
            'formUser' =>$form->createView()
        ]);

    }

}
