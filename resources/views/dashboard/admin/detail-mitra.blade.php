<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Mitra
        </h2>
    </x-slot>

    <section class="py-8  md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="flex gap-x-10 max-w-[90%] mx-auto justify-center">
                

                <div class="right-col basis-[40%] ">
                    <div class="grow">
                        <div
                            class=" rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg">
                            <div class="space-y-2 w-[600px]">

                                <dl class="flex items-center justify-between gap-4  pb-2 dark:border-gray-700">
                                    <dt class="text-2xl font-medium text-gray-900 dark:text-white">Detail Data</dt>
                                </dl>

                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl class="flex flex-col  justify-between gap-y-1 pb-2 dark:border-gray-700">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Nama Mitra
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $mitra->name }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[180px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white ">Email
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $mitra->email }}</dt>
                                    </dl>


                                </div>



                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[280px] text-justify">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Alamat
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $mitra->address }} </dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[180px] h-[60px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Jenis Mitra
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $mitra->partner }}</dt>
                                    </dl>


                                </div>


                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[280px] text-justify">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Tanggal Daftar   
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $mitra->created_at->format('D, d M Y') }}  </dt>
                                    </dl>

                                   


                                </div>






                                <dl class="flex flex-col sm:flex-row gap-8 items-center">
                                        <form id="delete-form-{{ $mitra->id }}"
                                            action="{{ route('delete.data-mitra', $mitra->id) }}"
                                            method="post" onsubmit="confirmDelete(event,this);">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="mt-4">
                                                Hapus Mitra
                                            </x-danger-button>
                                        </form>
                                </dl>   





                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>
        </div>
    </section>

</x-user-app-layout>
