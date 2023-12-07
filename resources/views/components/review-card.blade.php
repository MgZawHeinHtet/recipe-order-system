<div
    class="relative cursor-move ring-1 ring-green-500 grow-0 shrink-0 w-64 overflow-hidden testimonial-card  flex flex-col  h-80  pb-2 px-7 rounded-xl">
    @can('delete-review', $review)
        <div class="absolute top-3 right-3">
            <form action="/review/{{ $review->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"> <i class="fa-solid fa-trash text-lg text-red-600"></i>
                </button>
            </form>
        </div>
    @endcan
    <div class="testimonial-content h-[75%] relative pt-5 backdrop-blur-lg overflow-y-scroll">
        <p class=" text-slate-600 italic tracking-wider text-lg font-normal">
            {!! $review->description !!}
        </p>
    </div>
    <div class="h-[25%]">
        <hr class="my-3 h-0.5 bg-slate-300" />
        <div class="testimonial-head flex justify-between items-center">
            <img class="w-12 h-12 shadow-sm object-cover rounded-full" src="{{ $review->user->img }}" />
            <h5 class="text-lg font-normal italic text-slate-500 capitalize">{{ $review->user->name }}</h5>
        </div>
    </div>
</div>
