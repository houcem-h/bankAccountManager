<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Client;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Client::class);
        $client = $repo->findAll();

        return $this->render('client/index.html.twig', [
            'clients' => $client,
        ]);
    }

    /**
     * @Route("/client/insertClient", name="client_new")
     */
    public function insert(Request $request)
    {
        $client = new Client();
        $form = $this->createFormBuilder($client)
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom du client',
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Prénom du client',
                ]
            ])
            ->add('dateNaissance', DateType::class, [
                'format' => 'yyyy-MM-dd',
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'placeholder' => 'Adresse complète',
                ]
            ])
            ->add('tel', IntegerType::class, [
                'attr' => [
                    'placeholder' => '(+216)xxxxxxxx',
                ]
            ])
            ->add('save', SubmitType::class, array('label' => 'Enregistrer', 'attr' => ['class' => 'btn-primary']))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('client');
        }

        return $this->render('client/insert.html.twig', [
            'formClient' => $form->createView()
        ]);
    }

    /**
     * @Route("/client/{id}", name="client_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Client::class);
        $client = $repo->find($id);

        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/client/delete/{id}", name="client_delete")
     */
    public function delete($id)
    {
        $repo = $this->getDoctrine()->getManager();
        $client = $repo->getRepository(Client::class)->find($id);

        $repo->remove($client);
        $repo->flush();

        return $this->redirectToRoute('client');
    }
}
