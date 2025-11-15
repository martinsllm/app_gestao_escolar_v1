<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ocorrencias') }}
        </h2>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('ocorrencias.index') }}" method="GET">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <x-label>Medida</x-label>
                                <select value="{{ $request->medida_id ?? old('medida_id') }}" name="medida_id" id="medida_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Selecione uma medida</option>
                                    @foreach ($medidas as $medida)
                                        <option value="{{ $medida->id }}">{{ $medida->descricao }}</option>
                                    @endforeach
                                </select>
                                <p class="text-xs italic">Opcional. Selecione uma opção</p>
                            </div>
                            <div class="w-full px-3 md:mb-0 mt-5" align="right">
                                <x-button>Pesquisar</x-button>
                            </div>
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
                    <div align="right">
                        <a class="uppercase text-sm px-5 py-2.5" href="">+ Nova</a>
                        <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'xlsx']) }}">xlsx</a>
                        <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'csv']) }}">csv</a>
                        <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'pdf']) }}" target="_blank">pdf</a>
                    </div>

                    <x-table>
                        <x-slot:head>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Estudante</th>
                            <th scope="col" class="px-6 py-3">Descrição</th>
                            <th scope="col" class="px-6 py-3">Medida</th>
                        </x-slot:head>
                        <x-slot:body>
                            @foreach ($result as $o)
                                <tr>
                                    <td class="px-6 py-4">{{ $o->id }}</td>
                                    <td class="px-6 py-4">{{ $o->estudante->nome_completo }}</td>
                                    <td class="px-6 py-4">{{ $o->descricao }}</td>
                                    <td class="px-6 py-4">{{ $o->medida->descricao }}</td>
                                </tr>
                            @endforeach
                        </x-slot:body>
                    </x-table>
                    {{ $result->links() }}
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>