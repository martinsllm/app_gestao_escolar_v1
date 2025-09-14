<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedidaRequest;
use App\Services\MedidaService;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    public function __construct(public MedidaService $medidaService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->medidaService->list();

        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedidaRequest $request)
    {
        $result = $this->medidaService->store($request->all());

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->medidaService->findByPk($id);

        if (!$result) {
            return response()->json(['message' => 'Medida not found'], 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedidaRequest $request, string $id)
    {
        $medida = $this->medidaService->findByPk($id);

        if (!$medida) {
            return response()->json(['message' => 'Medida not found'], 404);
        }

        $result = $this->medidaService->update($medida, $request->all());

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medida = $this->medidaService->findByPk($id);

        if (!$medida) {
            return response()->json(['message' => 'Medida not found'], 404);
        }

        $this->medidaService->delete($medida);

        return response()->json(['message' => 'Medida deleted successfully'], 200);
    }
}
