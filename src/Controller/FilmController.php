<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmType;
use App\Form\RegistrationFormType;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FilmController extends AbstractController
{
    #[Route('/', name: 'app_film')]
    public function index(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }

    #[Route('/add', name: 'app_film_add')]
    public function add(Request $request): Response
    {
        $film = new Films();

        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $articles = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($articles);
            $em->flush();

            echo 'Envoyé';
        }

        return $this->render('film/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
