<?php

namespace App\Controller;

use App\Entity\RechercheVoiture;
use App\Form\RechercheVoitureType;
use App\Repository\VoitureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(VoitureRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
      $rechercheVoiture = new RechercheVoiture();
  
      $form = $this->createForm(RechercheVoitureType::class, $rechercheVoiture);
      $form->handleRequest($request);
  
      $voitures = $paginator->paginate(
        $repository->findAllWithPagination($rechercheVoiture),
        $request->query->getInt('page', 1),
        6
      );
      return $this->render('voiture/voitures.html.twig', [
        'voitures' => $voitures,
        'form'=>$form->createView(),
        'admin' => true
      ]);
    }
}
