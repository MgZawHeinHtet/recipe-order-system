<x-admin-layout>
    <section>
        <div class="grid grid-cols-3 gap-7">
            <div class="col-span-2 space-y-5">
                <h2 class="text-xl text-slate-400 font-bold">Order Number <span
                        class="text-green-500">#{{ $order->order_number }}</span></h2>

                <table class="w-full bg-gray-900  ring-1 ring-gray-800 rounded-lg text-left">
                    <thead>
                        <tr class="border-b border-gray-800">
                            <th class="px-6 text-slate-300 py-4 text-xl tracking-wide">Items Summary</th>
                            <th class="px-6 text-slate-300 py-4">QTY</th>
                            <th class="px-6 text-slate-300 py-4">Price</th>
                            <th class="px-6 text-slate-300 py-4">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_items->load('product') as $item)
                            <tr class="border-b border-gray-800">
                                <td class="px-6 py-4">
                                    <div class="flex items-center"><img class="w-10 h-10 object-fill"
                                            src="{{ $item->product->photo }}" alt="">
                                        <h4 class="pl-4 text-slate-300">{{ $item->product->title }}</h4>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-300">
                                    x{{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 text-slate-300">
                                    ${{ $item->product->price }}
                                </td>
                                <td class="px-6 py-4 text-slate-300">
                                    ${{ $item->total }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="w-full bg-gray-900  ring-1 ring-gray-800 rounded-lg text-left px-6 pb-4">
                    <div class="border-b py-4 border-gray-800">
                        <h4 class="text-lg text-slate-300 tracking-wide font-bold">Customer And Order Details</h4>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-gray-800">
                        <h6 class="font-semibold text-sm text-slate-400">Customer Name</h6>
                        <p class="text-slate-400">{{ $order->customer->first_name . ' ' . $order->customer->last_name }}</p>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-gray-800">
                        <h6 class="font-semibold text-sm text-slate-400">Customer Mail</h6>
                        <p class="text-slate-400">{{ $order->customer->email }}</p>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-gray-800">
                        <h6 class="font-semibold text-sm text-slate-400">Phone Number</h6>
                        <p class="text-slate-400">{{ $order->customer->phone }}</p>
                    </div>
                    <div class="flex justify-between items-center py-4 border-b border-gray-800">
                        <h6 class="font-semibold text-sm text-slate-400">Order Status</h6>
                        <p class="text-green-400">{{ $order->order_status_id }}</p>
                    </div>
                    <div class="flex justify-between items-center py-4  border-gray-800">
                        <h6 class="font-semibold text-sm text-slate-400">Payment Method</h6>
                        <p class="text-slate-400">{{ $order->payment->payment_type }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-5">
                <div class="w-full p-5 bg-gray-900 rounded-lg ring-1 ring-gray-800">
                    <h4 class="text-lg font-bold tracking-wide mb-5 text-green-500">Order Management</h4>
                    <div class="flex items-center gap-5">
                       
                        <div class="ml-3">
                            <p class="text-slate-400 text-normal font-semibold">Change Order Status Here</p>
                        </div>

                        <div>
                            <form action="/dashboard/orders/{{ $order->id }}" method="POST" onchange="submit()">
                                @csrf
                                @method('PATCH')
                                <select
                                    name="status"
                                    class="py-3 px-4 block w-full bg-gray-800 text-green-500 border-transparent rounded-lg text-sm focus:border-green-700 focus:ring-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    <option hidden selected>{{ $order->order_status_id }}</option>
                                    @foreach ($orderStatuses as $status )
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-full p-5 bg-gray-900 rounded-lg ring-1 ring-gray-800 space-y-3">
                    <h4 class="text-lg font-bold text-gray-300">Order Summary</h4>
                    <div class="flex justify-between items-center">
                        <h6 class="text-slate-400">Order Created</h6>
                        <p class="text-sm text-slate-400">{{ $order->created_at->format('D,M d,Y') }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-slate-400">Order Time</h6>
                        <p class="text-sm text-slate-400">{{ $order->created_at->format('h:i A') }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-slate-400">Subtotal</h6>
                        <p class="text-sm text-slate-400">${{ $order->order_items->sum('total')}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <h6 class="text-slate-400">Delivery fee</h6>
                        <p class="text-sm text-slate-400">$00.00</p>
                    </div>
                </div>

                <div class="w-full p-5 bg-gray-900 rounded-lg ring-1 ring-gray-800 flex justify-between items-center space-y-3">
                    <h4 class="text-normal font-bold tracking-wider text-slate-300">Total</h4>
                    <span class="text-green-500">${{ $order->order_items->sum('total') }}</span>
                </div>

                <div class="w-full p-5 bg-gray-900 rounded-lg ring-1 ring-gray-800 space-y-3">
                    <h4 class="text-lg font-bold text-slate-300">Delivery Address</h4>
                    <div class="space-y-1">
                        <h6 class="font-semibold text-slate-400">Address 1 : <span class="font-normal tracking-wide">{{ $order->customer->address1 }}</span></h6>
                        <h6 class="font-semibold text-slate-400">Address 2 : <span class="font-normal tracking-wide">{{ $order->customer->address2 }}</span></h6>
                        <h6 class="font-semibold text-slate-400">Postal code : <span class="font-normal tracking-wide">{{ $order->customer->postal_code }}</span></h6>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
