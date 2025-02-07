@props([
'name',
'label' => '',
'type' => 'text',
'model' => '',
'placeholder' => '',
'additionalProps' => [],
'span' => 1,
'rowSpan' => 1,
'readonly' => false,
'mask' => '',
'corner' => false,
'prefix' => '',
'icon' => '',
'rightIcon' => '',
'suffix' => '',
'apiRoute' => null,
'params' => [],
'required' => true,
'accept' => '',
'multiple' => false,
'maxSize' => 5120,
'tempUrl' => false,
'preview' => false,
'showDelete' => false,
'deleteAction' => null,
'options' => [],
])

@php
$spanClass = match((int)$span) {
2 => 'col-span-3 md:col-span-2',
3 => 'col-span-3 md:col-span-3',
4 => 'col-span-3 md:col-span-4',
5 => 'col-span-3 md:col-span-5',
6 => 'col-span-3 md:col-span-6',
7 => 'col-span-3 md:col-span-7',
8 => 'col-span-3 md:col-span-8',
9 => 'col-span-3 md:col-span-9',
10 => 'col-span-3 md:col-span-10',
11 => 'col-span-3 md:col-span-11',
12 => 'col-span-3 md:col-span-12',
default => 'col-span-1'
};

$rowSpanClass = match((int)$rowSpan) {
2 => 'row-span-2',
3 => 'row-span-3',
4 => 'row-span-4',
5 => 'row-span-5',
default => 'col-span-1'
};
@endphp
<div class="{{ $spanClass }} {{ $rowSpanClass}}">

    @switch($type)
    @case('option-select')
    <x-select wire:model.live="form.{{ $model }}" label="{{ $label }}" placeholder="Seleccionar {{ $placeholder }}"
        :options="$options" option-label="name" option-value="id" :readonly="$readonly" />
    @break

    @case('select')
    <x-select wire:model.live="form.{{ $model }}" label="{{ $label }}" placeholder="Seleccionar {{ $placeholder }}"
        :async-data="route($apiRoute)" option-label="name" option-value="id" :readonly="$readonly" />
    @break

    @case('dependent-select')
    <x-select wire:model.live="form.{{ $model }}" label="{{ $label }}" placeholder="Seleccionar {{ $placeholder }}"
        :async-data="route($apiRoute, is_array($params) ? $params : (method_exists($this, $params) ? htmlspecialchars_decode(http_build_query($this->{$params}()), ENT_QUOTES) : $params))"
        option-label="name" option-value="id" :readonly="$readonly" />
    @break
    @case('date')
    <x-datetime-picker wire:model="form.{{ $model }}" label="{{ $label }}" placeholder="Fecha de la cita"
        without-time :readonly="$readonly" />
    @break

    @case('phone')
    <x-phone id="{{ $name }}" label="{{ $label }}" placeholder="{{ $placeholder }}" :mask="['(###) ###-####']"
        wire:model="form.{{ $model }}" :readonly="$readonly" />
    @break

    @case('maskable')
    <x-maskable id="{{ $name }}" label="{{ $label }}" mask="{{ $mask }}" placeholder="{{ $placeholder }}"
        wire:model="form.{{ $model }}" :readonly="$readonly" />
    @break

    @case('password')
    <x-password wire:model="form.{{ $model }}" label="{{ $label }}" placeholder="{{ $placeholder }}"
        :readonly="$readonly" />
    @break

    @case('textarea')
    <x-textarea label="{{ $label }}" placeholder="{{ $placeholder }}" corner="{{ $corner }}"
        wire:model="form.{{ $model }}" :readonly="$readonly" :prefix="$prefix" :icon="$icon" :right-icon="$rightIcon"
        suffix="{{$suffix}}" :required="$required" />
    @break

    @case('checkbox')
    <x-checkbox :id="$name" wire:model="form.{{ $model }}" :value="$this->{$model}" :label="$label" xl />
    @break

    @default
    <x-input label="{{ $label }}" placeholder="{{ $placeholder }}" corner="{{ $corner }}" wire:model="form.{{ $model }}"
        :readonly="$readonly" :prefix="$prefix" :icon="$icon" :right-icon="$rightIcon" suffix="{{$suffix}}"
        :required="$required" />
    @endswitch
</div>