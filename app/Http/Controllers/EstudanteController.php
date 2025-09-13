<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudanteRequest;
use App\Services\EstudanteService;

class EstudanteController extends Controller
{
    public function __construct(public EstudanteService $estudanteService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->estudanteService->list();

        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudanteRequest $request)
    {
        $result = $this->estudanteService->store($request->all());

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->estudanteService->findByPk($id);

        if (!$result) {
            return response()->json(['message' => 'Estudante not found'], 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudanteRequest $request, string $id)
    {
        $estudante = $this->estudanteService->findByPk($id);

        if (!$estudante) {
            return response()->json(['message' => 'Estudante not found'], 404);
        }

        $result = $this->estudanteService->update($estudante, $request->all());

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudante = $this->estudanteService->findByPk($id);

        if (!$estudante) {
            return response()->json(['message' => 'Estudante not found'], 404);
        }

        $this->estudanteService->delete($estudante);

        return response()->json(['message' => 'Estudante deleted successfully'], 200);
    }
}
