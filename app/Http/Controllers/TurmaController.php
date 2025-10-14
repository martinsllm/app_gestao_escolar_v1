<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Services\TurmaService;
use App\Traits\ApiResponse;

class TurmaController extends Controller
{
    use ApiResponse;

    public function __construct(public TurmaService $turmaService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->turmaService->list();

        return $this->response($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurmaRequest $request)
    {
        $result = $this->turmaService->store($request->all());

        return $this->response($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->turmaService->findByPk($id);

        if (!$result) {
            return $this->response(['message' => 'Turma not found'], 404);
        }

        return $this->response($result, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurmaRequest $request, string $id)
    {
        $turma = $this->turmaService->findByPk($id);

        if (!$turma) {
            return $this->response(['message' => 'Turma not found'], 404);
        }

        $result = $this->turmaService->update($turma, $request->all());
        return $this->response($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turma = $this->turmaService->findByPk($id);

        if (!$turma) {
            return $this->response(['message' => 'Turma not found'], 404);
        }

        $this->turmaService->delete($turma);

        return $this->response(['message' => 'Turma deleted successfully'], 200);
    }
}
