<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
  #[Route('/clients/voitures', name: 'voitures')]
  public function voitures(VoitureRepository $repository): Response
  {
    $voitures = $repository->findAll();
    return $this->render('voiture/voitures.html.twig', [
      'voitures' => $voitures,
    ]);
  }
}