<div>
    <div class="mt-5">
        {{ $this->form }}
    </div>
    <div class="mt-5">
        {{-- <button class="bg-main p-3 text-lg text-white font-semibold w-full rounded-md">
            <span>SUBMIT</span>
        </button> --}}
        <x-button label="SUBMIT" wire:click="submit" spinner="submit" dark class="w-full" lg
            right-icon="arrow-circle-right
        " />
    </div>
</div>
