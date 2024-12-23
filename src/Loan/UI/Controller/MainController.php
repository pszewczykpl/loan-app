<?php

namespace App\Loan\UI\Controller;

use App\Loan\Model\ProviderRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class MainController extends AbstractController
{
    public function __invoke(
        ProviderRepositoryInterface $providerRepository,
    ): Response {
        return $this->render('base.html.twig', [
            'providers' => $providerRepository->findAll(),
        ]);
    }
}
