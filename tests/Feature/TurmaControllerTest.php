<?php

namespace Tests\Feature;

use App\Models\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TurmaControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_index_returns_successful_response(): void
    {
        Turma::factory()->create();

        $response = $this->getJson('/api/v1/turmas');

        $this->assertTrue(is_array(json_decode($response->getContent())));
        $response->assertStatus(200);
    }

    public function test_store_returns_successful_response(): void
    {
        $data = [
            'codigo' => '101'
        ];

        $response = $this->postJson('/api/v1/turmas', $data);

        $response->assertStatus(201);
        $this->assertEquals($data['codigo'], $response->json()['codigo']);
        $this->assertDatabaseHas('turmas', $data);

    }

    public function test_store_validation_error_response()
    {
        $data = [
            'codigo' => ''
        ];

        $response = $this->postJson('/api/v1/turmas', $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('turmas', $data);
    }

    public function test_show_returns_successful_response(): void
    {
        $turma = Turma::factory()->create();

        $response = $this->getJson("/api/v1/turmas/{$turma->id}");

        $response->assertStatus(200);
        $this->assertEquals($turma->codigo, $response->json()['codigo']);
    }

    public function test_show_returns_not_found_response(): void
    {
        $response = $this->getJson("/api/v1/turmas/999");

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }

    public function test_update_returns_successful_response(): void
    {
        $turma = Turma::factory()->create();

        $data = [
            'codigo' => '202'
        ];

        $response = $this->putJson("/api/v1/turmas/{$turma->id}", $data);

        $response->assertStatus(200);
        $this->assertEquals($data['codigo'], $response->json()['codigo']);
        $this->assertDatabaseHas('turmas', array_merge(['id' => $turma->id], $data));
    }

    public function test_update_returns_not_found_response(): void
    {
        $data = [
            'codigo' => '202'
        ];

        $response = $this->putJson("/api/v1/turmas/999", $data);

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
        $this->assertDatabaseMissing('turmas', $data);
    }

    public function test_update_validation_error_response()
    {
        $turma = Turma::factory()->create();

        $data = [
            'codigo' => ''
        ];

        $response = $this->putJson("/api/v1/turmas/{$turma->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('turmas', $data);
    }

    public function test_destroy_returns_successful_response(): void
    {
        $turma = Turma::factory()->create();

        $response = $this->deleteJson("/api/v1/turmas/{$turma->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $this->assertDatabaseMissing('turmas', ['id' => $turma->id]);
    }

    public function test_destroy_returns_not_found_response(): void
    {
        $response = $this->deleteJson("/api/v1/turmas/999");

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }
}
