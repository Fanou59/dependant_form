<?php

namespace App\Controller;

use App\Form\FormulaireDependantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/', name: 'app_demo')]
    public function index(): Response
    {
        $form = $this->createForm(FormulaireDependantType::class);

        return $this->render('demo/index.html.twig', [
            'controller_name' => 'DemoController',
            'form' => $form
        ]);
    }
}
