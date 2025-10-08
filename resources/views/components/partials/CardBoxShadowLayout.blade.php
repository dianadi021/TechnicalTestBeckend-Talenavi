<div {{ $attributes->merge(['class' => 'p-6 bg-white border border-gray-200 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl']) }}>
    @isset($slot)
        {{ $slot }}
    @endisset
</div>
