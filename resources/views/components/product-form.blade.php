@props(['type','product'=>null])

<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Product {{ $type }}</h2>
<form action="{{ $type==="create" ? '/dashboard/products' : '/dashboard/products/'.$product?->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($type==="edit")
        @method('PATCH')
    @endif
   
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                Name</label>
            <input type="text" name="title" id="name" value="{{ old('title',$product?->title)  }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Type product name" >
            <x-error name="title"></x-error>
        </div>

        
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                for="default_size">Photo</label>
            <input
                name="photo"
                class="block w-full mb-5 text-sm p-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-gray-400 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                id="default_size" type="file">
                <x-error name="photo"></x-error>
                @if ($type === 'edit')
                    <img width="100" height="100" class="object-contain" src="{{ $product->photo }}" alt="">
                @endif
        </div>

        <div class="w-full">
            <label for="price"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="price" value="{{ old('price',$product?->price) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="$0-0-0" >
                <x-error name="price"></x-error>
        </div>


        <x-category :product="$product"></x-category>

        <div class="sm:col-span-2">
            <label for="description"
                
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea  rows="8" name="description" 
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Your description here">{{old('description',$product?->description) }}
            </textarea>
                <br>
                <x-error name="description"></x-error>
        </div>


    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">
        {{ $type === 'edit' ? 'Save':'Create' }}
    </button>
</form>