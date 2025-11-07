<?php

namespace Tests\Feature\Api;

use App\Models\Medida;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedidaControllerApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_successful_response()
    {
        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->get('/api/v1/medidas');

        $response->assertStatus(200);
        $this->assertTrue(is_array(json_decode($response->getContent())));
    }

    public function test_store_returns_successful_response()
    {
        $data = [
            'descricao' => 'Advertência verbal',
        ];

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->postJson('/api/v1/medidas', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('medidas', $data);
    }

    public function test_store_validation_error_response()
    {
        $data = [
            'descricao' => '', // Descrição vazia para testar a validação
        ];

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->postJson('/api/v1/medidas', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['descricao']);
    }

    public function test_show_returns_successful_response()
    {
        $medida = Medida::factory()->create();

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->getJson("/api/v1/medidas/{$medida->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $medida->id,
            'descricao' => $medida->descricao,
        ]);
    }

    public function test_show_not_found_response()
    {
        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->getJson('/api/v1/medidas/9999'); // ID inexistente

        $response->assertStatus(404);
    }

    public function test_update_returns_successful_response()
    {
        $medida = Medida::factory()->create();

        $data = [
            'descricao' => 'Advertência escrita',
        ];

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->putJson("/api/v1/medidas/{$medida->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('medidas', array_merge(['id' => $medida->id], $data));
    }

    public function test_update_validation_error_response()
    {
        $medida = Medida::factory()->create();

        $data = [
            'descricao' => '', // Descrição vazia para testar a validação
        ];

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->putJson("/api/v1/medidas/{$medida->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['descricao']);
    }

    public function test_update_not_found_response()
    {
        $data = [
            'descricao' => 'Advertência escrita',
        ];

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->putJson('/api/v1/medidas/9999', $data); // ID inexistente

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }

    public function test_destroy_returns_successful_response()
    {
        $medida = Medida::factory()->create();

        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->deleteJson("/api/v1/medidas/{$medida->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $this->assertDatabaseMissing('medidas', ['id' => $medida->id]);
    }

    public function test_destroy_not_found_response()
    {
        $response = $this->actingAs(
            User::factory()->create(),
            'sanctum'
        )->deleteJson('/api/v1/medidas/9999'); // ID inexistente

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }
}
