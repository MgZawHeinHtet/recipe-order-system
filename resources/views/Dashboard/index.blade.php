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
                    <p class="capitalize text-sm text-white tracking-wide">total customer</p>
                    <p class="text-2xl text-white font-semibold counter">{{ $total_customer }}</p>
                </div>
                <div class="w-10 h-10 border-2 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-user text-white"></i>
                </div>
            </div>

            <p class="text-sm text-white opacity-70">we love our customer </p>
        </div>
    </div>

    <div>
        <canvas class="w-full h-40" id="myChart"></canvas>
    </div>
</x-admin-layout>

@section('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    <script>
        
     
        const ctx = document.getElementById('myChart');
        let labels = @json($labels->values());

        let stocks_arr_obj = @json($stocks->values());
        let incomes_arr_obj = @json($incomes->values());
        let incomes = [];
        let stocks = []

        incomes_arr_obj.map(income => {
            incomes.push(income.total)
        })

        stocks_arr_obj.map(stock => {
            stocks.push(stock.total)
        })

        console.log(stocks)
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
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
                        easing: 'easeInQuad',
                        from: 0.3,
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
                    }
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
