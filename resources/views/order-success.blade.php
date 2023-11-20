<x-layout>
    <section class="container w-full h-[70%] my-20 flex items-center justify-center">
        
        <div style="width: 700px" class="h-[400px] space-y-6 relative shadow-xl flex flex-col items-center justify-center p-20 rounded overflow-hidden">
            <img class="absolute w-[100%] h-[50%] top-0 z-0 object-cover"  src="{{ asset('assets/colorful-dot.png') }}" alt="">
            <div class="h-96  w-full text-center z-10">
                <i class="fa-solid fa-circle-check  fa-5x text-green-500 animate-bounce"></i>
            </div>
            <div class="text-center z-10">
                <h4 class="text-lg font-semibold tracking-wide text-gray-700 mb-1">Thank you for ordering!</h4>
                <p class="text-sm/7 text-center  tracking-wide">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem aperiam aliquid omnis deleniti sint a necessitatibus, rem eius quia nisi </p>
            </div>
            <div class="flex z-10">
                <form action="">
                    <button class="rounded w-40 py-2 px-2 shadow mr-3">View Order</button>
                </form>
                <form action="">
                    <button class="rounded py-2 px-2 bg-green-500 uppercase text-white">continue shopping</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>