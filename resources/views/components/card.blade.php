<div {{ $attributes->merge(['class' => "max-w-7xl mx-auto sm:px-6 lg:px-8"]) }}>
    <div {{ $attributes->merge(['class' => "bg-white overflow-hidden shadow-sm sm:rounded-lg"]) }}>
        <div {{ $attributes->merge(['class' => "p-6 text-gray-900"]) }}>
            {{ $slot }}
        </div>
    </div>
</div>