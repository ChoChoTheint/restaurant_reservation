<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservation.index') }}" class="px-4 py-2 bg-indigo-500 text-white">
                    Reverstaion Index
                </a>
            </div>

            <div>
                <form method="post" action="{{ route('admin.reservation.update',$reservations->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" id="first_name" name="first_name"  value="{{ $reservations->first_name ? $reservations->first_name : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" id="last_name" name="last_name"  value="{{ $reservations->last_name ? $reservations->last_name : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email"  value="{{ $reservations->email ? $reservations->email : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="tel_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="number" id="tel_number" name="tel_number"  value="{{ $reservations->tel_number ? $reservations->tel_number : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="res_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reverstaion Date</label>
                        <input type="date" id="res_date" name="res_date"  value="{{ $reservations->res_date ? $reservations->res_date : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="guest_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest Number</label>
                        <input type="number" id="guest_number" name="guest_number"  value="{{ $reservations->guest_number ? $reservations->guest_number : ''  }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>

                    <div class="mb-6">
                        <label for="table_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table</label>
                         <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}" >{{ $table->name }}</option>
                                    @endforeach
                        </select>
                       
                    </div>
                    <div class="mb-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </div>
                    </form>
            </div>


        </div>
    </div>
</x-admin-layout>