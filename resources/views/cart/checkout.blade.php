@props(['cart_items' => null, 'customer' => null])

<x-layout>
    <section class="container space-y-8 mb-8">
        <h2 class="text-2xl text-slate-080 font-semibold text-center">Check Out</h2>
        <div class="grid grid-cols-3 gap-16">

            {{-- form  --}}
            <div class="col-span-2 ">
                <form action="{{ $customer ? '/customer/' . $customer->id : '/customer' }}" method="POST" name="checkout"
                    class="">
                    @csrf

                    @if ($customer)
                        @method('PATCH')
                    @endif

                    <h6 class="text-2xl text-slate-800 font-semibold mb-8">Customer Info</h6>
                    <x-alert></x-alert>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans  border-solid border-gray-400 p-1 rounded ">
                                <input value="{{ old('first_name', $customer?->first_name) }}"
                                    class="w-full peer border-0 bg-gray-100 px-5 py-1 focus:ring-0 " type="text"
                                    name="first_name" id="">

                                <legend
                                    class="text-normal peer-focus:animate-bounce  trans text-slate-700 -focus:animate-bounce px-2 trans">
                                    First Name</legend>
                            </fieldset>
                            <x-error name="first_name"></x-error>
                        </div>
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <input value="{{ old('last_name', $customer?->last_name) }}"
                                    class="w-full peer border-0 bg-gray-100 px-5 py-1 focus:ring-0" type="text" name="last_name"
                                    id="">

                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">Last
                                    Name</legend>
                            </fieldset>
                            <x-error name="last_name"></x-error>
                        </div>
                        <div class="col-span-2">
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <input value="{{ old('email', $customer?->email) }}"
                                    class="w-full peer border-0 bg-gray-100 px-5 py-1 focus:ring-0" type="email" name="email"
                                    id="">
                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">Email
                                </legend>
                            </fieldset>
                            <x-error name="email"></x-error>

                        </div>
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <textarea class="w-full border-0 bg-gray-100 px-5 py-1 focus:ring-0 peer" type="text" name="address1" id="">{{ old('address1', $customer?->address1) }}</textarea>
                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">Address
                                    1</legend>
                            </fieldset>
                            <x-error name="address1"></x-error>

                        </div>
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <textarea " class="w-full border-0 bg-gray-100 px-5 py-1 focus:ring-0 peer" type="text" name="address2" id="">{{ old('address2', $customer?->address2) }}</textarea>
                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">
                                    Address 2</legend>
                            </fieldset>
                            <x-error name="address2"></x-error>

                        </div>
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <input value="{{ old('phone', $customer?->phone) }}"
                                    class="w-full border-0 bg-gray-100 px-5 py-1 focus:ring-0 peer" type="number" name="phone"
                                    id="">
                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">Phone
                                </legend>
                            </fieldset>
                            <x-error name="phone"></x-error>

                        </div>
                        <div>
                            <fieldset
                                class="border focus-within:border-green-500 trans border-solid border-gray-400 p-1 rounded">
                                <input value="{{ old('postal_code', $customer?->postal_code) }}"
                                    class="w-full border-0 bg-gray-100 px-5 py-1 focus:ring-0 peer" type="number"
                                    name="postal_code" id="">
                                <legend class="text-normal peer-focus:animate-bounce px-2 trans text-slate-700 ">
                                    postal_code
                                    Code</legend>
                            </fieldset>
                            <x-error name="postal_code"></x-error>

                        </div>

                    </div>
                    <button class="px-6 py-2 bg-green-500 rounded-xl text-white font-bold mt-8">Save & Continue</button>
                </form>
                <hr class="w-full h-2 border-slate-400 my-6">

            
                    <form action="/checkout" method="GET">
                        <h4 class="text-lg text-slate-900 font-semibold mb-3">Enter your coupon <span class="text-green-500">(optional)</span></h4>
                        <span>
                            <input name="coupon" value="{{ request()?->coupon  }}" class="p-3 rounded-lg my-2 shadow " type="text" placeholder="Enter coupon here">
                           
                        </span>
                       
                        <button class="text-green-500 ml-5 py-3 shadow bg-white rounded-lg px-3 font-semibold">Enter</button>
                    </form>
                    <x-error name="coupon"></x-error>
                    
                <div class="mt-2">
                    <form action="/checkout" method="POST">
                        @csrf

                        <h4 class="text-lg text-slate-900 font-semibold mb-3">Payment</h4>
                        <p class="text-normal font-semibold text-slate-900">Select Payment Method</p>
                        <input type="hidden" name="customer_id" value="{{ $customer?->id }}">
                        @if ($coupon)
                           
                            <input type="hidden" name="coupon" value="{{ $coupon->coupon_code }}">
                            
                        @endif
                      
                        @foreach ($payments as $payment)
                            <div class="mt-1">
                                <input
                                    class="payment_check checked:bg-green-500 checked:outline-green-600 checked:ring-0"
                                    id="{{ $payment->id }}" type="radio" name="payment" value="{{ $payment->id }}"
                                    {{ $payment->id === 1 ? 'checked' : '' }} />
                                <x-error name="payment"></x-error>
                                <label class="ml-3 text-slate-900"
                                    for="#{{ $payment->id }}">{{ $payment->payment_type }}</label>
                            </div>
                        @endforeach
                        <div class="payment-form hidden">
                            <h4 class="text-normal font-semibold text-slate-900 mt-4">Add Card</h4>
                            <div class="grid grid-cols-4 mt-2">
                                <div class="col-span-2">
                                    <label class="block" for="">Card Number</label>
                                    <input type="number" class="rounded">
                                </div>
                            </div>
                        </div>

                        <button type="submit" {{ $cart_items?->count() <= 0 ? 'disabled' : '' }}
                            class="disabled:opacity-60 px-6 py-2 mt-5 bg-green-500 rounded-xl checkout-btn text-white font-semibold tracking-wide">Make
                            Order</button>
                </div>
                </form>
            </div>

            {{-- cart --}}
            <div class="col-span-1 space-y-4">
                <div class="flex justify-between items-center">
                    <h6 class="text-2xl text-slate-800 font-semibold">In Your Cart</h6>
                    <form action="/home/cart" method="get">
                        @csrf
                        <button class="underline underline-offset-4 text-green-500">Edit</button>
                    </form>
                </div>
                <div class="space-y-1">

                    <div class="flex justify-between items-center">
                        <h6 class="text-normal text-slate-800 font-semibold">Subtotal</h6>
                        <p>${{ $cart_items?->count() ? $cart_items->sum('total') : 0 }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-normal text-slate-800 font-semibold">Shipping</h6>
                        <p>0</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-normal text-slate-800 font-semibold">Taxes</h6>
                        <p>0</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-normal text-slate-800 font-semibold">Discount</h6>
                        <p>{{ $coupon ? $coupon->discount : 0}}%</p>
                    </div>
                </div>
                <div class="flex justify-between items-center ">
                    <h6 class="text-normal text-slate-800 font-bold">Total</h6>
                    @php
                        $total = $cart_items?->sum('total')
                    @endphp
                    <p class="font-bold">{{ $cart_items?->count() ? ($coupon ? $total  - $total*($coupon->discount/100) : $total) : 0  }}</p>
                </div>

                <div class="py-5">
                    <p class="text-normal text-slate-800 font-bold tracking-wide">Arrives {{ now()->format('D,M d') }}
                        -
                        {{ now()->subHour()->format('h:i A') }}</p>
                </div>

                {{-- //cart item  --}}
                <div class="space-y-5">
                    @if ($cart_items)
                        @foreach ($cart_items as $cart_item)
                            <div class="flex gap-4">
                                <img src="{{ $cart_item->product->photo }}"
                                    class="w-20 h-20 block rounded-lg object-fill" alt="">
                                <div class="space-y-1">
                                    <h4 class="text-noraml text-slate-800 font-bold">{{ $cart_item->product->title }}
                                    </h4>
                                    <p class="text-slate-700 font-normal">Rating :
                                        {{ $cart_item->product->avg_rating }}/5</p>
                                    <p class="text-slate-700 font-normal">Quantity :
                                        {{ $quantity = $cart_item->quantity }} @
                                        ${{ $price = $cart_item->product->price }} </p>
                                    <p class="text-normal tex-slate-800 font-bold">{{ $price * $quantity }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <p class="capitalize">no item in the cart</p>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layout>
