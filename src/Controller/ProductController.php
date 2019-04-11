<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BikeRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/vélos", name="product")
     */
    public function product(BikeRepository $repository)
    {
        $bikes = $repository->findAll();

        return $this->render('product/product.html.twig', [
            'controller_name' => 'ProductController',
            'bikes' => $bikes
        ]);
    }
}
