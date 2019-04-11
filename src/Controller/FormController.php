<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Account;
use App\Form\FormType;
use App\Entity\LoginAccount;
use App\Form\LoginFormType;

class FormController extends AbstractController
{   
    /**
     * @Route("/inscription", name="form")
     */
    public function form(Request $request,  ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {       
        $account = new Account();

        dump($account);

        $form = $this->createForm(FormType::class, $account);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($account, $account->getPassword());
            $account->setPassword($hash);

            $manager->persist($account);
            $manager->flush();

            dump($account);

            return  $this->redirectToRoute('login');
        
        }

        return $this->render('form/form.html.twig', [   
            'controller_name' => 'FormController',
            'form' => $form->createView()
        ]);
       
    }

    /**
     * @Route("/connexion", name="login")
     */
    public function login(Request $request, ObjectManager $manager,  UserPasswordEncoderInterface $encoder)
    {
       $login_account = new LoginAccount();

       $loginform = $this->createForm(LoginFormType::class, $login_account);

            $loginform->handleRequest($request);

            if($loginform->isSubmitted() && $loginform->isValid()){
                
                $hash = $encoder->encodePassword($login_account->getPassword());
                $login_account->setPassword($hash);
                
                dump($request);
                $manager->persist();
                $manager->flush();
            }

       return $this->render('security/login.html.twig', [
          'form' => $loginform->createView()
       ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logOut()
    {
        
    }

}
