<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importar Estudantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('import.estudantes') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <x-label>Upload</x-label>
                        <x-input type="file" id="file" name="file" accept=".csv" required multiple />
                        <p class="text-xs italic">Selecione um arquivo CSV</p>
                        <div class="w-full px-3 md:mb-0 mt-5" align="right">
                            <x-button>Importar</x-button>
                        </div>
                    </form>
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>