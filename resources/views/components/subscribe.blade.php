<div class="my-12 space-y-6">
    <h2 class="text-center text-4xl/10  font-bold uppercase tracking-wider text-slate-700">Join our eat well, be well
        <br> culture.</h2>
    <p class="text-center tracking-wide text-lg text-slate-600">Stay up to date with our new opening,and get
        notification when we update new recipe.</p>
    <form class="w-[75%] mx-auto" action="{{ auth()->check() ? '/subscribe' : '/signup' }}" method="{{ auth()->check() ? 'POST':'GET' }}">
       @csrf
       
        <div class="border-y-2 h-24 grid grid-cols-3 border-slate-500">
            <div class="col-span-2 flex items-center justify-center border-r-2 border-slate-500">
                <input name="email" type="email" class="bg-slate-200 w-[90%] h-14 px-5" placeholder="Enter your email ">

            </div>
            <div class="flex items-center justify-center  border-slate-500">
                <button type="submit"
                    class="bg-green-500 w-[80%] h-14 text-base uppercase text-slate-100 hover:bg-green-600 transition-all duration-200">{{ auth()->check() ? 'Subscribe us':'Sign Up' }}</button>
            </div>
        </div>
        <x-error name="email"></x-error>
    </form>
    
</div>