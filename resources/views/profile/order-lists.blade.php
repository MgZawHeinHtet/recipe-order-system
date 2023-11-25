@props(['order' => null, 'orders' => null])
@section('javascript')
    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);

        }

        function copy(id) {
            const copy = document.getElementById(`copy-${id}`).innerHTML;
            navigator.clipboard.writeText(copy);
        }
    </script>
@endsection

@yield('javascript')

<x-profile-layout>
    <section class="">
        <h4 class="text-xl font-semibold tracking-wide mb-10">Track Order</h4>

        <div class="flex justify-between">
            <form class="border-2 border-green-500 rounded-lg " action="/profile/orders" action="get">
                @csrf
                <input placeholder="Track Order" value="{{ request('tracker') }}"
                    class="outline-none  px-4 py-2 rounded-lg mr-0" type="text" name="tracker">
                <button class="px-4 py-3 border-l-2 border-green-500 ml-0">Track</button>
            </form>

            @if ($status_id = $order?->order_status_id)

                <ol class="flex items-center w-[600px] relative ">

                    <li
                        class="flex w-full items-center before:text-dark before:content-['Pending']  before:absolute before:bottom-[-2rem] after:content-[''] after:w-full after:h-1 after:border-b  after:border-4 after:inline-block {{ $status_id > 1 ? 'after:border-green-500' : 'after:border-gray-400' }}">
                        <span
                            class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 {{ $status_id >= 1 ? 'bg-green-500' : 'bg-gray-500' }} shrink-0">
                            @if ($status_id >= 1)
                                <svg class="w-3.5 h-3.5  lg:w-4 lg:h-4 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @else
                                <i class="fa-solid fa-credit-card text-white"></i>
                            @endif

                        </span>

                    </li>

                    <li
                        class="flex w-full items-center before:content-['Processing']  before:absolute before:bottom-[-2rem] after:content-[''] after:w-full after:h-1 after:border-b  after:border-4 after:inline-block {{ $status_id > 2 ? 'after:border-green-500' : 'after:border-gray-400' }}">
                        <span
                            class="{{ $status_id >= 2 ? 'bg-green-500' : 'bg-gray-500' }}  flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0 ">

                            @if ($status_id >= 2)
                                <svg class="w-3.5 h-3.5  lg:w-4 lg:h-4 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @else
                                <i class="fa-solid fa-box-open text-white"></i>
                            @endif
                        </span>
                    </li>

                    <li
                        class="flex w-full items-center before:content-['Shipped']  before:absolute before:bottom-[-2rem] after:content-[''] after:w-full after:h-1 after:border-b  after:border-4 after:inline-block {{ $status_id > 3 ? 'after:border-green-500' : 'after:border-gray-400' }}">
                        <span
                            class="{{ $status_id >= 3 ? 'bg-green-500' : 'bg-gray-500' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0 ">

                            @if ($status_id >= 3)
                                <svg class="w-3.5 h-3.5  lg:w-4 lg:h-4 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @else
                                <i class="fa-solid fa-box text-white"></i>
                            @endif
                        </span>
                    </li>

                    <li
                        class="flex w-full items-center before:content-['Delivery'] before:absolute before:bottom-[-2rem] after:content-[''] after:w-full after:h-1 after:border-b  after:border-4 after:inline-block {{ $status_id > 4 ? 'after:border-green-500' : 'after:border-gray-400' }}">
                        <span
                            class="{{ $status_id >= 4 ? 'bg-green-500' : 'bg-gray-500' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0 ">

                            @if ($status_id >= 4)
                                <svg class="w-3.5 h-3.5  lg:w-4 lg:h-4 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            @else
                                <i class="fas fa-shipping-fast text-white"></i>
                            @endif
                        </span>
                    </li>

                    <li class="flex items-center w-full">
                        <span
                            class="flex items-center before:content-['Complete'] before:absolute before:bottom-[-2rem] justify-center w-10 h-10  rounded-full lg:h-12 lg:w-12 {{ $status_id == 5 ? 'bg-green-500' : 'bg-gray-500' }} shrink-0">
                            <svg class="w-4 h-4 = lg:w-5 lg:h-5 text-gray-100"
                                aria-hidden="true4
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                            </svg>
                        </span>
                    </li>

                </ol>
            @endif
        </div>

        <div class="flex justify-between items-center mt-16">
            <h4 class="font-semibold tracking-wide text-lg">Order list and status</h4>
            <form class="mr-12" action="" submit="onchange()">
                <input class="border-green-500 border-2 rounded-lg px-2 py-1 " type="date" name="date">
            </form>
        </div>
        {{-- ordere table  --}}
        @if ($orders?->count())

            <div class="mt-5">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Sr</th>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Track Order</th>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Date</th>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Method</th>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Status</th>
                            <th class="text-normal font-normal text-gray-600 px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr class=" border-b-2">
                                <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-gray-700"><span
                                        id="copy-{{ $index }}">{{ $order->order_number }}</span>
                                    <button onclick="copy({{ $index }})" data-tooltip-target="tooltip-default"
                                        type="button"
                                        class="text-white  focus:outline-none font-medium rounded-lg text-lg text-center"><i
                                            class="fa-solid fa-clipboard ml-1 text-green-500 text-lg"></i>
                                    </button>

                                    <div id="tooltip-default" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Copy Text!!
                                        <div class="tooltip-arrow " data-popper-arrow></div>
                                    </div>

                                </td>
                                <td class="px-6 py-4 font-bold">{{ $order->order_date }}</td>
                                <td class="px-6 py-4  ">{{ $order->payment->payment_type }}</td>
                                <td class="px-6 py-4 font-bold text-orange-400">{{ $order->order_status->status }}</td>
                                <td class="px-6 py-4"><a
                                        class="px-4 py-2 mr-3 bg-green-500 rounded-lg text-white font-semibold"
                                        href="/invoice/{{ $order->id }}">View</a><button
                                        class="{{ $order->order_status_id > 2 ? 'hidden':'' }} px-4 py-2 bg-red-500 rounded-lg text-white font-semibold">Cancel</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        @endif

    </section>
</x-profile-layout>
