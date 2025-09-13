<?php

namespace Tests\Feature;

use App\Models\Estudante;
use App\Models\Medida;
use App\Models\Ocorrencia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OcorrenciaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_successful_response()
    {
        $response = $this->getJson('/api/v1/ocorrencias');

        $response->assertStatus(200);
        $this->assertTrue(is_array(json_decode($response->getContent())));
    }

    public function test_store_returns_successful_response()
    {
        $estudante = Estudante::factory()->create();
        $medida = Medida::factory()->create([
            'descricao' => 'Advertência verbal',
        ]);

        $data = [
            'descricao' => 'This is a test ocorrencia.',
            'estudante_id' => $estudante->id,
            'medida_id' => $medida->id,
        ];

        $response = $this->postJson('/api/v1/ocorrencias', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('ocorrencias', $data);
    }

    public function test_store_validation_error()
    {
        $data = [
            'descricao' => 'teste',
            'estudante_id' => null,
            'medida_id' => null,
        ];

        $response = $this->postJson('/api/v1/ocorrencias', $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('ocorrencias', $data);
    }

    public function test_show_returns_successful_response()
    {
        $ocorrencia = Ocorrencia::factory()->create();

        $response = $this->getJson("/api/v1/ocorrencias/{$ocorrencia->id}");

        $response->assertStatus(200);
        $this->assertEquals($ocorrencia->descricao, $response->json()['descricao']);
    }

    public function test_show_returns_not_found_response()
    {
        $response = $this->getJson('/api/v1/ocorrencias/999');

        $response->assertStatus(404);
        $response->assertJson(['message' => 'Ocorrencia not found']);
    }

    public function test_update_returns_successful_response()
    {
        $ocorrencia = Ocorrencia::factory()->create();

        $estudante = Estudante::factory()->create();
        $medida = Medida::factory()->create([
            'descricao' => 'Advertência verbal',
        ]);

        $updateData = [
            'descricao' => 'Updated ocorrencia description.',
            'estudante_id' => $estudante->id,
            'medida_id' => $medida->id,
        ];

        $response = $this->putJson("/api/v1/ocorrencias/{$ocorrencia->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('ocorrencias', array_merge(['id' => $ocorrencia->id], $updateData));
    }

    public function test_update_validation_error_response()
    {
        $ocorrencia = Ocorrencia::factory()->create();

        $estudante = Estudante::factory()->create();

        $medida = Medida::factory()->create([
            'descricao' => 'Advertência verbal',
        ]);

        $updateData = [
            'descricao' => 'Up',
            'estudante_id' => $estudante->id,
            'medida_id' => $medida->id,
        ];

        $response = $this->putJson("/api/v1/ocorrencias/{$ocorrencia->id}", $updateData);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('ocorrencias', array_merge(['id' => $estudante->id], $updateData));
    }

    public function test_update_returns_not_found_response()
    {
        $data = [
            'descricao' => 'Updated ocorrencia description.',
            'estudante_id' => 1,
            'medida_id' => 1,
        ];

        $response = $this->putJson('/api/v1/ocorrencias/999', $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
    }

    public function test_destroy_returns_successful_response()
    {
        $ocorrencia = Ocorrencia::factory()->create();

        $response = $this->deleteJson("/api/v1/ocorrencias/{$ocorrencia->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('ocorrencias', ['id' => $ocorrencia->id]);
    }

    public function test_destroy_not_found()
    {
        $response = $this->deleteJson('/api/v1/ocorrencias/999');

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
        $response->assertJson(['message' => 'Ocorrencia not found']);
    }
}
