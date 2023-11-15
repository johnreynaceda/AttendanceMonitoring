<div class="ml-4 my-2">
    @if (auth()->user()->is_admin == true)
        <img src="{{ Storage::url($getRecord()->profile_path) }}" class="h-20 w-20 object-cover rounded-xl" alt="">
    @else
        <img src="{{ Storage::url($getRecord()->employee->profile_path) }}" class="h-20 w-20 object-cover rounded-xl"
            alt="">
    @endif
</div>
