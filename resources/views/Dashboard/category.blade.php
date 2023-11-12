<x-admin-layout>
    <div class="flex justify-between items-center text-normal font-normal capitalize ">
        <h2 class="text-3xl text-slate-800 font-bold">Categories Managment</h2>
        <div>
            <a class="block rounded  bg-green-500 w-44 py-3 text-center hover:bg-green-700 transition-all duration-150 text-white"
                href="/dashboard/categories/create  "> <i class="fa-solid fa-plus text-white"></i> Add Category</a>
        </div>
    </div>

    <hr class="w-full border-dashed border-2  border-slate-500">
    <x-alert></x-alert>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4">
           <div></div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
        </div>


        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
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
                @foreach ($categories as $category)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6">
                            <span class="font-bold">{{ $category->id }}</span>
                        </td>
                        <th scope="row"
                            class="px-4 py-4 font-medium text-gray-900 whitespace-normal dark:text-white ">
                          
                            <span class="ml-2">{{ $category->name }}</span>
                        </th>
                      
                        <th scope="row"
                        class="px-4 py-4 font-medium text-gray-900 whitespace-normal dark:text-white ">
                      
                        <span class="ml-2">{{ $category->slug }}</span>
                    </th>
                        <td class="px-6 py-4">
                            {{ $category->created_at->format('d-m-y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <a href="/dashboard/categories/{{ $category->id }}/edit"
                                    class="font-medium mr-3 text-green-600 dark:text-green-500 hover:underline">Edit</a>
                                <form action="/dashboard/categories/{{ $category->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
        <div>

        </div>
    </div>

    <div class="paginator">
        {{ $categories->links() }}
    </div>
</x-admin-layout>
