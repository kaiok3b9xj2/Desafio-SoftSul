<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PedidoApiController extends Controller
{
    public function index()
    {
        return response()->json(Pedido::all());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'data_pedido' => 'required|date',
                'data_entrega' => 'nullable|date',
                'status' => 'required|string',
                // Adicione outros campos necessários
            ]);

            $pedido = Pedido::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Pedido criado com sucesso',
                'data' => $pedido
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar pedido'
            ], 500);
        }
    }

    // Aplicar mesma lógica de validação e tratamento de erros nos outros métodos
}
