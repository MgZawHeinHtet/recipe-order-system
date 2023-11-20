@props(['orders'=>null])
<x-admin-layout>
    
<h2 class="text-3xl text-slate-500 font-bold">Order Management</h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Tracking Order
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment Method
                </th>
                <th scope="col" class="px-6 py-3">
                    Order Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($orders as $order)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">
                    #{{ $order->id }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $order->order_number }}
                </th>
                <td class="px-6 py-4">
                    {{ $order->customer?->first_name ." ". $order->customer?->last_name }}
                </td>
                <td class="px-6 py-4">
                    <span class="lowercase text-green-500 font-semibold">{{ $order->payment?->payment_type }}</span>
                </td>
                <td class="px-6 py-4">
                    {{ $order->order_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $order->order_status->id }}
                </td>
                <td class="px-6 py-4">
                    <a href="/dashboard/orders/{{ $order->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
          
        
        </tbody>
    </table>
    {{ $orders->links() }}
</div>

</x-admin-layout>