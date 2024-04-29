<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function homepage(): Response
    {
        $starshipCount = 457;
        $myShip = [
            'name' => 'USS LeafyCruiser (NNC-001)',
            'class' => 'Garden',
            'captain' => 'Daniyal Namdar',
            'status' => 'under construction',
        ];

        return $this->render('main/homepage.html.twig', [
            'numberOfStarships' => $starshipCount,
            'myShip' => $myShip,
        ]);
    }
}
