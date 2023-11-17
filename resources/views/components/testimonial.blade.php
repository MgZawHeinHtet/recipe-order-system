<section class="testimonial  px-32 py-16">
    @push('styles')
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    @endpush
    <div class="space-y-14">
      <h2
        class="text-center antialiased font-sans text-5xl font-bold capitalize text-slate-700 tracking-wide mb-10"
      >testimonial by customers</h2>
      <p class="mx-auto w-[800px] text-center text-xl font-normal text-slate-500 mb-10">In order to convince a total stranger to buy a product you are offering or purchase a service from <span class="font-bold text-green-500 py-0.5">your business</span> , some social proof might be necessary.</p>

    <div class="flex testimonial gap-10 px-3 py-2 overflow-x-scroll cursor-pointer">
        @foreach ($reviews as $review)
        <x-review-card :review="$review"></x-review-card>
        @endforeach
       
       
    </div>
     

     
    </div>

  </section>