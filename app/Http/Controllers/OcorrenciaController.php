<?php

namespace App\Http\Controllers;

use App\Http\Requests\OcorrenciaRequest;
use App\Services\OcorrenciaService;

class OcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->ocorrenciaService->list();

        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OcorrenciaRequest $request)
    {
        $result = $this->ocorrenciaService->store($request->all());

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->ocorrenciaService->findByPk($id);

        if (!$result) {
            return response()->json(['message' => 'Ocorrencia not found'], 404);
        }

        return response()->json($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OcorrenciaRequest $request, string $id)
    {
        $ocorrencia = $this->ocorrenciaService->findByPk($id);

        if (!$ocorrencia) {
            return response()->json(['message' => 'Ocorrencia not found'], 404);
        }

        $result = $this->ocorrenciaService->update($ocorrencia, $request->all());

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ocorrencia = $this->ocorrenciaService->findByPk($id);

        if (!$ocorrencia) {
            return response()->json(['message' => 'Ocorrencia not found'], 404);
        }

        $this->ocorrenciaService->delete($ocorrencia);

        return response()->json(['message' => 'Ocorrencia deleted successfully'], 200);
    }
}
