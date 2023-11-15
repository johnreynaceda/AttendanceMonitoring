<div>
    <div class="px-40  mx-auto py-20 grid grid-cols-5 gap-5">
        <input type="text" id="myInput" wire:model="rfid" class="sr-only" autofocus>
        <div class="col-span-2">
            <div class="h-[35rem] bg-white relative border">
                @if ($employee_data)
                    <img src="{{ Storage::url($employee_data->profile_path) }}"
                        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover" alt="">
                @else
                    <img src="{{ asset('images/sample.png') }}"
                        class="absolute top-0 bottom-0 left-0 w-full h-full object-cover" alt="">
                @endif
            </div>
            <div class=" bg-main text-white rounded-b-3xl p-4 text-center ">
                <h1 class="font-bold uppercase text-3xl">{{ $employee_data->lastname ?? 'DELA CRUZ' }},
                    {{ $employee_data->firstname ?? 'JUAN' }} {{ $employee_data->middlename[0] ?? 'T' }}.
                </h1>
                <h1 class="leading-6 uppercase text-lg">{{ $employee_data->department->name ?? '[DEPARTMENT]' }}</h1>
            </div>
        </div>
        <div class=" flex flex-col space-y-4 col-span-3">
            <div class="" x-animate>
                <div class="grid grid-cols-3 gap-4" x-animate>
                    @foreach ($attendances as $attendance)
                        <div class="h-72 relative border rounded-lg">
                            <img src="{{ Storage::url($attendance->employee->profile_path) }}"
                                class="absolute top-0 bottom-0 left-0 w-full h-full object-cover rounded-lg"
                                alt="">
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="flex-1">
                {{ $this->table }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('focusMyInput', function() {
                    document.getElementById('myInput').focus();
                });
            });
        </script>
    @endpush
</div>
