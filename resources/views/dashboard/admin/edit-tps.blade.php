<x-admin-app-layout>

    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Halaman Ubah Data
        </h2>
    </x-slot>


    <section class=" dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ubah Data</h2>
            <form action="{{ route('edit.data-tps', $tps->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    
                    <div class="sm:col-span-2">
                        <label for="name_tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama TPS
                        </label>
                        <input type="text" name="name_tps" id="name_tps"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama TPS" value="{{ old('name_tps', $tps->name_tps) }}">
                        <x-input-error :messages="$errors->get('name_tps')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        </label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Alamat" value="{{ old('address',$tps->address) }}">
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon
                        </label>
                        <input type="text" name="phone_number" id="phone_number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nomor Telepon" value="{{ old('phone_number', $tps->phone_number) }}">
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>

            
                </div>
                <button type="submit"
                    class="inline-flex w-full justify-center items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Ubah Data
                </button>
            </form>
        </div>
    </section>
</x-admin-app-layout>
