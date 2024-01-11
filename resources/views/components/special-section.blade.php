<section class="popular mt-0 mb-9 container">
    <div>
        <h2 class="antialiased font-sans text-5xl font-bold capitalize text-slate-700 tracking-wide">Today Special Menu
        </h2>
        <div class="grid grid-cols-4 gap-5 my-24">
          @foreach ($specials as $products)
          <x-special-card :product="$products"></x-special-card>
          @endforeach
        
        
        </div>
      
    </div>
</section>