<?php

namespace App\Http;

use App\Interfaces\ProdutoExceptionInterface;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

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
}
