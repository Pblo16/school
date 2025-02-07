<layout-view.blade>
    @if($action === 'edit')
    {{-- removed @dd($id) --}}
    <livewire:subject.edit :action="$action" :data="$id" :fields="$fields" />
    @elseif($action === 'create')
    <livewire:subject.create :action="$action" :fields="$fields" />
    @else
    <div class="m-10 text-2xl font-bold">
        {{$title}}
    </div>
    <x-form.ui.grid :headers="$headers" :data="$data" :actions="$actions" :searchable="$searchable" />
    @endif
</layout-view.blade>