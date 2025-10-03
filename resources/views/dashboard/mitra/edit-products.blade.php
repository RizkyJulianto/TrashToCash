<x-mitra-app-layout>

    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Halaman Ubah Produk
        </h2>
    </x-slot>


    <section class=" dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ubah Data Produk</h2>
            <form action="{{ route('edit-product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name_product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Produk</label>
                        <input type="text" name="name_product" id="name_product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan nama produk" value="{{ old('name_product', $product->name_product) }}">
                        <x-input-error :messages="$errors->get('name_product')" class="mt-2" />

                    </div>

                    <div class="w-full">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                        </label>
                        <input type="number" name="stock" id="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan stok produk" value="{{ old('stock', $product->stock) }}">
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label for="product_point"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poin
                        </label>
                        <input type="number" name="product_point" id="product_point"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan poin produk"
                            value="{{ old('product_point', $product->product_point) }}">
                        <x-input-error :messages="$errors->get('product_point')" class="mt-2" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="8" name="description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan deskripsi produk">{{ old('description', $product->description) }}
                        </textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Sampah</span>

                        <label for="photo-input"
                            class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                            @if ($product->photo)
                                <img id="existing-image" src="{{ asset('storage/' . $product->photo) }}"
                                    alt="Gambar lama" class="h-36 w-auto object-cover rounded-lg">
                            @else
                                <div id="existing-image-placeholder" class="text-gray-500">Tidak ada gambar</div>
                            @endif

                            <img id="image-preview" src="#" alt="Pratinjau Gambar Baru"
                                class="hidden h-36 w-auto object-cover rounded-lg">

                            <div id="upload-placeholder" class="hidden flex-col justify-center items-center pt-5 pb-6">
                            </div>

                            <input id="photo-input" type="file" name="photo" class="hidden">
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
</x-mitra-app-layout>
