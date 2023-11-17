<section class="bg-gray-50 ">
    <div class="flex flex-col items-center justify-center px-6 py-3 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="w-20 h-20 mr-2 object-contain" src="../assets/nav_logo.png" alt="logo">
            Be Enjoy!
        </a>
        <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Sign in to your account
                </h1>


                <form class="space-y-4 md:space-y-6" method="POST" action="/login">
                    @csrf
                    
                    <div>
                        @error('errMsg')
                            <span class="text-red-500 mt-3">{{ $message }}</span>
                        @enderror
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5    placeholder="name@email.com">
                        @error('email')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5  ">
                        @error('password')
                            <span class="text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 ">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-green-600 hover:underline ">Forgot
                            password?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        in</button>
                    <p class="text-sm font-light text-gray-500 ">
                        Don’t have an account yet? <a href="/signup"
                            class="font-medium text-green-500 hover:underline ">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
