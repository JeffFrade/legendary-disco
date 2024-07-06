<?php

namespace App\Http;

use App\Interfaces\ProdutoExceptionInterface;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProdutoController
{
    private $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    public function index(Request $request)
    {
        try {
            return response()->json([
                'data' => $this->produtoService->index($request->all())
            ], 200);
        } catch (ProdutoExceptionInterface $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function store(Request $request)
    {
        $data = $this->toValidate($request);

        return response()->json([
            'data' => $this->produtoService->store($data)
        ], 200);
    }

    protected function toValidate(Request $request)
    {
        return \Validator::make($request->all(), [
            'nome' => 'required|max:120',
            'id_categoria' => 'required|numeric',
            'preco' => 'required|numeric',
            'foto' => [
                'required',
                File::image()
            ],
            'situacao' => 'required|boolean'
        ])->validate();
    }
}
