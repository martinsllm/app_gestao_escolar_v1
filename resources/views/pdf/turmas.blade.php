<!DOCTYPE html>
<html>

<head>
    <title>Turma</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .header-image {
            width: 200px;
            height: auto;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <!-- Insira a imagem aqui -->
    <!-- Pode ser um caminho relativo armazenado no storage ou uma imagem online -->
    <img src="{{ public_path('img/logo.png') }}" alt="Logo da Empresa" class="header-image">


    <h2>Turma: {{ $turma->codigo }}</h2>
    <p>Data do Relatório: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome Completo</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turma->estudantes as $t)
                <tr>
                    <td>{{ $t->matricula }}</td>
                    <td>{{ $t->nome_completo }}</td>
                    <td>{{ $t->data_nascimento->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>