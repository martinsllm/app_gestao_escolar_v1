<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Ocorrências</title>
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


    <h2>Relatório de Ocorrências</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Data da Ocorrência</th>
                <th>Estudante</th>
                <th>Medida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ocorrencias as $ocorrencia)
                <tr>
                    <td>{{ $ocorrencia->id }}</td>
                    <td>{{ $ocorrencia->descricao }}</td>
                    <td>{{ $ocorrencia->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $ocorrencia->estudante->nome_completo }}</td>
                    <td>{{ $ocorrencia->medida->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>