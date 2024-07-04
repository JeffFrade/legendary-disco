<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Interfaces\CategoriaExceptionInterface;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index(Request $request)
    {
        try {
            return response()->json([
                'data' => $this->categoriaService->index($request->all())
            ], 200);
        } catch (CategoriaExceptionInterface $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode());
        }
    }
}
