@props(['product'=>null])

<div>
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
    <select id="category" name="category_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
        <option disabled selected="">Select category</option>
        @foreach ($categories as $category)
            <option {{ $category->id == old('category_id',$product?->category_id) ? 'selected' : '' }} value="{{ $category->id }}">
                {{ $category->name }}</option>
        @endforeach

    </select>
    <x-error name="category_id"></x-error>
</div>
