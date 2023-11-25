<x-profile-layout>
  
    <div class="flex justify-center relative">
        <x-invoice :order="$order" :products="$products"></x-invoice>
        <form action="/invoice/{{ $order->id }}/download" method="GET">
            @csrf
            <button type="submit" class="absolute w-10 h-10 top-0 right-60 rounded-full hover:shadow-xl"><i class="fa fa-download" aria-hidden="true"></i>
            </button>
        </form>
       
    </div>
</x-profile-layout>
