<section class="popular my-9 container">
    <div>
        <h2 class="antialiased font-sans text-5xl font-bold capitalize text-slate-700 tracking-wide">popular dishes
        </h2>
        <div class="grid grid-cols-5 gap-5 my-24">

            {{-- testing add to card tem create  --}}
            @foreach ($products as $product)
                <x-product-card :product="$product"></x-product-card>
            @endforeach
          
        </div>
        {{ $products->links() }}
    </div>
</section>