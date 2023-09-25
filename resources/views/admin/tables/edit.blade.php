<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 text-white">
                    Menu Index
                </a>
            </div>

            <div>

                <form method="post" action="{{ route('admin.tables.update', $tables->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ $tables->name ? $tables->name : '' }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="">
                        @error('name')
                            <div class="alert alert-danger text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="guestnumber"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest Number</label>
                        <input type="number" id="guestnumber" name="guest_number"
                            value="{{ $tables->guest_number ? $tables->guest_number : '' }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="">
                        @error('guest_number')
                            <div class="alert alert-danger text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">

                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status" class="form-multiselect block w-full mt-1">
                            @php
                                $statuses = App\Enums\TableStatus::cases();
                            @endphp

                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}" @selected($tables->status->value == $status->value)>{{ $status->name }}
                                </option>
                            @endforeach
                        </select>



                    </div>
                    <div class="mb-6">

                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <select name="location" id="location" class="form-multiselect block w-full mt-1">
                            @php
                                $locations = App\Enums\TableLocation::cases();
                            @endphp

                            @foreach ($locations as $location)
                                <option value="{{ $location->value }}" @selected($tables->location->value == $location->value)>
                                    {{ $location->name }}</option>
                            @endforeach
                        </select>

                    </div>



                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>


                </form>



            </div>


        </div>
    </div>
</x-admin-layout>
