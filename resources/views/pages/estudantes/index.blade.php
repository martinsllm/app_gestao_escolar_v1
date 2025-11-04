
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
                    <form action="{{ route('estudantes.index') }}" method="GET">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <x-label>Matrícula</x-label>
                                <x-input name="matricula" placeholder="Matrícula" value="{{ $request->matricula ?? '' }}" />
                                <p class="text-xs italic">Opcional. Informe a matrícula do estudante</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <x-label>Nome</x-label>
                                <x-input name="nome_completo" placeholder="Nome" value="{{ $request->nome ?? '' }}" />
                                <p class="text-xs italic">Opcional. Informe o nome do estudante</p>
                            </div>
                        </div>
                        <div class="w-full px-3 md:mb-0 mt-5" align="right">
                            <x-button type="button" class="bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-gray-900">Adicionar</x-button>
                            <x-button>Pesquisar</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
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
                                    <td class="px-6 py-4"><a href="{{ route('export.estudante', $e->id) }}" target="_blank">Consultar Relatório</a></td>
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