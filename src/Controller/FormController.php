<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilder;

class FormController extends AbstractController
{
    /**
     * @Route("/inscription", name="form")
     */
    public function form(Request $request)
    {   
        $form = $this->createFormBuilder()
                     ->add('email', EmailType::class, ['class' => 'form-control'])
                     ->add('password', PasswordType::class, [['class' => 'form-control']])
                     ->getForm()
                     ;

        return $this->render('form/form.html.twig', [   
            'controller_name' => 'FormController',
            'form' => $form->createView()
        ]);
    }
}
