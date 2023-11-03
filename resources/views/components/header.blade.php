<header class=" min-w-full">
    <nav class="mx-auto px-32 flex justify-between items-center">
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
                <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                    <a href="/dashboard"> Dashboard</a>
                </li>
                @endif

                <li class="text-lg font-medium hover:underline decoration-green-500 decoration-4 underline-offset-8">
                    <a href="/logout"> Log <i class="fa fa-sign-out" aria-hidden="true"></i> </a>
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
                <i class="fa-solid fa-cart-shopping text-green-500 text-xl"></i>
            </div>
            @if (Auth::check())
                <div class="">
                    <span>{{ auth()->user()->name }}</span>
                </div>
            @endif
        </div>
    </nav>
</header>
