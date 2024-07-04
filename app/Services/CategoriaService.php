<?php

namespace App\Services;

use App\Exceptions\CategoriaNotFoundException;
use App\Repositories\CategoriaRepository;

class CategoriaService
{
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index(array $data)
    {
        $categorias = $this->categoriaRepository->index($data['situacao'] ?? null);

        if (count($categorias) <= 0) {
            throw new CategoriaNotFoundException('Categoria inexistente', 404);
        }

        return $categorias;
    }
}
