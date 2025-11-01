
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
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Matrícula</label>
                                <input type="text" name="matricula" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Matrícula" value="{{ $request->matricula ?? '' }}">
                                <p class="text-xs italic">Opcional. Informe a matrícula do estudante</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome</label>
                                <input type="text" name="nome_completo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Nome" value="{{ $request->nome ?? '' }}">
                                <p class="text-xs italic">Opcional. Informe o nome do estudante</p>
                            </div>
                        </div>
                        <div class="w-full px-3 md:mb-0 mt-5" align="right">
                            <button class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900" type="submit">Pesquisar</button>
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