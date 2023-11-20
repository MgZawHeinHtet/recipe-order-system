<x-profile-layout>
    <h4 class="text-xl font-semibold tracking-wide mb-10 capitalize">Your rated products</h4>
    <div class="grid grid-cols-4 gap-5 mb-10 ">
        @if ($products->count() < 1)
            <div class="col-span-4 h-[400px] flex items-center justify-center">
                <p class="text-lg tracking-wide"> There is no item,you give rating</p>
            </div>
        @endif
        @foreach ($products as $product)
            <x-product-card :product="$product"></x-product-card>
        @endforeach
    </div>
    {{ $products->links() }}
</x-profile-layout>
