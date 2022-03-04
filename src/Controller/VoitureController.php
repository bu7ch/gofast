<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class VoitureController extends AbstractController
{
  #[Route('/clients/voitures', name: 'voitures')]
  public function voitures(VoitureRepository $repository, PaginatorInterface $paginator, Request $request): Response
  {
    $voitures = $paginator->paginate(
      $repository->findAllWithPagination(),
      $request->query->getInt('page', 1),
      6
    );
    return $this->render('voiture/voitures.html.twig', [
      'voitures' => $voitures,
    ]);
  }
}
