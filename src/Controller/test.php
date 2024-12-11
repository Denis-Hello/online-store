<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class test extends AbstractController
{
    #[Route('/test')]
    public function go(): Response
    {
        return $this->render('home/home_page.html.twig');
    }
}
