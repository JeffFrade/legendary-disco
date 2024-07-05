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

    public function store(Request $request)
    {
        $data = $this->toValidate($request);

        return response()->json([
            'data' => $this->categoriaService->store($data)
        ], 200);
    }

    protected function toValidate(Request $request)
    {
        return \Validator::make($request->all(), [
            'nome' => 'required|max:35',
            'situacao' => 'required|boolean',
        ])->validate();
    }
}
