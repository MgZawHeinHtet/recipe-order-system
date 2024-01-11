<x-admin-layout>
    
    <div class="flex justify-between items-center text-normal font-normal capitalize ">
        <h2 class="text-3xl text-slate-400 font-bold">Trash Bin</h2>
        <div class="flex gap-2">
            <a class="block rounded  bg-orange-600 w-44 py-3 text-center hover:bg-orange-700 transition-all duration-150 text-white"
                href="/dashboard/products/create "> <i class="fa-solid fa-recycle text-lg mr-1"></i> Restore All</a>
        
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class=" px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Is_publish
                </th>
                <th scope="col" class="px-6 py-3">
                    Created_at
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($trash_products->count())
                
            @foreach ($trash_products as $product)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6">
                        <span class="font-bold">{{ $product->id }}</span>
                    </td>
                    <th scope="row"
                        class="px-4 py-4 font-medium text-gray-900 whitespace-normal dark:text-white flex items-center ">
                        <img class="w-10 h-10 rounded-full" src="{{ $product->photo }}" alt="">
                        <span class="ml-2">{{ $product->title }}</span>
                    </th>
                    <td class="px-4 py-4">
                        <span class="line-clamp-2 w-72">
                            {{ $product->description }}
                        </span>
                    </td>
                    <td class="px-6 py-4 ">
                        {{ $product->category?->name ??  'Deleted Category'}}
                    </td>
                    <td class="px-6 py-4">
                        ${{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->is_publish ? 'True' : 'False' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->created_at->format('d-m-y') }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="/trash/products/{{$product->id}}/restore" method="POST">
                            @csrf
                            <button type="submit" class="font-medium text-orange-500 hover:underline"><i class="fa-solid fa-recycle"></i>Restore</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <tr class="w-full h-[600px]">
                    <td colspan="8" class="text-center text-lg tracking-wider">No Items found 🤷‍♀️</td>
                </tr>
            @endif
        </tbody>

    </table>
    <div>
        {{ $trash_products->links() }}
    </div>
</x-admin-layout>