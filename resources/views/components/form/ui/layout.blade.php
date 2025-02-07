@props([
'ext' => false,
'descriptionTooltip' => '',
'redirection' => '',
'class' => null,
'title' => '',
'fields' => [],
'action' => ''
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
            @switch($action)

            @case('create')
            @foreach($fields as $field => $props)
            <x-form.ui.input name="{{ $field }}" :label="$props['label'] ?? $field" :type="$props['type'] ?? ''"
                :model="$props['model'] ?? ''" :placeholder="$props['placeholder'] ?? ''" :span="$props['span'] ?? 1"
                :row-span="$props['rowspan'] ?? 1" :mask="$props['mask'] ?? ''" :readonly="$props['readonly'] ?? false"
                :prefix="$props['prefix'] ?? ''" :icon="$props['icon'] ?? ''" :right-icon="$props['right_icon'] ?? ''"
                :suffix="$props['suffix'] ?? ''" :api-route="$props['apiroute'] ?? ''" :params="$props['params'] ?? ''"
                :required="$props['required'] ?? false" :accept="$props['accept'] ?? ''"
                :multiple="$props['multiple'] ?? false" :max-size="$props['maxSize'] ?? 5120"
                :temp-url="$props['tempUrl'] ?? false" :preview="$props['preview'] ?? false"
                :show-delete="$props['delete'] ?? false" :delete-action="$props['deleteaction'] ?? ''" />
            @endforeach
            @break

            @case('edit')
            @foreach($fields as $field => $props)
            @if($props['onedit']['hidden'] ?? false)
            @continue
            @endif
            <x-form.ui.input name="{{ $field }}" :label="$props['label'] ?? $field" :type="$props['type'] ?? ''"
                :model="$props['model'] ?? ''" :placeholder="$props['placeholder'] ?? ''" :span="$props['span'] ?? 1"
                :row-span="$props['rowspan'] ?? 1" :mask="$props['mask'] ?? ''"
                :readonly="($props['readonly'] ?? false) || ($props['onedit']['disabled'] ?? false)"
                :prefix="$props['prefix'] ?? ''" :icon="$props['icon'] ?? ''" :right-icon="$props['right_icon'] ?? ''"
                :suffix="$props['suffix'] ?? ''" :api-route="$props['apiroute'] ?? ''" :params="$props['params'] ?? ''"
                :required="$props['required'] ?? false" :accept="$props['accept'] ?? ''"
                :multiple="$props['multiple'] ?? false" :max-size="$props['maxSize'] ?? 5120"
                :temp-url="$props['tempUrl'] ?? false" :preview="$props['preview'] ?? false"
                :show-delete="$props['delete'] ?? false" :delete-action="$props['deleteaction'] ?? ''"
                :onedit="$props['onedit'] ?? false" />
            @endforeach
            
            @break
            @default
            @endswitch

        </div>
        <div class="mt-4">
            @if ($ext)
            {{$ext}}
            @endif
        </div>
    </div>
</div>