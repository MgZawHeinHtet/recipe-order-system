@props(['cart'=>null])

@php
    $carts = $cart?->cart_items
@endphp

<x-layout>
    <section class="container">
        
        <div class="text-center">
            <h4 class="text-3xl font-semibold">Cart</h4>
            <span class="py-2 text-slate-500">Home/Cart</span>
        </div>
        <x-alert></x-alert>
        <div class="grid grid-cols-3  mt-16 mb-10 gap-10">
            <div class="cart_body col-span-2">
                <table class="w-full text-left border-separate border-spacing-y-4">
                    <thead class="">
                        <tr class="text-normal font-extralight  text-slate-600 tracking-wide">
                            <th scope="col" class="px-6 ">Product Details</th>
                            <th scope="col" class="px-6 text-center">Quantity</th>
                            <th scope="col" class="px-6">Price</th>
                            <th scope="col" class="px-6 ">Total</th>
                            <th scope="col" class="px-6 pb-3"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @if ($carts?->count())
                            @foreach ($carts as $cart)
                             
                                <tr class="ring-1 ring-slate-300 rounded">
                                    <th scope="row"
                                        class="px-6 py-2  font-medium text-gray-900 whitespace-normal ">
                                        <div class="flex gap-x-6 items-center">
                                            <img class="object-cover h-20" src="{{ $cart->product->photo }}"
                                                width="60" height="500" alt="">
                                            <span class="">
                                                <span class="flex-wrap">{{ $cart->product->title }}</span>
                                                <p class="text-sm font-normal tracking-wide capitalize text-slate-400">
                                                    {{ $categories->keyBy($cart->product->category_id)->first()->name }}
                                                </p>
                                            </span>
                                        </div>
                                    </th>
                                    <td class="px-2 py-4 text-center">
                                        <form action="/products/{{ $cart->product->id }}/addToCart" method="POST"
                                            onchange="submit()"">
                                            @csrf
                                           
                                            <input type="text" value="{{ $cart->quantity }}" name="quantity"
                                                class="quantity_input ring ring-slate-500 text-center rounded w-12 h-8 mx-3 focus:border-0 focus:ring-green-500">
                                           
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ $cart->product->price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ $cart->total }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="/carts/{{ $cart->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=""><i
                                                    class="fa-solid fa-x text-xs"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                          <tr>
                            <td class="w-full" colspan="5">
                                <div class="flex justify-center items-center w-full  h-[600px]"> No Items in the cart</div>
                            </td>
                          </tr>

                        @endif


                    </tbody>
                </table>
            </div>
            <div class="checkout ring-1 ring-slate-300 rounded mt-14 p-8 h-[450px]">
                <h2 class="text-2xl font-bold text-slate-600 mb-8">Total</h2>
                <div class="flex justify-between items-center">
                    <h6 class="text-normal font-bold text-slate-700 tracking-wider">Sub-Total</h6>
                    <p class="text-slate-600 tracking-wide">${{ $carts ? $carts->sum('total') : 0 }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <h6 class="text-lg font-bold text-slate-700">Delivery</h6>
                    <p class="text-slate-600 tracking-wide">free</p>
                    
                </div>
               
                <div class="mt-8">
                    <form action="/checkout" method="GET">
                        <button class="w-full py-3 bg-green-500 rounded text-white text-lg">Check Out</button>
                    </form>
                </div>
                <div class="mt-8">
                    <h4 class="text-lg text-slate-700 font-semibold">We Accept</h4>
                    <div class="mt-4">
                        <img src="../assets/kbz.png" class="w-10 h-10 object-cover" alt="">
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-center  text-normal text-slate-500">Get a discount, after 3 order. <a class="text-green-500 underline underline-offset-4" href="/">Continue Shopping</a></p>
                </div>
            </div>
        </div>
    </section>
  
</x-layout>
