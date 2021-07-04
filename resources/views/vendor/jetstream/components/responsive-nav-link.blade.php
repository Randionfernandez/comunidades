@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-0 border-indigo-400  font-medium text-indigo-700 bg-black focus:outline-none focus:text-blue-300 focus:bg-green-400 focus:border-0 transition'
            : 'block pl-3 pr-4 py-2 border-l-0 border-transparent font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-500 hover:border-gray-300 focus:outline-none focus:text-black focus:bg-green-400 focus:border-0 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
