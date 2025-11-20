<x-app-layout>

<script src="{{ asset ("/js/fetch.js") }}" type="text/javascript"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ocorrencias') }}
        </h2>
    </x-slot> 

    <div class="py-12">
        <x-card>
            <form action="{{ route('ocorrencias.index') }}" method="GET">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-label>Estudante</x-label>
                        <x-input id="search" placeholder="Estudante" aria-readonly="true"/>
                        <input type="hidden" name="estudante_id" id="estudante_id" />
                        <p class="text-xs italic">Opcional. Informe o nome do estudante</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
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
        </x-card>       
    </div>
    
    <div class="py-5">
        <x-card>
            <div align="right">
                <a class="uppercase text-sm px-5 py-2.5" href="{{ route('ocorrencias.create') }}">+ Nova</a>
                <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'xlsx','estudante_id' => request()->estudante_id, 'medida_id' => request()->medida_id]) }}">xlsx</a>
                <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'csv','estudante_id' => request()->estudante_id, 'medida_id' => request()->medida_id]) }}">csv</a>
                <a class="uppercase text-sm px-5 py-2.5" href="{{ route('export.ocorrencias', ['extensao' => 'pdf', 'estudante_id' => request()->estudante_id, 'medida_id' => request()->medida_id]) }}" target="_blank">pdf</a>
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
        </x-card>
    </div>

</x-app-layout>