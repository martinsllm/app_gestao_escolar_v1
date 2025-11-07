<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstudanteRequest;
use App\Services\EstudanteService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class EstudanteControllerApi extends Controller
{

    use ApiResponse;

    public function __construct(public EstudanteService $estudanteService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->estudanteService->list($request);

        $result = $query->paginate(10);

        return $this->response($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudanteRequest $request)
    {
        $result = $this->estudanteService->store($request->all());

        return $this->response($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->estudanteService->findByPk($id);

        if (!$result) {
            return $this->response(['message' => 'Estudante not found'], 404);
        }

        return $this->response($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudanteRequest $request, string $id)
    {
        $estudante = $this->estudanteService->findByPk($id);

        if (!$estudante) {
            return $this->response(['message' => 'Estudante not found'], 404);
        }

        $result = $this->estudanteService->update($estudante, $request->all());

        return $this->response($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudante = $this->estudanteService->findByPk($id);

        if (!$estudante) {
           return $this->response(['message' => 'Estudante not found'], 404);
        }

        $this->estudanteService->delete($estudante);

        return $this->response(['message' => 'Estudante deleted successfully'], 200);
    }
}