<x-layout>
    <section class="container mt-10">
        <div class="grid grid-cols-3 gap-8">
            <div class="col-span-1">
                <img src="{{ asset('assets/contact.svg') }}" alt="">
            </div>
            <div class="col-span-2">
                <h2 class="text-5xl font-semibold text-gray-800 mb-10">Contact Us</h2>
                <form action="\mail\contact" method="POST">
                    @csrf
                
                    <div class="w-full  border-2 border-b-0 border-slate-800 flex p-10 pb-20 gap-x-36 items-center">
                        <div class="flex-1 space-y-4">
                            <div>
                                <label class="text-lg block tracking-wide" for="">Full Name</label>
                                <input name="name" value="{{ old('name',auth()->user()?->name) }}" class="w-full border-b-2 bg-gray-100 text-gray-500 border-gray-800" type="text">
                                <x-error name="name"></x-error>
                            </div>
                            <div>
                                <label class="text-lg block tracking-wide" for="">E-mail</label>
                                <input name="email" value="{{ old('email',auth()->user()?->email) }}" type="email" class="w-full border-b-2 bg-gray-100 text-gray-500 border-gray-800">
                                <x-error name="email"></x-error>
                            </div>
                            <div>
                                <label class="text-lg block tracking-wide" for="">Message</label>
                                <input name="message" value="{{ old('message') }}" type="text" class="w-full border-b-2 bg-gray-100 text-gray-500 border-gray-800">
                                <x-error name="message"></x-error>
                            </div>
                            <div>
                                <button class="px-6 mt-10 py-3 bg-green-500 w-full rounded-3xl font-semibold text-white">Contact Us</button>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="w-full grid grid-cols-2 items-center gap-10">
                                <div>
                                    <h6 class="font-semibold tracking-wide mb-1">Contact</h6>
                                    <p class="tracking-wide text-gray-600">nature83.com</p>
                                </div>
                                <div>
                                    <h6 class="font-semibold tracking-wide mb-1">Based In</h6>
                                    <p class="tracking-wide text-gray-600">Hmawbi,Singapore</p>
                                </div>
                                <div>
                                    <h6 class="font-semibold tracking-wide mb-1">Hotline Number</h6>
                                    <p class="tracking-wide text-gray-600">0956676980</p>
                                </div>
                                <div>
                                    <h6 class="font-semibold tracking-wide mb-1">Viber Number</h6>
                                    <p class="tracking-wide text-gray-600">+983273277</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
