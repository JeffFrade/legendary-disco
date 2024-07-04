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

    public function index()
    {
        $categorias = $this->categoriaRepository->allNoTrashed();

        if (count($categorias) <= 0) {
            throw new CategoriaNotFoundException('Categoria inexistente', 404);
        }

        return $categorias;
    }
}
