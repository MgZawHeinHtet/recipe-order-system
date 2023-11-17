<header class=" min-w-full">
    <nav class="mx-auto container flex justify-between items-center">
        <!-- logo  -->
        <div class="logo flex items-center">
            <img class="w-24 h-24" loading="eager" src="../assets/nav_logo.png" alt="Logo" />
        </div>

        <!-- nav link  -->
        <ul class="flex space-x-14 font-serif">
            <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                <a href="/">Home</a>
            </li>
            <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                <a>Menu</a>
            </li>


            @if (Auth::check())
                @if (auth()->user()->is_admin)
                    <li
                        class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                        <a href="/dashboard"> Dashboard</a>
                    </li>
                @endif

                <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"> Log <i class="fa fa-sign-out" aria-hidden="true"></i> </button>
                    </form>
                </li>
            @else
                <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                    <a href="/login">Login</a>
                </li>
            @endif

        </ul>

        <!-- feature btn  -->
        <div class="flex items-center space-x-6">
            <div class="shopping-cart">
                <a href="/home/cart"
                    class="relative inline-flex items-center p-2 text-sm font-medium text-center text-white bg-white-700 rounded-lg hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-white-300 dark:bg-white-600 dark:hover:bg-white-700 dark:focus:ring-white-800">
                    <i class="fa-solid fa-cart-shopping text-green-500 text-xl"></i>
                    <span class="sr-only">Notifications</span>
                    <div
                        class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 ">
                        {{ auth()->check()&&auth()->user()->cart? auth()->user()->cart->cart_items->count(): 0 }}

                    </div>
                </a>
            </div>
            @auth
            <div class="dropdown">
                <span class="rounded-full"><img class="w-10 h-10 p-1 rounded-full object-cover ring-2 ring-gray-300 dark:ring-green-500" src="{{ auth()->user()->img }}" alt=""></span>
                <div class="dropdown-content rounded-xl">
                  <p class="text-white">{{ auth()->user()->name }}</p>
                  <hr class="my-2">
                  <div class="my-2">
                    <a class="gap-x-10 py-2" href="/profile/user"><i class="fa-solid fa-user text-xl text-white"></i> <span class="text-white ml-5">Profile</span></a>
                  </div>
                  <div class="my-2">
                    <a class="gap-x-10 py-2" href=""><i class="fa-solid fa-bell text-xl text-white"></i> <span class="text-white ml-5">Notification</span></a>
                  </div>
                  <div class="my-2">
                    <a class="gap-x-10 py-2" href=""><i class="fa-solid fa-clock text-xl text-white"></i> <span class="text-white ml-5">Order History</span></a>
                  </div>
                  <hr class="my-2">
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="text-white" type="submit"> Log <i class="fa fa-sign-out" aria-hidden="true"></i> </button>
                </form>
                </div>
              </div>
            @endauth
           
        </div>
    </nav>
</header>
