<div class="card group/card space-y-5 shadow-xl rounded-lg transition-all duration-1000">
    <div class="img_container relative bg-[url('../assets/home_page/bg-paint.png')] w-full bg-no-repeat bg-contain bg-left-top">
        <img class="w-full h-40 block mx-auto rounded object-cover" src="{{ $product->photo }}" alt="">
        <div class="w-full rounded h-full absolute top-0 hidden  items-center justify-center flex-col backdrop-blur-sm group-hover/card:visible group-hover/card:flex">
            <i class="fa-solid fa-eye text-green-500 text-3xl"></i>
            <a class="uppercase text-slate-300 font-semibold tracking-wider" href="\products\{{ $product->id }}">See More...</a>
        </div>
        
    </div>
    <div class="card_content px-3 pb-4 space-y-4">
        <div>
            <h4 class="text-center mb-2 text-slate-800 text-xl font-bold capitalize line-clamp-1">{{ $product->title }}</h4>

            <!-- star rating  -->
            <div class="flex items-center justify-center space-x-1">
                @for ($i = 1; $i <= 5; $i++)
                  
                    <svg class="w-4 h-4 {{ $i <= $product->avg_rating ? 'text-green-500' : 'text-slate-400' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                @endfor
            </div>
        </div>

        <p class="text-center text-slate-600 text-base line-clamp-2">{{ $product->description }}</p>
        <div class="flex justify-center items-center space-x-5">
            <span class="text-xl font-bold">${{ $product->price }}</span>
            <form action="/products/{{ $product->id }}/addToCart" method="POST">
                @csrf
                <input class="hidden" type="number" name="quantity" value="1">
                <button
                    class="w-32 py-2 border rounded-3xl border-green-500 text-sm font-bold hover:ring-2 ring-green-500 transition-all duration-75">Add
                    To Cart</button>
            </form>
        </div>

    </div>
</div>

<script>
    console.log('haha');
</script>
