<?php

namespace Tests\Feature;

use App\Models\Estudante;
use App\Models\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstudanteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_successful_response()
    {
        $response = $this->get('/api/v1/estudantes');

        $response->assertStatus(200);

        $this->assertTrue(is_array(json_decode($response->getContent())));
        $response->assertStatus(200);
    }

    public function test_store_return_successful_response()
    {
        $turma = Turma::factory()->create();

        $data = [
            'matricula' => '2023001',
            'nome_completo' => 'João da Silva',
            'data_nascimento' => '2010-08-15',
            'telefone_responsavel' => '(11) 91234-5678',
            'email' => 'joao@example.com', // Gera um email válido
            'turma_id' => $turma->id,
        ];

        $response = $this->postJson('/api/v1/estudantes', $data);
        $response->assertStatus(201);
        $this->assertEquals($data['matricula'], $response->json()['matricula']);
        $this->assertDatabaseHas('estudantes', $data);
    }

    public function test_store_validation_error_response()
    {
        $data = [
            'matricula' => '', // Campo obrigatório
            'nome_completo' => 'João da Silva',
            'data_nascimento' => '2010-08-15',
            'telefone_responsavel' => '(11) 91234-5678',
            'email' => 'invalid-email', // Formato inválido
            'turma_id' => 999, // ID de turma inexistente
        ];

        $response = $this->postJson('/api/v1/estudantes', $data);
        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('estudantes', $data);
    }

    public function test_show_returns_successful_response()
    {
        $estudante = Estudante::factory()->create();

        $response = $this->get("/api/v1/estudantes/{$estudante->id}");

        $response->assertStatus(200);
        $this->assertEquals($estudante->matricula, $response->json()['matricula']);
    }

    public function test_show_returns_not_found_response()
    {
        $response = $this->get("/api/v1/estudantes/999");

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }

    public function test_update_returns_successful_response()
    {
        $estudante = Estudante::factory()->create();
        $turma = Turma::factory()->create();

        $data = [
            'matricula' => '2023002',
            'nome_completo' => 'Maria Oliveira',
            'data_nascimento' => '2011-05-20',
            'telefone_responsavel' => '(21) 92345-6789',
            'email' => 'mari@example.com',
            'turma_id' => $turma->id,
        ];

        $response = $this->putJson("/api/v1/estudantes/{$estudante->id}", $data);

        $response->assertStatus(200);
        $this->assertEquals($data['matricula'], $response->json()['matricula']);
        $this->assertDatabaseHas('estudantes', array_merge(['id' => $estudante->id], $data));
    }

    public function test_update_returns_not_found_response()
    {
        $data = [
            'matricula' => '2023002',
            'nome_completo' => 'Maria Oliveira',
            'data_nascimento' => '2011-05-20',
            'telefone_responsavel' => '(21) 92345-6789',
            'email' => 'mari@example.com',
            'turma_id' => 999, // ID de turma inexistente
        ];
        $response = $this->putJson("/api/v1/estudantes/999", $data);
        $response->assertStatus(422);
        $response->assertJsonStructure(['message']);
        $this->assertDatabaseMissing('estudantes', $data);
    }

    public function test_update_validation_error_response()
    {
        $estudante = Estudante::factory()->create();

        $data = [
            'matricula' => '', // Campo obrigatório
            'nome_completo' => 'Maria Oliveira',
            'data_nascimento' => '2011-05-20',
            'telefone_responsavel' => '(21) 92345-6789',
            'email' => 'invalid-email', // Formato inválido
            'turma_id' => 999, // ID de turma inexistente
        ];

        $response = $this->putJson("/api/v1/estudantes/{$estudante->id}", $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message', 'errors']);
        $this->assertDatabaseMissing('estudantes', array_merge(['id' => $estudante->id], $data));
    }

    public function test_destroy_returns_successful_response()
    {
        $estudante = Estudante::factory()->create();

        $response = $this->deleteJson("/api/v1/estudantes/{$estudante->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $this->assertDatabaseMissing('estudantes', ['id' => $estudante->id]);
    }

    public function test_destroy_returns_not_found_response()
    {
        $response = $this->deleteJson("/api/v1/estudantes/999");

        $response->assertStatus(404);
        $response->assertJsonStructure(['message']);
    }


}
