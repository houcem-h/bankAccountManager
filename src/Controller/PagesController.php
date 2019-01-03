<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends AbstractController
{
    /**
     * @Route("/pages", name="pages")
     */
    public function index()
    {
        return $this->render('pages/index.html.twig', [
            'app_name' => 'DSIbank',
        ]);
    }


    /**
     *
     */
    public function about()
    {
        return $this->render('pages/about.html.twig', [
            'app_name' => 'DSIbank',
        ]);
    }

    public function services()
    {
        return $this->render('pages/services.html.twig', [
            'app_name' => 'DSIbank',
            'servivesList' => ['Création compte', 'Versement', 'Retrait', 'Transfert']
        ]);
    }
}
