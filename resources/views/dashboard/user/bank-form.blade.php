<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tukar poin menjadi uang
        </h2>
    </x-slot>

    <section class=" dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-5xl  justify-between lg:py-16 flex">
            <div class="left-col basis-[55%]">
                <h2 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambah Data Baru</h2>
                <form action="{{ route('add.bank-redeem') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="type_bank"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Bank</label>
                            <select id="type_bank" name="type_bank"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected disabled>Pilih Nama Bank</option>
                                @foreach ($bankList as $data)
                                    <option value="{{ $data }}">{{ $data }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('type_bank')" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <label for="bank_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Rekening
                            </label>
                            <input type="number" name="bank_number" id="bank_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Nomor Rekening" value="{{ old('bank_number') }}">
                            <x-input-error :messages="$errors->get('bank_number')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <label for="totals"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Penukaran
                            </label>
                            <input type="number" name="totals" id="totals"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukan Total Penukaran" value="{{ old('totals') }}">
                            <x-input-error :messages="$errors->get('totals')" class="mt-2" />
                        </div>



                    </div>
                    <button type="submit"
                        class="inline-flex w-full justify-center items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Tambah Data
                    </button>
                </form>
            </div>
            <div class="right-col basis-[40%] mt-4">
                <div class="mt-6 grow sm:mt-8 ">
                    <div
                        class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                        <div class="space-y-2">
                            <dl
                                class="flex items-center justify-between gap-4 border-b border-gray-200 pb-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Poin Dibutuhkan</dt>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Rp. 5000</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">500 Poin</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Rp. 10.000</dt>
                                <dd class="text-base font-medium text-gray-900">2.000 Poin</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Rp. 15.000</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">2.500 Poin</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Rp. 50.000</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">7.000 Poin</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Rp. 100.000</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">1.0000 Poin</dd>
                            </dl>

                           
                        </div>


                    </div>
                </div>
            </div>
    </section>

</x-user-app-layout>
