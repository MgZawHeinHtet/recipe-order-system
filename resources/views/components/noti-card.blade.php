<div
    class="py-6 px-10 border-l-4 border-l-green-500 border border-t-0 border-b-gray-700 {{ !$notification->is_read ? 'bg-gray-600' : '' }}">
    <div class="flex gap-2 items-center justify-between">
        <div class="flex gap-x-3 items-center">
            <p class="font-bold text-base tracking-wide mb-1 text-slate-400"><x-notification-message
                    type="{{ $notification->noti_type }}" :recipent="$notification->recipent->name"></x-notification-message></p>

            <span
                class="{{ $notification->is_read ? 'hidden' : '' }}  w-3 h-3 inline-block rounded-full bg-green-600"></span>
        </div>

        <div class="flex">
            <form class="{{ $notification->is_read ? 'hidden':'' }}" action="/profile/notifications/{{ $notification->id }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="block px-1 "><img
                        class="w-5 h-5 inline-block mr-3" src="{{ asset('assets/book-page.png') }}" alt=""></button>
            </form>
            <form action="/profile/notifications/{{ $notification->id }}" method="POST">
                @csrf   
                @method('DELETE')
                <button type="submit"
                    class="block text-left w-full px-1 "><i
                        class="fa fa-trash text-red-500 text-lg mr-3" aria-hidden="true"></i>
                    
                </button>
            </form>
        </div>

     

    </div>
    <span class="font-normal text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
</div>
