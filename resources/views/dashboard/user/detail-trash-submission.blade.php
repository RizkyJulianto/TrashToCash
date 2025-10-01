<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Pengajuan Sampah
        </h2>
    </x-slot>

    <section class="py-8  md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="flex gap-x-10 max-w-full mx-auto px-4">
                <div class=" left-col max-w-md lg:max-w-sm  h-64  rounded-md ">
                    <img src="{{ asset('storage/' . $transaction->photo) }}" alt="Gambar Sampah" class="w-[300px] shadow-lg">
                    <div class="img-caption">
                        <p class="italic mt-2 text-center text-gray-500">Gambar Sampah</p>
                    </div>
                </div>

                <div class="right-col basis-[40%] ">
                    <div class="grow">
                        <div
                            class=" rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800 shadow-lg">
                            <div class="space-y-2 w-[500px]">

                                <dl class="flex items-center justify-between gap-4  pb-2 dark:border-gray-700">
                                    <dt class="text-2xl font-medium text-gray-900 dark:text-white">Detail Data</dt>
                                </dl>

                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl class="flex flex-col  justify-between gap-y-1 pb-2 dark:border-gray-700">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Jenis Penukaran
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->type }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white ">Nama TPS
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->Tps->name_tps }}</dt>
                                    </dl>


                                </div>

                                <div class="col flex justify-between w-full border-b border-gray-400">


                                    <dl class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 ">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Jenis Sampah
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->trash }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white ">Berat Sampah
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ rtrim(rtrim(number_format($transaction->weight, 2), '0'), '.') }} Kg</dt>
                                    </dl>


                                </div>

                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[280px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Deskripsi</dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->description }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px] h-[60px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Perolehan Poin
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->points }}</dt>
                                    </dl>


                                </div>



                                <div class="col flex justify-between w-full border-b border-gray-400">
                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Tanggal
                                            Penukaran
                                        </dd>
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $transaction->created_at->format('D, d M Y') }}</dt>
                                    </dl>

                                    <dl
                                        class="flex flex-col  justify-between gap-y-1  pb-2 dark:border-gray-700 w-[150px]">
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Status
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
                                            @elseif ($transaction->status === 'Gagal')
                                                <span
                                                    class="rounded-full bg-red-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-red-500 dark:text-white">
                                                    {{ $transaction->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="rounded-full bg-gray-400 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-gray-400 dark:text-white">
                                                    {{ $transaction->status }}
                                                </span>
                                            @endif
                                        </dt>
                                    </dl>
                                </div>


                                <dl class="flex flex-col sm:flex-row gap-8 items-center">
                                    @if ($transaction->status === 'Pending')
                                        <form id="cancel-form-{{ $transaction->id }}"
                                            action="{{ route('cancel.trash-submission', $transaction->id) }}"
                                            method="post" onsubmit="confirmCancel(event,this);">
                                            @csrf
                                            <x-danger-button class="mt-4">
                                                Batalkan Pengajuan
                                            </x-danger-button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 ">*Pengajuan hanya bisa dibatalkan pada saat
                                            status masih
                                            pending !</span>
                                    @endif

                                </dl>





                            </div>


                        </div>
                    </div>
                </div>
                <div>
                    @if ($transaction->qrcode)
                        <h3 class="text-lg  mb-2">QR Code untuk Verifikasi</h3>
                        <img src="{{ asset('storage/' . $transaction->qrcode) }}" alt="QR Code"
                            class="w-48 h-48 border rounded-lg p-2">
                    @else
                        <p class="text-gray-600">QR Code tidak tersedia.</p>
                    @endif
                    <x-secondary-button class="mt-4">
                        <a href="{{ route('download.qrcode', $transaction->id) }}">Download QR Code</a>
                    </x-secondary-button>
                </div>


            </div>
        </div>
    </section>

</x-user-app-layout>
