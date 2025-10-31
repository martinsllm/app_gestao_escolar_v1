<div class="relative overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full text-sm text-center text-gray-500 dark:text-gray-400']) }}>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-400">
            <tr>
                {{ $head }}
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                {{ $body }}
            </tr>
        </tbody>
    </table>
</div>