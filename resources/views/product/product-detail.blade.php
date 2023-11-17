<x-layout>


    <section class="container py-16 bg-slate-50">
        <div class="flex gap-5">
            <div class="product_img w-[35%]">
                <img class="w-full h-[400px] object-cover rounded" src="{{ $product->photo }}" alt="">
            </div>
            <div class="product_content w-[45%] space-y-3">
                <h2 class="text-3xl font-bold mb-8">
                    {{ $product->title }} <span class="text-sm underline text-green-500">(Spanish)</span>
                </h2>

                <p class="text-base font-light tracking-wide text-justify">
                    {{ $product->description }}
                </p>
                <div class="Ingredients mb-10 ring-1 ring-slate-300 py-3 px-5 rounded-lg">
                    <h6 class="text-lg  font-bold mb-3 tracking-wide">Ingredients</h6>
                    <div class="grid grid-cols-3 gap-x-5">
                        @for ($i = 0; $i < 8; $i++)
                            <div><span class="text-base font-thin tracking-wide">valgina frui</span></div>
                        @endfor
                    </div>
                </div>



                <div class="pt-3">
                    <form action="/products/{{ $product->id }}/rating" method="POST" onchange="submit()">
                        @csrf
                        <h6 class="text-3xl text-slate-600 font-bold tracking-wide">Give Rating Product</h6>
                        <span class="flex gap-6 py-4">
                            @php
                                $userRating = auth()->check()
                                    ? auth()
                                        ->user()
                                        ->userRatingOnProduct($product->id)
                                    : null;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <label for={{ $i }}>
                                    @if (auth()->user())
                                        <svg class="w-8 h-8 {{ $i <= $userRating ? 'text-green-500' : 'text-slate-400' }}"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @else
                                        <svg class="w-8 h-8 text-slate-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endif
                                </label>
                                <input class="hidden" type="radio" id="{{ $i }}" name="rating"
                                    value="{{ $i }}">
                            @endfor
                        </span>
                    </form>
                </div>
            </div>
            <div class="prodct_cart bg-slate-100 col-span-1 w-[25%]">

                <div class="w-full bg-green-500 py-3  rounded">
                    <span class="pl-3 text-white font-semibold tracking-wide">Product Price</span>
                </div>
                <div class="px-3 ">
                    <p class="font-bold text-gray-600 tracking-normal mt-4">Add to cart and order now</p>
                    <span class="flex justify-between items-center mt-2">
                        <p class="text-3xl font-bold">$<span id="product_price">{{ $product->price }}</span></p>
                        <span class="w-6 h-6 block rounded-full bg-green-500"></span>
                    </span>

                    <p class="font-bold text-sm text-gray-600 tracking-wider mt-4 mb-8">Choose Product Quantity</p>

                    <div>
                        <form action="/products/{{ $product->id }}/addToCart" method="POST">
                            @csrf
                            <input id="quantity_count" min="1"
                                class="border-0 w-20 h-10 text-center rounded focus:ring-green-500" name="quantity"
                                value="1" type="number"><label
                                class="ml-5 font-bold text-sm capitalize text-gray-600 tracking-wider"
                                for="">add
                                quantity</label>
                    </div>
                    <div class="mt-8 flex justify-between items-center mb-4">
                        <p class="font-bold text-sm capitalize text-gray-600 tracking-wider">Subtotal</p>
                        <p id="show_total" class="font-extrabold text-base capitalize text-gray-800 tracking-normal">
                            $
                            {{ $product->price }}
                        </p>
                    </div>
                    <button type="submit"
                        class="w-full bg-green-500 py-2 mb-2 text-white font-semibold text-base tracking-wide rounded">Add
                        To
                        Cart</button>
                    </form>
                    <form action="/checkout" method="GET">

                        <button type="submit"
                            class="w-full border border-green-500 text-green-500 py-2   font-normal text-base tracking-wide rounded bg-slate-200">Checkout
                            Now</button>
                    </form>
                </div>

            </div>
        </div>

        <x-random-product :category="$product" :randomProducts="$randomProducts"></x-random-product>
    </section>

</x-layout>
