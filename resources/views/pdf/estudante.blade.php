<!DOCTYPE html>
<html>

<head>
    <title>Estudante</title>
    <link rel="stylesheet" href="{{ public_path('css/style.css') }}" />
</head>

<body>

    <!-- Insira a imagem aqui -->
    <!-- Pode ser um caminho relativo armazenado no storage ou uma imagem online -->
    <img src="{{ public_path('img/logo.png') }}" alt="Logo da Empresa" class="header-image">


    <p>Aluno: {{ $estudante->nome_completo }}</p>
    <p>Matrícula: {{ $estudante->matricula }}</p>
    <p>Turma: {{ $estudante->turma->codigo }}</p>
    <p>Data de Nascimento: {{ $estudante->data_nascimento->format('d/m/Y') }}</p>
    <p>Telefone: {{ $estudante->telefone_responsavel }}</p>
    <p>Email: {{ $estudante->email }}</p>

    @if ($estudante->ocorrencias->count() > 0)
    <h2>Ocorrências</h2>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Medida</th>
                <th>Data de aplicação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudante->ocorrencias as $ocorrencia)
                <tr>
                    <td>{{ $ocorrencia->id }}</td>
                    <td>{{ $ocorrencia->descricao }}</td>
                    <td>{{ $ocorrencia->medida->descricao }}</td>
                    <td>{{ $ocorrencia->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
</body>

</html>