@props(['order' => null])

<x-profile-layout>
    <section class="space-y-8">
        <h4 class="text-xl font-semibold tracking-wide">Track Order</h4>

        <div class="flex items-center justify-between">
            <form class="border-2 border-green-500 rounded-lg mt-5" action="/profile/orders" action="get">
                @csrf
                <input value="{{ request('tracker') }}" class="outline-none  px-4 py-2 rounded-lg mr-0" type="text"
                    name="tracker">
                <button class="px-4 py-2 border-l-2 border-green-500 ml-0">Track</button>
            </form>

            @if ($status_id = $order?->order_status_id)

                <ol class="flex items-center w-[600px] relative">

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
                        class="flex w-full items-center before:content-['Delivery'] before:absolute before:bottom-[-2rem] after:content-[''] after:w-full after:h-1 after:border-b  after:border-4 after:inline-block {{ $status_id > 4  ? 'after:border-green-500' : 'after:border-gray-400' }}">
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
                            class="flex items-center before:content-['Complete'] before:absolute before:bottom-[-2rem] justify-center w-10 h-10  rounded-full lg:h-12 lg:w-12 {{ $status_id == 5 ? "bg-green-500" : "bg-gray-500" }} shrink-0">
                            <svg class="w-4 h-4 = lg:w-5 lg:h-5 text-gray-100" aria-hidden="true4
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                            </svg>
                        </span>
                    </li>

                </ol>
            @endif
        </div>
    </section>
</x-profile-layout>
