<?php

namespace App\Controller;

use App\Entity\ShoppingList;
use App\Form\ShoppingListType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('shopping')]
final class ShoppingListController extends AbstractController
{
    #[Route('/add', name: 'add_list', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $List = new ShoppingList();
        $form = $this->createForm(ShoppingListType::class, $List);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($List);
            $entityManager->flush();
            $this->addFlash('success', 'Shopping list added!');
            return $this->redirectToRoute('add_list');
        }

        return $this->render('shopping_list/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
