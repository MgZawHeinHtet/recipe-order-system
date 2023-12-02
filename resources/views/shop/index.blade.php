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
                                <a class="text-white" href="?category={{ $category->name }}">
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
                    @foreach ($latestProducts as $product)
                        <div class="flex items-center justify-center gap-4">
                            <div>
                                <img class="w-14 h-14 rounded" src="{{ asset('assets/shop-bg.jpg') }}" alt="">
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-600">Grabic contton</p>
                                <p class="text-gray-600">$400</p>
                            </div>
                        </div>
                    @endforeach
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
                <form class="w-full h-14   rounded-lg flex p-2 bg-white" action="">
                    <input class="flex-1 rounded-lg bg-white px-7 placeholder:tracking-wide" type="text"
                        placeholder="Search you want until you found it 😉">
                    <button type="submit" class="h-full bg-green-500 px-14 rounded-lg text-white font-bold">Se<i
                            class="fas fa-search"></i>arch</button>
                </form>
            </div>

            <div class="bg-white p-5 rounded-lg">
                <div class="flex justify-between items-center mb-5">
                    <h6 class="text-lg text-green-500 tracking-wider font-semibold">Latest Products</h6>
                    <span class="text-sm font-bold text-gray-500">{{ $latestProducts[3]->created_at->format('d M') }} to
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
                    @foreach ($priceProducts  as $product)
                        <x-product-card :product="$product"></x-product-card>
                    @endforeach
                </div>
            </div>

            <div class="rounded-lg">
                <div class="flex justify-between items-center mb-5">
                    <h6 class="text-lg text-green-500 tracking-wider font-semibold">Today Price Products</h6>
                     
                </div>
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($priceProducts  as $product)
                        <x-special-card :product="$product"></x-special-card>
                    @endforeach
                </div>
            </div>
        </main>
    </section>
</x-layout>
