@props(['orders' => null])
<x-admin-layout>

    <h2 class="text-3xl text-slate-500 font-bold">Order Management</h2>
    <div>

        <button id="dropdownDefaultButton" data-dropdown-togglek\="dropdown"
            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
            type="button">Filter By Status <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="?"
                        class="block px-4 py-2 hover:bg-green-500">All</a>
                </li>
                @foreach ($statuses as $status)
                <li>
                    <a href="?status={{ $status->id }}"
                        class="block px-4 py-2 hover:bg-green-500">{{ $status->status }}</a>
                </li>
                @endforeach
            
            </ul>
        </div>

    </div>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left mb-5 rtl:text-right text-gray-500 dark:text-gray-400">
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
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            #{{ $order->id }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->order_number }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $order->customer?->first_name . ' ' . $order->customer?->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="lowercase text-green-500 font-semibold">{{ $order->payment?->payment_type }}</span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->order_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->order_status->status }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/orders/{{ $order->id }}"
                                class="font-medium text-green-600 dark:text-green-500 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>

</x-admin-layout>
