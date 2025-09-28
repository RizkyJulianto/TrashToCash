<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Pengajuan Sampah
        </h2>
    </x-slot>

    <section class="py-8  md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="flex gap-x-10 max-w-[90%] mx-auto">
                <div class=" left-col max-w-md lg:max-w-sm  max-h-96 border-2 rounded-md border-color-primary">
                    <img src="{{ asset('storage/' . $transaction->photo) }}" alt="Photo">
                </div>

                <div class="right-col flex justify-between mt-3 w-full">
                    <div class="space-y-5">
                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Nama TPS:</span>
                            </dt>
                            <dd>
                                {{ $transaction->Tps->name_tps }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Jenis Sampah:</span>
                            </dt>
                            <dd>
                                {{ $transaction->trash }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Berat Sampah:</span>
                            </dt>
                            <dd>
                                {{ $transaction->weight }} Kg
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Poin Didapat:</span>
                            </dt>
                            <dd>
                                {{ $transaction->points }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Tanggal
                                    Penukaran:</span>
                            </dt>
                            <dd>
                                {{ $transaction->created_at->format('D, d M Y') }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            @if ($transaction->status === 'Pending')
                                <form id="cancel-form-{{ $transaction->id }}"
                                    action="{{ route('cancel.trash-submission', $transaction->id) }}" method="post"
                                    onsubmit="confirmCancel(event,this);">
                                    @csrf
                                    <x-danger-button>
                                        Batalkan Pengajuan
                                    </x-danger-button>
                                </form>
                            @else
                            <span class="text-gray-400">*Pengajuan hanya bisa dibatalkan  pada saat <br> status masih pending !</span>
                            @endif

                        </dl>

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
        </div>
    </section>

</x-user-app-layout>
