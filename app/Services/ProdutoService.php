<?php

namespace App\Services;
use App\Exceptions\ProdutoNotFoundException;
use App\Repositories\ProdutoRepository;

class ProdutoService
{
    private $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function index(array $data)
    {
        $nome = $data['nome'] ?? null;
        $idCategoria = $data['id_categoria'] ?? null;

        $produtos = $this->produtoRepository->index($nome, $idCategoria);

        if (count($produtos) <= 0) {
            throw new ProdutoNotFoundException('Produto inexistente.', 404);
        }

        return $produtos;
    }

    public function store(array $data)
    {
        return $this->produtoRepository->create($data);
    }
}
