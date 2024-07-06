<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Models\Produto;

class ProdutoRepository extends AbstractRepository
{
    public function __construct(Produto $produto)
    {
        $this->model = $produto;
    }

    public function index(?string $nome = null, ?int $idCategoria = null)
    {
        $model = $this->model->with('categoria');

        if (!is_null($idCategoria)) {
            $model = $model->where('id_categoria', $idCategoria);
        }

        if (!is_null($nome)) {
            $model = $model->where('nome', 'LIKE', '%' . $nome . '%');
        }

        return $model->paginate();
    }
}
