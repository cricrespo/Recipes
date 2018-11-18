<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\SearchRecipes;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {   

        $recipes = new SearchRecipes();
        $resul = $recipes->getRecipes();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'recipes' => $resul,
        ]);
    }

    public function getVegetarian()
    {
        $recipes = new SearchRecipes();
        $vegetarian = $recipes->getVegetarian();

        return $this->render('default/vegetarian.html.twig', [
            'controller_name' => 'DefaultController',
            'recipes' => $vegetarian,
        ]); 
    }
}
