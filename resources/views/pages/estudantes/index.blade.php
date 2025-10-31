
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estudantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-table>
                        <x-slot:head>
                            <th scope="col" class="px-6 py-3">Matrícula</th>
                            <th scope="col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3">Turma</th>
                            <th scope="col" class="px-6 py-3">E-mail</th>
                            <th scope="col" class="px-6 py-3">Opções</th>
                        </x-slot>
                        <x-slot:body>
                            @foreach ($result as $e)
                                <tr>
                                    <td class="px-6 py-4">{{ $e->matricula }}</td>
                                    <td class="px-6 py-4">{{ $e->nome_completo }}</td>
                                    <td class="px-6 py-4">{{ $e->turma->codigo }}</td>
                                    <td class="px-6 py-4">{{ $e->email }}</td>
                                    <td class="px-6 py-4"></td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table>
                    {{ $result->links() }}
                </div>
            </div>
        </div>
    </div>

   

</x-app-layout>