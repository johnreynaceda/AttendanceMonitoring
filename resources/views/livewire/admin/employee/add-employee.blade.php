<div>
    {{ $this->form }}
    {{-- @dump($attachment) --}}
    <div class="mt-5 flex space-x-3">
        <x-button label="Submit" wire:click="submitRecord" spinner="submitRecord" class="font-semibold" positive md
            rounded />
        <x-button label="Cancel" class="font-semibold" flat negative md rounded
            href="{{ route('admin.employee-list') }}" />
    </div>
</div>
