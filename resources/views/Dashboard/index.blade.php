<x-admin-layout>
    {{-- @dd($stocks) --}}
    <h4 class="text-2xl text-gray-300">Dashboard</h4>
    <div class="grid grid-cols-3 gap-7">
        <div class=" p-5 bg-teal-500 rounded-xl shadow-xl">
            <div class="flex justify-between items-center">
                <div>
                    <p class="capitalize text-sm text-white tracking-wide">total income</p>
                    <p class="text-2xl text-white font-semibold counter">{{ $total_income }}</p>
                </div>
                <div class="w-10 h-10 border-2 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-dollar-sign text-white"></i>
                </div>
            </div>

            <p class="text-sm text-white opacity-70">over all income since we started </p>
        </div>

        <div class=" p-5 bg-violet-500 rounded-xl shadow-xl">
            <div class="flex justify-between items-center">
                <div>
                    <p class="capitalize text-sm text-white tracking-wide">total order</p>
                    <p class="text-2xl text-white font-semibold counter">{{ $total_order }}</p>
                </div>
                <div class="w-10 h-10 border-2 rounded-lg flex items-center justify-center">
                    <i class="fab fa-first-order text-white"></i>
                </div>
            </div>

            <p class="text-sm text-white opacity-70">over all order since we started </p>
        </div>

        <div class=" p-5 bg-orange-500 rounded-xl shadow-xl">
            <div class="flex justify-between items-center">
                <div>
                    <p class="capitalize text-sm text-white tracking-wide">total product</p>
                    <p class="text-2xl text-white font-semibold counter">{{ $total_customer }}</p>
                </div>
                <div class="w-10 h-10 border-2 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-user text-white"></i>
                </div>
            </div>

            <p class="text-sm text-white opacity-70">we love our customer </p>
        </div>
    </div>

    <div class="w-full">
        <canvas class="w-full h-40" id="myChart"></canvas>
    </div>

    <div class="grid grid-cols-2 mt-10 shadow-xl pb-12 pt-6 rounded-lg">
        <div>
            <h4 class="text-white self-baseline mb-6 text-xl">Today Order</h4>
            <div class="h-[450px] flex-col flex items-center justify-center">
                <canvas class="h-40 w-40" width="200" id="myOrder"></canvas>
            </div>
        </div>
        <div>
            <h4 class="text-white self-baseline mb-6 text-xl">Most Order Customers</h4>

            <table class="w-full text-sm text-left mb-5 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-xs text-gray-300 uppercase bg-gray-700 ">
                    <tr>
                        <th class="px-6 py-4">name</th>
                      
                        <th class="px-6 py-4">Order time</th>
                        <th class="px-6 py-4">send coupon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <img class="w-12 h-12 rounded-full object-cover" src="{{ $customer->user->img }}" alt="">
                            <span>{{ $customer->first_name . ' ' . $customer->last_name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $customer->order_time }} orders
                        </td>
                        <td class="px-6 py-4">
                            <form action="/coupon/{{ $customer->user_id }}/send">
                                <button class="px-6 py-2 rounded-xl border-2 border-green-500">Send <i class="fa fa-paper-plane text-gray-300" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full">
        <h4 class="text-white self-baseline mb-6 text-xl">Low Stock Products</h4>
        <table class="w-full text-sm text-left mb-5 rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class=" text-xs text-gray-300 uppercase bg-gray-700 ">
                <tr>
                    <th class="px-6 py-4">no</th>
                    <th class="px-6 py-4">product name</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Stock</th>
                    <th class="px-6 py-4">is_publish</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stock_products as $key=> $product)
               
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">{{ $key+1 }}</td>
                    <td class="px-6 py-4 flex items-center gap-4">
                        <img class="w-12 h-12 rounded-full object-cover" src="{{ $product->photo }}" alt="">
                        <span>{{ $product->title }}</span>
                    </td>
                    <td class="px-6 py-4">
                       {{ $product->category->name }}
                    </td>
                    <td class="px-6 py-4">
                      $ {{ $product->price }}
                    </td>
                    <td class="px-6 py-4 ">
                        <span class="text-red-700 text-lg font-semibold">

                            {{ $product->stock }}
                        </span>
                     </td>
                     <td class="px-6 py-4">
                        {{ $product->is_publish ? 'True' : 'False' }}
                    <td class="px-6 py-4">
                        <a href="/dashboard/products/{{ $product->id }}/edit"
                            class="font-medium mr-3 text-green-600 dark:text-green-500 hover:underline"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $stock_products->links() }}</div>
    </div>
</x-admin-layout>

@section('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const orderChart = document.getElementById('myOrder');
        let labels = @json($labels);

        let stocks_arr_obj = @json($stocks->values());
        let incomes = @json($incomes);

        let todayOrders = @json($today_orders)

        console.log(todayOrders)
        let stocks = []

        stocks_arr_obj.map(stock => {
            stocks.push(stock.total)
        })


        var newOrderChart = new Chart(orderChart, {
            type: 'doughnut',
            data: {
                datasets: [{
                    
                    data: todayOrders,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                    ],
                }, ],
                labels: ['pending', 'processing', 'shipped', 'delivery', 'complete'],
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        formatter: (value) => {
                            if (value < 15) return '';
                            return value + '%';
                        },
                    },
                },
            },
        });

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels.sort(),
                datasets: [{
                        label: 'Income',
                        data: incomes,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: true,
                    },
                    {
                        label: 'Stock',
                        data: stocks,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: true,
                    },
                ],


            },
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 0.2,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {

                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Incomes and Stocks'
                        }
                    },
                    xAxes: [{
                        gridLines: {
                            display: true,
                            color: 'green',
                            lineWidth: 3
                        },

                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                            color: '#07C',
                            lineWidth: 3
                        },

                    }]
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            },
        });
    </script>
@endsection

@yield('javascripts')
