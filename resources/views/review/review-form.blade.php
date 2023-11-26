<x-layout>
    <form action="/review" method="POST">
        @csrf
    <section class="container w-[70%] mx-auto my-24 space-y-5">
        <h2 class="text-3xl font-bold tracking-wide">Send us your feedback!</h2>
        <p class="tracking-wider text-gray-500">Do you have a suggestion or found some bug? <br>let us know in the field below.</p>
        <h4 class="text-lg font-semibold tracking-wider">comment(optional)</h4>
        <textarea id="review" name="review" class="border w-full border-gray-800 rounded p-2" name="" id="" cols="30" rows="10" placeholder="Enter you word in your mine">{{ old('review') }}</textarea>
        <x-error name="review"></x-error>
        <button type="submit" class="w-full py-3 bg-green-500 rounded font-semibold text-white">Submit</button>
    </section>
</form>
</x-layout>