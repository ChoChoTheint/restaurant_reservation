<!-- ession_start(); -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}" class="px-4 py-2 bg-indigo-500 text-white">
                    New Menu 
                </a>
            </div>
            <div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                   Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $menu->name}}
                </td>
                
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $menu->description}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="{{ Storage::url($menu->image) }}" alt="pic" class="w-16 h-16 rounded">
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $menu->price}}
                </td>
            
               

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <div class="flex space-x-2">
                    <a href="{{ route('admin.menus.edit',$menu->id) }}" class="px-4 py-2 bg-green-500 text-white rounded">Edit</a>
                    <form class="px-4 py-2 bg-red-500 rounded text-white" action="{{ route('admin.menus.destroy',$menu->id) }}" method="post" onsubmit="return confirm('Are You sure?');">
                         @csrf
                         @method('DELETE')
                         <button type="submit">Delete</button>
                    </form>
                   </div>
                </td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-admin-layout>
