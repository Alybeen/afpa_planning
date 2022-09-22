<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainboardController extends AbstractController
{
    #[Route('/mainboard', name: 'App_Mainboard')]
    public function index(): Response
    {
        return $this->render('mainboard/mainboard.html.twig', [
            'controller_name' => 'MainboardController',
        ]);
    }
}

?>