<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tukar poin menjadi hadiah
        </h2>
    </x-slot>


    <div class="container max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 mt-12">
        <div
            class="card bg-blue-50 border-2 border-blue-400 border-dashed rounded-md shadow-md flex gap-x-4 max-w-full  lg:max-w-[450px] py-4 px-6 items-center">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="title">
                        <span class="text-blue-700 text-[18px] md:text-xl">Tukar Dengan Merchandise</span>
                    </div>
                </div>

                <div class="line bg-gray-300 rounded-md w-full h-[1px] my-2"></div>
                <div class="content">
                    <p class="text-blue-700 text-sm md:text-base font-light text-justify ">Jika Anda menginginkan barang
                        fisik, Anda bisa menukar poin dengan berbagai produk menarik yang tersedia di katalog kami.
                        Cukup telusuri pilihan yang ada, pilih produk favorit Anda, dan klik 'Tukar Poin'. Poin akan
                        otomatis terpotong, dan Anda akan mendapatkan konfirmasi untuk mengambil barang di lokasi mitra.
                    </p>
                </div>

                <x-secondary-button class="mt-3">
                    <a href="{{ route('products') }}">Lihat Katalog Produk</a>
                </x-secondary-button>
            </div>
        </div>
        <div
            class="card bg-yellow-50 border-2 border-yellow-400 border-dashed rounded-md shadow-md flex gap-x-4 max-w-full  lg:max-w-[450px] py-4 px-6 items-center">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="title">
                        <span class="text-yellow-700 text-[18px] md:text-xl">Tukar Dengan Uang</span>
                    </div>
                </div>

                <div class="line bg-gray-300 rounded-md w-full h-[1px] my-2"></div>
                <div class="content">
                    <p class="text-yellow-700 text-sm md:text-base font-light text-justify">Jika Anda lebih memilih
                        uang, Anda bisa menariknya langsung ke rekening bank atau dompet digital. Isi formulir penarikan
                        dengan jumlah poin yang Anda inginkan dan detail rekening Anda. Tim kami akan segera
                        memprosesnya. Mohon berikan waktu 1-3 hari kerja untuk verifikasi dan transfer dana. Setelah
                        berhasil, Anda akan menerima notifikasi.</p>
                </div>

                <x-yellow-button class="mt-3">
                    <a href="{{ route('redeem.options') }}"> Tukar Uang</a>
                </x-yellow-button>
            </div>
        </div>
    </div>


    <section class=" dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-3">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Cari Data</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-color-secondary focus:border-color-secondary block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 font-semibold">Jenis Penukaran</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Deskripsi</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Poin</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Tanggal Penukaran</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Status</th>
                                <th scope="col" class="px-4 py-3 font-semibold">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentSubmission as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Penukaran {{ $data->type }}</th>
                                    <td class="px-4 py-3">{{ $data->description }}</td>

                                    @if ($data->points !== 0)
                                        <td class="px-4 py-3 text-red-500">
                                            - {{ $data->points }}
                                        </td>
                                    @else
                                        <td class="px-4 py-3">
                                            {{ $data->points }}
                                        </td>
                                    @endif
                                    <td class="px-4 py-3 ">{{ $data->created_at->format('D, d M Y') }}</td>
                                    <td class="px-4 py-3">
                                        @if ($data->status === 'Pending')
                                            <span
                                                class="rounded-full bg-yellow-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-yellow-500 dark:text-white">
                                                {{ $data->status }}
                                            </span>
                                        @elseif ($data->status === 'Sukses')
                                            <span
                                                class="rounded-full bg-color-primary px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-color-primary dark:text-white">
                                                {{ $data->status }}
                                            </span>
                                        @elseif ($data->status === 'Gagal')
                                            <span
                                                class="rounded-full bg-red-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-red-500 dark:text-white">
                                                {{ $data->status }}
                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-gray-400 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-gray-400 dark:text-white">
                                                {{ $data->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button type="button"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                            <a href="{{ route('detail.product-submission', $data->id) }}">Preview</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Menampilkan
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $recentSubmission->firstItem() }}</span>
                        sampai
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $recentSubmission->lastItem() }}</span>
                        dari
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $recentSubmission->total() }}</span>
                        laporan
                    </span>


                    <div class="mt-7  w-[30%]">
                        {{ $recentSubmission->appends(request()->query())->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-user-app-layout>
