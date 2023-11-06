<x-layout>
    {{-- hero section  --}}
    '<x-hero></x-hero>
    
    {{-- popular dish --}}
    <x-popular-dishes></x-popular-dishes>

    {{-- subscribe sectin  --}}
    <x-subscribe></x-subscribe>

    <div class="py-5 bg-orange-600">
        <form action="/products/1/rating" method="POST">
            @csrf
            <input name="rate" type="checkbox" value="5" checked>
            <button type="submit">give</button>
        </form>
    </div>
</x-layout>