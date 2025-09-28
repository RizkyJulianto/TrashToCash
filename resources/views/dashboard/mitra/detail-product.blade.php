<x-mitra-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Halaman Detail Produk
        </h2>
    </x-slot>

    <section class="py-8  md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="flex gap-x-10 max-w-[90%] mx-auto">
                <div class=" left-col max-w-md lg:max-w-sm  max-h-96 border-2 rounded-md border-color-primary">
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Photo" class="h-80">
                </div>

                <div class="right-col flex justify-between mt-3 w-full">
                    <div class="space-y-5">
                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Nama Produk:</span>
                            </dt>
                            <dd>
                                {{ $product->name_product }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Deskripsi:</span>
                            </dt>
                            <dd>
                                {{ $product->description }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Stok:</span>
                            </dt>
                            <dd>
                                {{ $product->stock }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Poin Didapat:</span>
                            </dt>
                            <dd>
                                {{ $product->product_point }}
                            </dd>
                        </dl>

                        <dl class="flex flex-col sm:flex-row gap-8 items-center">
                            <dt class="min-w-40">
                                <span class="block text-[18px] text-gray-500 dark:text-neutral-500">Tanggal
                                    Masuk:</span>
                            </dt>
                            <dd>
                                {{ $product->created_at->format('D, d M Y') }}
                            </dd>
                        </dl>

                        <form id="delete-form-{{ $product->id }}" action="{{ route('delete-product', $product->id) }}"
                            method="POST" onsubmit="confirmDelete(event,this);">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                Hapus Produk
                            </x-danger-button>
                        </form>



                    </div>

                </div>


            </div>
        </div>
    </section>
</x-mitra-app-layout>
