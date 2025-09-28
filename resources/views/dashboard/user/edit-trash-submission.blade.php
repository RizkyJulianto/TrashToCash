<x-user-app-layout>

    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Perbarui Pengajuan Sampah
        </h2>
    </x-slot>


    <section class=" dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ubah Data Pengajuan </h2>
            <form action="{{ route('edit.trash-submission', $transaction->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="tps_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            TPS</label>
                        <select id="tps_id" name="tps_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>Pilih Nama TPS</option>
                            @foreach ($tpsList as $tps)
                                <option value="{{ $tps->id }}" @selected($tps->id == $transaction->tps->id)>{{ $tps->name_tps }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('tps_id')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <label for="trash" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Sampah</label>
                        <select id="trash" name="trash"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>Pilih Jenis Sampah</option>
                            @foreach ($trash as $data)
                                <option value="{{ $data }}" @selected($data == $transaction->trash)>{{ $data }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('trash')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                        </label>
                        <input type="number" name="weight" id="weight"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan berat sampah" value="{{ old('weight', $transaction->weight) }}">
                        <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="description" rows="8" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here">{{ old('description', $transaction->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Sampah</span>
                        <label for="photo"
                            class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <img src="{{ asset('storage/' . $transaction->photo) }}" alt="Foto Sampah" class="h-32 w-auto mb-2">
                            <input id="photo" type="file" class="hidden" name="photo">
                        </label>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                    </div>
                </div>
                <button type="submit"
                    class="inline-flex w-full justify-center items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Ubah Data
                </button>
            </form>
        </div>
    </section>
</x-user-app-layout>
