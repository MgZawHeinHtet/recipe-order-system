<x-profile-layout>
    <x-alert class="mb-5"></x-alert>
    <div class="space-y-5 mt-8 relative">
        <h6 class="uppercase text-sm font-semibold text-gray-800">Personal Setting /</h6>
        <h4 class="text-4xl font-bold text-gray-900 tracking-wide">Account</h4>

        <div class="absolute top-0 right-0">
            <button class="setting-toogle outline-none border-none hover:animate-spin"><i
                    class="fa fa-cog text-4xl text-green-500" aria-hidden="true"></i>
            </button>
        </div>

        {{-- profile-show  --}}
        <div class="profile-show ">

            <div class="mb-10 flex gap-10 items-center">
                <div><img class="w-36 h-36 rounded-full shadow object-cover ring-1 p-3 ring-green-500"
                        src="{{ $user->img }}" alt=""></div>

            </div>

            <div class="grid grid-cols-2 w-[75%] gap-x-12 gap-y-5">
                <div class="col-span-1">
                    <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700" for="">Full
                        Name</label>
                    <p class="text-base tracking-wide text-gray-800 w-full py-3 ring-1 ring-slate-400 rounded-lg px-3">
                        {{ $user->name }}</p>
                </div>
                <div>
                    <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                        for="">Username</label>
                    <p class="text-base tracking-wide text-gray-800 w-full py-3 ring-1 ring-slate-400 rounded-lg px-3">
                        {{ $user->username }}</p>
                </div>
                <div>
                    <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                        for="">Email</label>
                    <p class="text-base tracking-wide text-gray-800 w-full py-3 ring-1 ring-slate-400 rounded-lg px-3">
                        {{ $user->email }}</p>
                </div>
                <div>
                    <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700" for="">Date Of
                        Birth</label>
                    <p class="text-base tracking-wide text-gray-800 w-full py-3 ring-1 ring-slate-400 rounded-lg px-3">
                        {{ $user->dob }}</p>
                </div>
                <div class="">
                    <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                        for="">Gender</label>
                    <p class="text-base tracking-wide text-gray-800 w-full py-3 ring-1 ring-slate-400 rounded-lg px-3">
                        {{ $user->gender }}</p>

                </div>

            </div>


        </div>

        {{-- edit setting  --}}
        <div class="profile-edit hidden">
            <form action="/profile/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-10 flex gap-10 items-center">
                    <div><img class="w-36 h-36 rounded-full shadow object-cover p-3 ring-1 ring-green-500"
                            src="{{ $user->img }}" alt=""></div>
                    <div><label for="photo" class="px-6 py-3 rounded-lg bg-green-500 text-white">Choose
                            Image</label> <input class="hidden" type="file" name="img" id="photo"></div>
                        <x-error name="img"></x-error>
                </div>

                <div class="grid grid-cols-2 w-[75%] gap-x-12 gap-y-5">
                    <div class="col-span-1">
                        <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                            for="">Full Name</label>
                        {{-- <p class="text-base tracking-wide text-gray-800">Zaw Hein Htet</p> --}}
                        <input
                        value="{{ old('name',$user->name) }}"
                            name="name"
                            class="ring-1 focus-visible:outline-none focus:border-green-500 focus:ring-green-500 w-full ring-gray-200 py-2 px-4 rounded-lg"
                            type="text">
                            <x-error name="name"></x-error>
                    </div>
                    <div>
                        <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                            for="">Username</label>
                        {{-- <p class="text-base tracking-wide text-gray-800">Zaw-hein-htet</p> --}}
                        <input
                            value="{{ old('username',$user->username) }}"
                            name="username"
                            class="ring-1 focus-visible:outline-none focus:border-green-500 focus:ring-green-500 w-full ring-gray-200 py-2 px-4 rounded-lg"
                            type="text">
                            <x-error name="username"></x-error>
                    </div>
                    <div>
                        <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                            for="">Email</label>
                        {{-- <p class="text-base tracking-wide text-gray-800">zaw@gmial.com</p> --}}
                        <input
                        value="{{ old('email',$user->email) }}"
                            name="email"
                            class="ring-1 focus-visible:outline-none focus:border-green-500 focus:ring-green-500 w-full ring-gray-200 py-2 px-4 rounded-lg"
                            type="email">
                            <x-error name="email"></x-error>
                    </div>
                    <div>
                        <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                            for="">Date Of Birth</label>
                        {{-- <p class="text-base tracking-wide text-gray-800">6/6/7</p> --}}
                        <input
                            value="{{ old('dob',$user->dob) }}"
                            class="ring-1 focus-visible:outline-none  focus:bg-green-500 focus:ring-green-500 w-full ring-gray-200 py-1.5 px-4 rounded-lg"
                            type="date" name="dob">
                            <x-error name="dob"></x-error>
                    </div>
                    <div class="">
                        <label class="block mb-3 uppercase font-semibold tracking-wide text-gray-700"
                            for="">Gender</label>
                        {{-- <p class="text-base tracking-wide text-gray-800">Male</p> --}}

                        <input  class="w-5 h-5 accent-green-500" type="radio" id="g1" {{ $user->gender == 'male' ? 'checked':'' }}  value="male"
                            name="gender">
                        <label class="pb-8" for="g1">Male</label>
                        <input {{ $user->gender == 'female' ? 'checked' : '' }} class="ml-10 w-5 h-5 accent-green-500" type="radio" id="g2" value="female"
                            name="gender">
                        <label for="g2">Female</label> 
                        <x-error name="gender"></x-error>
                    </div>

                </div>
                <div class="mt-10">
                    <button class="px-10  py-2 text-white bg-green-500 text-semibold rounded-lg">Save &
                        Continue</button>
                </div>
            </form>
        </div>



    </div>
    <hr class="my-12">

    <div class="grid grid-cols-3 gap-10">
        <div class="col-span-1">
            <h4 class="text-lg font-semibold tracking-wide text-gray-900 mb-2">Change Password</h4>
            <p class="text-gray-700">Update your password associated with your account.</p>
        </div>
        <div class="col-span-2">
            <form class="space-y-5" action="/profile/user/{{ $user->id }}/password" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-base font-semibold tracking-wide mb-3" for="">Current
                        password</label>
                    <input name="current-password" value="{{ old('current-password') }}" class="w-full outline-none ring-1 ring-slate-400 focus:ring-green-500 py-2 rounded-lg px-4"
                        type="password">
                        <x-error name="current-password"></x-error>
                </div>
                <div>
                    <label class="block text-base font-semibold tracking-wide mb-3" for="">New password</label>
                    <input value="{{ old('new-password') }}" name="new-password" class="w-full outline-none ring-1 ring-slate-400 focus:ring-green-500 py-2 rounded-lg px-4"
                        type="password">
                        <x-error name="new-password"></x-error>
                </div>
                <div>
                    <label name="confirm-password" class="block text-base font-semibold tracking-wide mb-3" for="">Confirm
                        password</label>
                    <input name="confirm-password" value="{{ old('confirm-password') }}" class="w-full outline-none ring-1 ring-slate-400 focus:ring-green-500 py-2 rounded-lg px-4"
                        type="password">
                        <x-error name="confirm-password"></x-error>
                </div>
                <div>
                    <button type="submit" class="px-6 py-2 bg-green-500 rounded-lg text-white font-bold">Save</button>
                </div>
            </form>
        </div>
    </div>

    <hr class="my-12">

    <div class="grid grid-cols-3 gap-10">
        <div class="col-span-1">
            <h4 class="text-lg font-semibold tracking-wide text-gray-900 mb-2">Delete account</h4>
            <p class="text-gray-700">No longer want to use our service?You can delete your account here.This action is
                not revisible.All information related to this account will be deleted permantely.</p>
        </div>
        <div class="col-span-2">
            <form class="space-y-5" action="">

                <div>
                    <button class="px-6 py-2 text-white rounded-lg bg-red-500 font-bold">Yes, I deleted my
                        account</button>
                </div>
            </form>
        </div>
    </div>

</x-profile-layout>
