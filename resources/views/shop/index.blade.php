<x-layout>
    <section class="px-28 my-5 flex gap-10">
        <aside class="w-[20%] space-y-5">
            {{-- category filter  --}}
            <div
                class="relative category-box  rounded-lg p-1 h-96 overflow-y-scroll overflow-x-hidden bg-gradient-to-r from-green-500 to-green-400">
                <div class="sticky top-1 w-full p-1 rounded-lg  bg-white font-serif">Category</div>
                <div>
                    <ul>
                        @foreach ($categories as $category)
                            <li class="py-2 px-1">
                                <a class="text-white"
                                    href="?category={{ $category->id }}   {{ request('country') ? '& country=' . request('country') : '' }} {{ request('type') ? '& type=' . request('type') : '' }}">
                                    {{ $category->name }}
                                </a>

                            </li>
                            <hr class="border-gray-900 opacity-5">
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="relative category-box  rounded-lg p-5  overflow-y-scroll overflow-x-hidden bg-gray-200">
                <h6 class="text-lg text-green-500 tracking-wider font-semibold mb-3">Special Products <sup
                        class="italic text-black tracking-wide">Today</sup></h6>
                <hr class="border-gray-300 border-2 mb-4">

                <div class="space-y-3">
                    @foreach ($specialProducts as $product)
                        <div class="flex items-center justify-center gap-4">
                            <div>
                                <img class="w-14 h-14 rounded" src="{{ $product->photo }}" alt="">
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-600">{{ $product->title }}</p>
                                <p class="text-gray-600">${{ $product->price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- item in your cart --}}
            <a href="/home/cart">

                <div
                    class="relative category-box mt-5  rounded-lg p-5  overflow-y-scroll overflow-x-hidden bg-gray-200">
                    <h6 class="text-lg text-green-500 tracking-wider font-semibold mb-3">My Backest Lists </h6>
                    <hr class="border-gray-300 border-2 mb-4">

                    @if (!$cart?->cart_items->load(['product'])->count() ?? null)
                        <div>
                            <p class="tracking-wide text-gray-600">You have no items in yout baskest</p>
                        </div>
                    @else
                        <div class="space-y-3 h-64">
                            @foreach ($cart->cart_items->load('product') as $item)
                                <div class="flex items-center justify-center gap-4">
                                    <div>
                                        <img class="w-14 h-14 rounded" src="{{ $item->product->photo }}" alt="">
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-600 line-clamp-2">{{ $item->product->title }}
                                        </p>
                                        <p class="text-gray-600">Price : {{ $item->product->price }}</p>
                                        <p class="text-gray-600">Quantity : {{ $item->quantity }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </a>

            <div class="bg-gray-200 rounded-lg category-box  overflow-x-hidden">
                <div class="sticky top-0 bg-gray-200 z-40">
                    <h6 class="text-lg px-5 pt-2 text-green-500 tracking-wider font-semibold mb-3">Shop By Country </h6>
                    <hr class="border-gray-300 border-2 mb-4">
                </div>

                <div class="h-56 px-5">
                    <ul>
                        @foreach ($countries as $country)
                            <li class="py-2 px-1">
                                <a class="text-gray-700"
                                    href="?country={{ $country->id }}{{ request('category') ? '& category=' . request('category') : '' }} {{ request('type') ? '& type=' . request('type') : '' }}">
                                    {{ $country->citizen }}
                                </a>
                            </li>
                            <hr class="border-gray-900 opacity-5">
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

        <main class="flex-1 space-y-5">
            {{-- shop hero section  --}}
            <div class="rounded-lg w-full p-10 bg-green-500 h-96  bg-no-repeat bg-center bg-cover "
                style="background-image: url('{{ asset('assets/shop-bg.jpg') }}')">
                <h6 class="text-green-500 text-2xl font-bold tracking-wider">Welcome to Nature Shop</h6>
                <h4 class="text-4xl tracking-wider font-bold text-gray-500">Get Highly Oriented Food</h4>
                <p class="mt-5 text-lg font-bold text-gray-400 tracking-wide">Buy Now >></p>
            </div>
            <div>
                <form class="w-full h-14   rounded-lg flex p-2 bg-white"
                    action="/shop?{{ request('category') ? '& category=' . request('category') : '' }} {{ request('country') ? '& country=' . request('country') : '' }}"
                    method="GET">

                    <input name="type" value="{{ request('type') ?? '' }}"
                        class="flex-1 rounded-lg bg-white px-7 placeholder:tracking-wide" type="text"
                        placeholder="Search you want until you found it 😉">
                    <button type="submit" class="h-full bg-green-500 px-14 rounded-lg text-white font-bold">Se<i
                            class="fas fa-search"></i>arch</button>
                </form>
            </div>

            @if (request('country') || request('category') || request('type'))
                <div class="grid grid-cols-4 gap-5">
                    @if ($products->count())

                        @foreach ($products as $product)
                            <x-product-card :product="$product"></x-product-card>
                        @endforeach
                    @else
                        <div class="col-span-4 p-20 py-44 text-center">
                            <p class="text-2xl tracking-wide text-gray-400 font-semibold">There is no search result 😛</p>
                        </div>
                    @endif
                </div>
                <div class="mt-5">

                    {{ $products->links() }}
                </div>
            @else
                <div class="bg-white p-5 rounded-lg">
                    <div class="flex justify-between items-center mb-5">
                        <h6 class="text-lg text-green-500 tracking-wider font-semibold">Latest Products</h6>
                        <span
                            class="text-sm font-bold text-gray-500">{{ $latestProducts[3]->created_at->format('d M') }}
                            to
                            {{ $latestProducts[0]->created_at->format('d M h:m') }}</span>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($latestProducts as $product)
                            <x-product-card :product="$product"></x-product-card>
                        @endforeach
                    </div>
                </div>

                {{-- stop read section  --}}
                <div class="rounded-lg">
                    <div class="grid grid-cols-3 gap-3">
                        {{-- alert card  --}}

                        <div class="flex items-center gap-2 bg-white shadow-lg rounded-lg p-5">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fa-solid fa-dollar-sign text-white text-lg"></i>
                            </div>
                            <div class="">
                                <p class="text-base text-gray-900 font-semibold">Get coupon after 3 order</p>
                                <p class="text-sm text-gray-800">on your shopping</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 bg-white shadow-lg rounded-lg p-5">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fa-solid fa-leaf text-white text-lg"></i>
                            </div>
                            <div class="">
                                <p class="text-base text-gray-900 font-semibold">Cook when order confirm</p>
                                <p class="text-sm text-gray-800">For all Products</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 bg-white shadow-lg rounded-lg p-5">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fa-solid fa-gift text-white text-lg"></i>
                            </div>
                            <div class="">
                                <p class="text-base text-gray-900 font-semibold capitalize">Same day shipping </p>
                                <p class="text-sm text-gray-800">For all Products</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-lg">
                    <div class="flex justify-between items-center mb-5">
                        <h6 class="text-lg text-green-500 tracking-wider font-semibold">Highest Price Products</h6>
                        <span class="text-sm font-bold text-gray-500">Between ${{ $priceProducts[3]->price }} to
                            ${{ $priceProducts[0]->price }}</span>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($priceProducts as $product)
                            <x-product-card :product="$product"></x-product-card>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-lg">
                    <div class="flex justify-between items-center mb-5">
                        <h6 class="text-lg text-green-500 tracking-wider font-semibold">Today Price Products</h6>
                        `
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($specialProducts as $product)
                            <x-special-card :product="$product"></x-special-card>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>
    </section>
</x-layout>

@section('javascript')
    <script></script>
@endsection
