
<div class="w-[700px] h-[700px] bg-gray-50 px-10">
    <div class="border-dotted  border-x-2 border- border-gray-400 w-full h-full px-10 py-12">
        <div class="flex justify-between items-center">
            <h4 class="uppercase text-2xl tracking-wide font-semibold text-gray-700">Nature Recipe</h4>
            <p class="text-lg text-gray-700">{{ $order->order_date }}</p>
        </div>
        <hr class="border border-gray-400 mt-3">

        <div class="flex justify-between my-10 text-gray-500 font-semibold tracking-wide">
            <div class="">
                <p>Order-Id : #{{ $order->id }}</p>
                <p>Track-number : {{ $order->order_number }}</p>
                <p>Payment Method : {{ $order->payment->payment_type }}</p>
                <p>Discount : {{ $order->discount }}%</p>
            </div>
            <div>
                <p>Name : {{ $order->customer->first_name .' ',$order->customer->last_name }}</p>
                <p>Phone : {{ $order->customer->phone }}</p>
                <p>Address1 : {{ $order->customer->address1 }}</p>
                <p>Address2 : {{ $order->customer->address2 }}</p>
            </div>
        </div>

        <div>
            <table  class="w-full text-left">
                <thead class="border-b-4 border-black">
                    <tr>
                        <th class="text-gray-700 uppercase py-4 text-lg">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                    <tr class="border-b-2 border-gray-400">
                        <td class="py-2">{{ $product->product->title }}</td>
                        <td class="py-2 px-2 border-x-2 border-gray-400 text-center">${{ $product->order_price }}</td>
                        <td class="py-2 px-2  border-x-2 border-gray-400 text-center">{{ $product->quantity }}</td>
                        <td class="py-2 text-right">${{ $product->total }}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
                <tfoot class="border-t-4 border-black">
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="py-1 px-2 border-r-2 border-gray-400 text-center text-semibold uppercase">Total</td>
                        <td class="py-1 text-right font-bold text-lg">${{ $products->sum('total') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-10 flex justify-between items-center">
            <div>
                <h4 class="uppercase text-lg font-semibold text-gray-600 mb-5">Our Address</h4>
                <p class="text-sm font-semibold text-gray-400 tracking-wider">46th,Hmawbi,Singapore</p>
                <p class="text-sm font-semibold text-gray-400 tracking-wider">1221332 32332  32332</p>
            </div>
            <div>
                <img class="inline-block w-32 h-24" src="/assets/signature.png"  alt="">
            </div>
        </div>
    </div>
</div>