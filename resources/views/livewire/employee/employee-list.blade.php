<div>
    <header class="flex justify-end">
        <x-button label="Add Employee" rose icon="plus" class="font-semibold" href="{{ route('admin.employee-add') }}" />
    </header>
    <div class="mt-5">
        {{ $this->table }}
    </div>
</div>
