<?php

namespace App\Http\Controllers;

use App\Services\TurmaService;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function __construct(public TurmaService $turmaService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->turmaService->list();

        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
