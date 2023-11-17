
<section class="service  flex items-center container bg-slate-50">
    <div class="grid grid-cols-2 justify-center items-center h-[80vh]">
        <div
            class="grid grid-cols-3 gap-4 pr-36 justify-center [&>*:nth-child(3n-1)]:relative [&>*:nth-child(3n-1)]:top-20 [&>*:nth-child(3n-3)]:relative [&>*:nth-child(3n-3)]:bottom-10">
            {{-- service-card  --}}
          @foreach ($services as $service)
              <x-service-card :service="$service"></x-service-card>
          @endforeach
            

        </div>

        <div class="space-y-10">
            <div>
                <img class="w-20 h-16 block animate-pulse" src="../../assets/home_page/green_line.svg" />
                <h2 class="antialiased font-sans text-3xl font-bold text-slate-700 tracking-wide">
                    Use our service for
                    easy buying
                </h2>
            </div>
            <p class="text-lg font-semibold text-slate-700">
                let's
                <a class="text-green-500 tracking-wide font-bold" href>login</a> or
                <a class="text-green-500 font-bold" href>register</a> to order food what you
                like.
            </p>
            <ul class="list-image-checkmark space-y-5 ml-4 text-justify">
                <li class="text-normal tracking-wide font-normal">
                    The best recipe website design includes high-quality
                    images of the food or recipe being discussed. A simple website design with good quality ...
                </li>
                <li class="text-normal tracking-wide font-normal">
                    The best recipe website design includes high-quality
                    images of the food or recipe being discussed. A simple website design with good quality ...
                </li>
                <li class="text-normal tracking-wide font-normal">
                    The best recipe website design includes high-quality
                    images of the food or recipe being discussed. A simple website design with good quality ...
                </li>
            </ul>
        </div>
    </div>
</section>

