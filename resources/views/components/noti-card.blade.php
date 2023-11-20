<div
    class="py-6 px-10 border-l-4 border-l-green-500 border  border-b-gray-300 {{ !$notification->is_read ? 'bg-gray-200' : '' }}">
    <div class="flex gap-2 items-center justify-between">
        <div class="flex gap-x-3 items-center">
            <p class="font-bold text-base tracking-wide mb-1"><x-notification-message
                    type="{{ $notification->noti_type }}" recipent="Admin"></x-notification-message></p>

            <span
                class="{{ $notification->is_read ? 'hidden' : '' }}  w-3 h-3 inline-block rounded-full bg-green-600"></span>
        </div>

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white  px-1  focus:outline-none  font-medium rounded-lg text-sm  text-center"
            type="button"> <i class="fa-solid fa-ellipsis-vertical text-green-500 text-xl"></i>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li class="{{ $notification->is_read ? 'hidden' : '' }}">
                    <form action="/profile/notifications/{{ $notification->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button 
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><img class="w-4 h-4 inline-block mr-3" src="{{ asset('assets/book-page.png') }}" alt="">Make as read</button>
                    </form>
                </li>
                <li>
                    <form action="/profile/notifications/{{ $notification->id }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="block text-left w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa fa-trash text-red-500 mr-3" aria-hidden="true"></i>
                            Delete
                            </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
    <span class="font-normal text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
</div>
