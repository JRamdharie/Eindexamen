<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {


        if ($this->isGranted('ROLE_OWNER')){
            return $this->render('owner/index.html.twig');
        }
        //wanneer je de rol 'ROLE_TEACHER' hebt wordt de teacher pagina getoond.
        if ($this->isGranted('ROLE_EMPLOYEE')){
            return $this->render('employee/index.html.twig');
        }
        if ($this->isGranted('ROLE_CUSTOMER')){
            return $this->render('customer/index.html.twig');

        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    #[Route('/behandelingen', name: 'app_default
    ')]
    public function behandelingen(): Response
    {
        return $this->render('default/behandelingen.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
