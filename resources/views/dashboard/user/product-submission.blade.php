<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tukar poin menjadi produk menarik
        </h2>
    </x-slot>

    <section class=" dark:bg-gray-900">
        <!-- Listings -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
            <!-- Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Card -->
                @foreach ($products as $data)
                    <div class="group flex flex-col border border-gray-200  rounded-lg">
                        <div class="relative ">
                            <div class="aspect-4/4 overflow-hidden rounded-2xl w-full">
                                <img class="size-full object-cover rounded-2xl"
                                    src="{{ asset('storage/' . $data->photo) }}" alt="Product Image">
                            </div>

                            <div class="pt-4 px-4 py-2">
                                <h3 class="font-medium md:text-lg text-black dark:text-white">
                                    {{ $data->name_product }}
                                </h3>

                                <p class="mt-2 font-medium text-sm bg-blue-400 w-fit rounded-full py-1 px-5 text-white">
                                    Tersisa {{ $data->stock }}
                                </p>
                            </div>

                            <a class="after:absolute after:inset-0 after:z-1" href="#"></a>
                        </div>

                        <div class="mb-2 mt-4 text-sm">
                            <!-- List -->
                            <div class="flex flex-col px-4 py-2">
                                <!-- Item -->
                                <div class="py-3 border-t border-gray-200 dark:border-neutral-700">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black dark:text-white">Nama Toko:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-black dark:text-white">{{ $data->Users->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-gray-200 dark:border-neutral-700">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black dark:text-white">Deskripsi
                                                Produk:</span>
                                        </div>

                                        <div class="flex justify-end">
                                            <span class="text-black dark:text-white">{{ $data->description }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-gray-200 dark:border-neutral-700">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-black dark:text-white">Poin dibutuhkan:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-black dark:text-white">{{ $data->product_point }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->
                            </div>
                            <!-- End List -->
                        </div>

                        <form action="{{ route('redeem.products', $data->id) }}" method="post">
                            @csrf
                            <div class="mb-4 flex justify-center">
                                <label for="quantity-{{ $data->id }}" class="sr-only">Jumlah</label>
                                <input type="number" name="quantity" id="quantity-{{ $data->id }}" value="1"
                                    min="1" max="{{ $data->stock }}"
                                    class="w-[90%] text-center border-gray-300 rounded-lg shadow-sm">
                            </div>

                            <div class="mt-auto w-full py-2 px-4">
                                <x-secondary-button class="w-full flex justify-center">
                                    Tukar Sekarang
                                </x-secondary-button>
                            </div>
                        </form>
                    </div>
                    <!-- End Card -->
                @endforeach


            </div>
            <!-- End Card Grid -->
        </div>
        <!-- End Listings -->
    </section>
</x-user-app-layout>
