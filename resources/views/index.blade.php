<x-layout.main>

    @if(\Illuminate\Support\Facades\Auth::check())
        True
    @else
        False
    @endif

</x-layout.main>
