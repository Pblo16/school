@props([
'ext' => false,
'descriptionTooltip' => '',
'redirection' => '',
'class' => null,
])

<div class="flex flex-col justify-between">
    <header class="py-5 mx-10 text-2xl font-bold flex justify-between">
        <div class="flex items-center gap-3">
            {{-- @if ($descriptionTooltip)
            <x-form.ui.tooltip :title="$title" :descriptionTooltip="$descriptionTooltip" :redirection="$redirection" />
            @endif --}}
            {{$title}}
        </div>
        <div class="text-2xl dark:text-white">
            <div class="inline-flex">
                <x-form.actions.button wire="save" text="Guardar" variant="success" />
                <x-form.actions.button wire="cancel" text="Cancelar" variant="danger" />
            </div>
        </div>
    </header>

    <div class="grow  px-6 lg:px-12  {{$class}}">
        <div class="grid sm:grid-cols-3 md:grid-cols-12 auto-rows-min gap-2 z-70">
            {{ $slot }}
        </div>
        <div class="mt-4">
            @if ($ext)
            {{$ext}}
            @endif
        </div>
    </div>
</div>