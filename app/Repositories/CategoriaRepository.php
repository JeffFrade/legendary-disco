<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Models\Categoria;

class CategoriaRepository extends AbstractRepository
{
    public function __construct(Categoria $categoria)
    {
        $this->model = $categoria;
    }

    public function index(?bool $situacao = null)
    {
        $model = $this->model;

        if (!is_null($situacao)) {
            $model = $model->where('situacao', $situacao);
        }

        return $model->get();
    }
}
