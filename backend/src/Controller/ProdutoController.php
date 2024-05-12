<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    #[Route('/produtos', methods={"GET"})]
    public function getProdutos(ProdutoRepository $produtoRepository): Response
    {
        $produtos = $produtoRepository->findAll();
        return $this->json($produtos);
    }

    #[Route('/produtos', methods={"POST"})]
    public function addProduto(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $produto = new Produto();
        $produto->setNome($data['nome']);
        $produto->setDescricao($data['descricao']);
        $produto->setPreco($data['preco']);
        $produto->setCategoria($data['categoria']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produto);
        $entityManager->flush();

        return $this->json($produto);
    }

    #[Route('/produtos/{id}', methods={"PUT"})]
    public function updateProduto($id, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $produto = $entityManager->getRepository(Produto::class)->find($id);

        if (!$produto) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $data = json_decode($request->getContent(), true);
        $produto->setNome($data['nome']);
        $produto->setDescricao($data['descricao']);
        $produto->setPreco($data['preco']);
        $produto->setCategoria($data['categoria']);

        $entityManager->flush();

        return $this->json($produto);
    }

    #[Route('/produtos/{id}', methods={"DELETE"})]
    public function deleteProduto($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $produto = $entityManager->getRepository(Produto::class)->find($id);

        if (!$produto) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $entityManager->remove($produto);
        $entityManager->flush();

        return $this->json(['message' => 'Product deleted']);
    }
}
