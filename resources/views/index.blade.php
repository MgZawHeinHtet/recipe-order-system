<x-layout>
    {{-- hero section  --}}
    '<x-hero></x-hero>
    
{{-- popular dish --}}
    <x-popular-dishes :products="$products"></x-popular-dishes>

    {{-- subscribe sectin  --}}
    <x-subscribe></x-subscribe>

</x-layout>