@props([
'type' => 'button',
'variant' => 'primary',
'size' => 'md',
'icon' => null,
'loading' => false,
'disabled' => false,
'wire' => null,
'text' => null,
'action' => null,
])

@php
$baseClasses = 'inline-flex items-center gap-x-2 transition-all font-medium disabled:opacity-50
disabled:pointer-events-none -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg rounded-none';


$variants = [
'primary' => 'bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-white
dark:hover:bg-neutral-800',

'danger' => 'bg-red-500 text-white hover:bg-red-600 disabled:opacity-50',

'success' => 'bg-gradient-to-r from-green-400 to-green-500 text-white hover:bg-green-600 disabled:opacity-50',

'warning' => 'bg-gradient-to-b from-yellow-300 to-amber-400 text-white hover:bg-yellow-600 disabled:opacity-50',

'cancel' => 'bg-black text-white hover:bg-gray-600 disabled:opacity-50',

'ghost' => 'bg-transparent hover:contrast-50 '

];

$sizes = [
'xs' => 'px-2 py-1 text-xs',
'sm' => 'px-3 py-2 text-xs',
'md' => 'px-4 py-3 text-sm',
'lg' => 'px-5 py-3 text-base',
'xl' => 'px-6 py-4 text-lg'
];

$classes = $baseClasses . ' ' .
($variants[$variant] ?? $variants['primary']) . ' ' .
($sizes[$size] ?? $sizes['md']);
@endphp
<button type="{{ $type }}" @if($wire) wire:click="{{ $wire }}" @endif @if($disabled) disabled @endif {{
    $attributes->merge(['class' => $classes]) }}
    >

    @if($loading)
    <svg class="animate-spin size-4 border-2 border-white border-r-transparent rounded-full" viewBox="0 0 24 24"></svg>
    @endif

    @if($icon)
    <x-phosphor :name="$icon" class="w-4 h-4" />
    @endif
    @if ($text)
    {{ $text }}
    @endif
</button>