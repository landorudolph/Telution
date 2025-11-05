<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/api/customers', name: 'customer_index', methods: ['GET'])]
    public function index(CustomerRepository $repository, Request $request): JsonResponse
    {
        $query = $request->query->get('query');
        $customers = $repository->findBySearchQuery($query);
        return $this->json($customers);
    }

    #[Route('/api/customers/{id}/favorite', name: 'customer_toggle_favorite', methods: ['PATCH'])]
    public function toggleFavorite(Customer $customer, EntityManagerInterface $em): JsonResponse
    {
        $customer->setFavorite(!$customer->isFavorite());
        $em->flush();
        return $this->json($customer);
    }
}
