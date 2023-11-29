
@props(['product'=>null])

<div>
    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
    <select id="country" name="country_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
        <option disabled selected="">Select country</option>
        @foreach ($countries as $country)
            <option {{ $country->id == old('category_id',$product?->category_id) ? 'selected' : '' }} value="{{ $country->id }}">
                {{ $country->name }}</option>
        @endforeach

    </select>
    <x-error name="country_id"></x-error>
</div>
