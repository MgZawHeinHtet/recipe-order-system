@props(['type','country'=>null])

<h2 class="mb-4 text-xl font-bold capitalize text-gray-900 dark:text-white">Country {{ $type }}</h2>
<form action="{{ $type==="create" ? '/dashboard/countries' : '/dashboard/countries/'.$country->id }}" method="POST" >
    @csrf
    @if ($type==="edit")
        @method('PATCH')
    @endif
   
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country
                Name</label>
            <input type="text" name="name" id="name" value="{{ old('name',$country?->name)  }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Type category name" >
            <x-error name="name"></x-error>
        </div>

        <div class="sm:col-span-2">
            <label for="citizen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Citizen</label>
            <input type="text" name="citizen" id="citizen" value="{{ old('citizen',$country?->citizen)  }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Type  citizen" >
            <x-error name="citizen"></x-error>
        </div>

        <div class="sm:col-span-2">
            <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal_code
                </label>
            <input type="number" name="postal_code" id="postal_code" value="{{ old('postal_code',$country?->postal_code)  }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Type category postal_code" >
            <x-error name="postal_code"></x-error>
        </div>
    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">
        {{ $type === 'edit' ? 'Save':'Create' }}
    </button>
</form>