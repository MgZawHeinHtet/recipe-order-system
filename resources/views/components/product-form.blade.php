@props(['type', 'product' => null])

<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Product {{ $type }}</h2>
<form action="{{ $type === 'create' ? '/dashboard/products' : '/dashboard/products/' . $product?->id }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if ($type === 'edit')
        @method('PATCH')
    @endif

    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                Name</label>
            <input type="text" name="title" id="name" value="{{ old('title', $product?->title) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Type product name">
            <x-error name="title"></x-error>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Photo</label>
            <input name="photo"
                class="block w-full mb-5 text-sm p-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-gray-400 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                id="default_size" type="file">
            <x-error name="photo"></x-error>
            @if ($type === 'edit')
                <img width="100" height="100" class="object-contain" src="{{ $product->photo }}" alt="">
            @endif
        </div>

        <div class="w-full">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="price" value="{{ old('price', $product?->price) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="$0-0-0">
            <x-error name="price"></x-error>
        </div>

        <div class="w-full">
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
            <input type="text" name="country" id="country" value="{{ old('country', $product?->country) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="$0-0-0">
            <x-error name="country"></x-error>
        </div>
        <x-category :product="$product"></x-category>


        <div class="sm:col-span-2">
            <label for="ingredients"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingredients</label>
            <input type="text" name="ingredients" id="name" value="{{ old('ingredients', $product?->ingredients) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Eg : banana,mango,papaya">
            <x-error name="ingredients"></x-error>
        </div>

        
        <div class="w-full">
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product?->stock) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Pls Enter your stock">
            <x-error name="stock"></x-error>
        </div>

        <div class="w-full">
            <label for="is_publish" class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Is Publish</label>

            <label class="relative inline-flex items-center me-5 cursor-pointer">
                <input name="is_publish" type="checkbox" value=1 class="sr-only peer" {{ old('is_publish',$product?->is_publish) ? 'checked="checked"' : '' }}>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
               
              </label>
        </div>

        <div class="sm:col-span-2">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea rows="8" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Your description here">{{ old('description', $product?->description) }}
            </textarea>
            <br>
            <x-error name="description"></x-error>
        </div>

    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">
        {{ $type === 'edit' ? 'Save' : 'Create' }}
    </button>
</form>
