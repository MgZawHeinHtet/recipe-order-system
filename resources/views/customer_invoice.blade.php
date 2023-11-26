<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            height: 800px;
        }

        .inner-invoice {

            width: 100%;
            height: 100%;

        }

        .header-invoice {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-invoice h4 {
            font-size: 2rem;
            margin: 0;
            paddign: 0;
            color: rgb(22, 200, 22)
        }

        .header-incoive p {
            font-size: 2rem;
        }

        .order-detail {
            display: flex;
            justify-content: space-between;
            padding: 0;
            font-weight: bold
        }

        table {
            width: 100%;
            text-align: left
        }

        thead {
            border-bottom: 2px solid black
        }

        table td {
            padding: 1rem 0;
            border-bottom: 1px solid black
        }

        th {
            border-bottom: 4px solid black;
            font-size: 2rem
        }
    </style>

</head>

<body>

    <div class="invoice-container w-[700px] h-[700px] bg-gray-50 px-10">
        <div class="inner-invoice border-dotted  border-x-2 border- border-gray-400 w-full h-full px-10 py-12">
            <div class="header-invoice flex justify-between items-center">
                <h4 class="uppercase text-2xl tracking-wide font-semibold text-gray-700">Nature Recipe</h4>
                <p class="text-lg text-gray-700">{{ $order->order_date }}</p>
            </div>
            <hr class="border border-gray-400 mt-3">

            <div style="" class="flex justify-between my-10 text-gray-500 font-semibold tracking-wide">
                <div style="float: left" class="">
                    <p>Order-Id : #{{ $order->id }}</p>
                    <p>Track-number : {{ $order->order_number }}</p>
                    <p>Payment Method : {{ $order->payment->payment_type }}</p>

                </div>
                <div style="float: right;">
                    <p>Name : {{ $order->customer->first_name . ' ', $order->customer->last_name }}</p>
                    <p>Phone : {{ $order->customer->phone }}</p>
                    <p>Address1 : {{ $order->customer->address1 }}</p>
                    <p>Address2 : {{ $order->customer->address2 }}</p>
                </div>
            </div>

            <div style="clear: both;">
                <table class="w-full text-left">
                    <thead class="border-b-4 border-black">
                        <tr>
                            <th style="text-align: left" colspan="4" class="text-gray-700 uppercase py-4 text-lg">
                                Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b-2 border-gray-400">
                                <td class="py-2">{{ $product->product->title }}</td>
                                <td style="padding: 1rem;text-align: center;border-left:1px solid black "
                                    class="py-2 px-2 border-x-2 border-gray-400 text-center">
                                    ${{ $product->product->price }}</td>
                                <td style="padding: 1rem;text-align: center;border-left: 1px solid black"
                                    class="py-2 px-2  border-x-2 border-gray-400 text-center">{{ $product->quantity }}
                                </td>
                                <td style="padding: 1rem;text-align: right;border-left: 1px solid black"
                                    class="py-2 text-right">${{ $product->total }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot class="border-t-4 border-black">
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="border-left: 1px solid black;text-align: center"
                                class="py-1 px-2 border-r-2 border-gray-400 text-center text-semibold uppercase">Total
                            </td>
                            <td style="border-left: 1px solid black;text-align: right"
                                class="py-1 text-right font-bold text-lg">${{ $products->sum('total') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div style="display: flex;justify-content: space-between" class="mt-10 flex justify-between items-center">
                <div>
                    <h4 class="uppercase text-lg font-semibold text-gray-600 mb-5">Our Address</h4>
                    <p class="text-sm font-semibold text-gray-400 tracking-wider">46th,Hmawbi,Singapore</p>
                    <p class="text-sm font-semibold text-gray-400 tracking-wider">1221332 32332 32332</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
