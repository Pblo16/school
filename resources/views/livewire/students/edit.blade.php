<x-form.ui.layout :descriptionTooltip="$descriptionTooltip ?? ''">

    <x-slot:title>
        {{ __('Editar Alumno') }}
    </x-slot:title>

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
        :required="$props['required'] ?? false" :accept="$props['accept'] ?? ''" :multiple="$props['multiple'] ?? false"
        :max-size="$props['maxSize'] ?? 5120" :temp-url="$props['tempUrl'] ?? false"
        :preview="$props['preview'] ?? false" :show-delete="$props['delete'] ?? false"
        :delete-action="$props['deleteaction'] ?? ''" :onedit="$props['onedit'] ?? false" />
    @endforeach

</x-form.ui.layout>