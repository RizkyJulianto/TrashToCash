<x-mitra-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Halaman Detail Pengajuan Produk
        </h2>
    </x-slot>

    <section class="py-8  md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="flex gap-x-10 max-w-[90%] mx-auto">
                <div class="left-col max-w-md lg:max-w-sm  h-64 border-2 rounded-md border-color-primary">
                    <img src="{{ asset('storage/' . $transaction->Products->photo) }}" alt="Photo">
                    <div class="img-caption">
                        <p class="italic mt-16 text-center text-gray-500">Gambar Produk</p>
                    </div>
                </div>



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
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Nama Produk
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->Products->name_product }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white ">Status
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            @if ($transaction->status === 'Pending')
                                                <span
                                                    class="rounded-full bg-yellow-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-yellow-500 dark:text-white">
                                                    {{ $transaction->status }}
                                                </span>
                                            @elseif ($transaction->status === 'Sukses')
                                                <span
                                                    class="rounded-full bg-color-primary px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-color-primary dark:text-white">
                                                    {{ $transaction->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="rounded-full bg-red-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-red-500 dark:text-white">
                                                    {{ $transaction->status }}
                                                </span>
                                            @endif
                                        </dt>
                                    </dl>


                                </div>



                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl class="flex flex-col  justify-between gap-y-1 pb-2 dark:border-gray-700">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Nama Pengguna
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->Users->name }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px] text-justify">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Jumlah Penukaran
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->quantity }} </dt>
                                    </dl>




                                </div>


                                <div class="col flex justify-between w-full border-b border-gray-400">

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[280px] text-justify">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Deskripsi
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->description }} </dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px] h-[60px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Pengurangan Poin
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->points }}</dt>
                                    </dl>






                                </div>

                                <dl
                                    class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700  w-[150px] h-[60px]">
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">Tanggal
                                        Penukaran
                                    </dd>
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $transaction->created_at->format('D, d M Y') }}</dt>
                                </dl>






                                <dl class="flex flex-col sm:flex-row gap-8  items-center">
                                    @if ($transaction->status === 'Pending')
                                        <div class="row flex gap-x-2">
                                            <form id="confirm-verifications-form-{{ $transaction->id }}"
                                                action="{{ route('accept.product-verifications', $transaction->id) }}"
                                                method="post" onsubmit="confirmVerifications(event,this);">
                                                @csrf
                                                <x-primary-button class="mt-4">
                                                    Verifikasi Pengajuan
                                                </x-primary-button>
                                            </form>

                                            <form id="confirm-reject-form-{{ $transaction->id }}"
                                                action="{{ route('reject.product-verifications', $transaction->id) }}"
                                                method="post" onsubmit="confirmReject(event,this);">
                                                @csrf
                                                <x-danger-button class="mt-4">
                                                    Tolak Pengajuan
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-gray-400 ">*Verifikasi Pengajuan hanya bisa pada saat
                                            status masih
                                            pending !</span>
                                    @endif

                                </dl>





                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>
        </div>
    </section>
</x-mitra-app-layout>
