<x-layout>
    {{-- hero section  --}}
    <x-hero></x-hero>

    {{-- today special menu  --}}
    <x-special-section></x-special-section>

    {{-- popular dish --}}
    <x-popular-dishes :products="$products"></x-popular-dishes>

    {{-- service section  --}}
    <x-service-section :services="$services"></x-service-section>

    {{-- testimonial  --}}
    <x-testimonial :reviews="$reviews"></x-testimonial>

    {{-- subscribe sectin  --}}
    <x-subscribe></x-subscribe>

</x-layout>
