@props([
'headers',
'data',
'policy',
'editField' => 'can_edit',
'deleteField' => 'can_delete',
'perPageOptions' => [5, 10, 20, 100],
'perpage' => 10,
'actions' => [],
'searchable' => [],
'dialogs' => null,
])

<div class="flex flex-col shadow-lg rounded-lg overflow-hidden">
    @if ($dialogs)
    {{ $dialogs }}
    @endif
    <div class="flex items-center justify-between px-6 py-4 bg-gray-50 dark:bg-zinc-800">
        <div class="inline-flex">
            <x-form.actions.button wire:click="create" :text="'Crear'" :icon="'plus'" />
        </div>
        @if(count($searchable) > 0)
        <div class="flex-1 max-w-sm">
            <x-input placeholder="Buscar en: {{ implode(', ', $searchable) }}" wire:model.live.debounce.300ms=" search"
                right-icon="magnifying-glass" clearable />
        </div>
        @endif
    </div>
    <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full ">
                    <thead class="bg-gray-50 dark:bg-zinc-800">
                        @foreach ($headers as $header)
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-white">
                            {{ $header['label'] }}
                        </th>
                        @endforeach
                        <th scope="col"
                            class="max-w-xs px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-white">
                            Acciones
                        </th>
                    </thead>
                    <tbody class="{{-- divide-y divide-gray-200 --}} dark:divide-neutral-700 dark:bg-zinc-600">
                        @forelse ($data ?? [] as $datum)
                        <tr>
                            @foreach ($headers as $header)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                {{ data_get($datum, $header['key']) }}
                            </td>
                            @endforeach

                            <td class="px-2 py-3 whitespace-nowrap text-end text-sm font-medium max-w-xs">
                                @if($datum && $datum->id)
                                <div class="inline-flex rounded-lg shadow-sm">
                                    {{-- @dd($actions) --}}
                                    @if ($actions)
                                    @if($datum->{$editField})
                                    @foreach ($actions as $action)
                                    <x-form.actions.button wire="{{$action['function']}}({{$datum->id}})"
                                        :variant="$action['variant']?? ''" icon="{{$action['icon']}}"
                                        :action="$action['action'] . ' ' . $policy  ?? ''" variant="ghost">
                                        <x-slot:text>
                                            {{ $action['text'] ?? '' }}
                                        </x-slot:text>
                                    </x-form.actions.button>
                                    @endforeach
                                    @endif

                                    @endif
                                    @if($datum->{$editField})
                                    <x-form.actions.button variant="ghost" icon="pencil"
                                        wire="edit({{ $datum->id }})" />
                                    @endif
                                    @if($datum->{$deleteField})
                                    <x-form.actions.button variant="ghost" icon="trash"
                                        wire="delete({{ $datum->id }})" />
                                    @endif
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ count($headers) + 1 }}"
                                class="px-6 py-4 text-center text-gray-500 dark:text-neutral-400">
                                No se encontraron registros
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 dark:bg-zinc-800 flex justify-between items-center px-6 py-4">
        <select wire:model.live="perPage"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-zinc-800 dark:border-neutral-700 dark:placeholder-gray-400 dark:text-white">
            @foreach($perPageOptions as $option)
            <option value="{{ $option }}">{{ $option }} </option>
            @endforeach
        </select>
        @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="px-6 flex-1">
            {{ $data->onEachSide(3)->links() }}
        </div>
        @endif

    </div>
</div>