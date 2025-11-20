<x-app-layout>

<script src="{{ asset ("/js/fetch.js") }}" type="text/javascript"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Ocorrência') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-card>
            <form action="{{ route('ocorrencias.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-label>Estudante</x-label>
                        <x-input id="search" placeholder="Estudante" aria-readonly="true" required/>
                        <input type="hidden" name="estudante_id" id="estudante_id" />
                        <p class="text-xs italic">Informe o nome do estudante</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-label>Medida</x-label>
                        <select value="{{ $request->medida_id ?? old('medida_id') }}" name="medida_id" id="medida_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            <option value="">Selecione uma medida</option>
                            @foreach ($medidas as $medida)
                                <option value="{{ $medida->id }}">{{ $medida->descricao }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs italic">Selecione a medida aplicada</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <x-label>Descrição</x-label>
                        <textarea type="text" name="descricao" placeholder="Descrição" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ $request->descricao ?? old('descricao') }}" required></textarea>
                        <p class="text-xs italic">Informe a descrição da ocorrencia</p>
                    </div>
                </div>
                <div class="w-full px-3 md:mb-0 mt-5" align="right">
                    <x-button>Cadastrar</x-button>
                </div>
            </form>
        </x-card>       
    </div>
</x-app-layout>