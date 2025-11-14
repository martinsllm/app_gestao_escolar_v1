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