<!doctype html>
<html class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="overflow-x-hidden">
    <aside class="w-96 h-screen bg-gray-200 p-20 space-y-14 fixed top-0 left-0 z-40 transition-transform -translate-x-full sm:translate-x-0">
        <a href="/" class="text-2xl font-bold text-gray-800 font-serif">Nature Recipe</a>
        <ul class="space-y-2 font-medium">
            <p class="text-gray-600 text-sm mb-4 tracking-wider font-semibold uppercase">Presonal Setting</p>
            <li>
                <a class="font-bold text-gray-900" href="/profile/user">
                    Account
                </a>
            </li>
        </ul>

        <ul class="space-y-2 font-medium">
            <p class="text-gray-600 text-sm mb-4 tracking-wider font-semibold uppercase">Tools and operation</p>
            <li>
                <a class="font-bold text-base text-gray-800" href="/profile/notifications">
                    Notifications
                </a>
            </li>
            <li>
                <a class="font-bold text-base text-gray-800" href="/profile/orders">
                    Order Lists
                </a>
            </li>
            <li>
                <a class="font-bold text-base text-gray-800" href="/profile/ratedProduct">
                    Rated Products
                </a>
            </li>
        </ul>
    </aside>

    <div class="sm:ml-96">
        <div class="p-20 py-16">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</body>
</html>
