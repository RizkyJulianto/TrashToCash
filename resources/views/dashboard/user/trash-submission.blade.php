<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tukar Sampah Jadi Poin
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 mt-12">

        <div
            class="card bg-blue-50 border-2 border-blue-400 border-dashed rounded-md shadow-md flex gap-x-4 max-w-full lg:h-[160px] lg:max-w-[450px] py-4 px-6 items-center ">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="title">
                        <span class="text-blue-700 text-[18px] md:text-xl">Panduan Penukaran</span>
                    </div>
                </div>

                <div class="line bg-gray-300 rounded-md w-full h-[1px] my-2"></div>
                <div class="content">
                    <p class="text-blue-700 text-sm md:text-base font-light">Pastikan sampah sudah bersih dan terpilah.
                        Setelah mengisi
                        formulir, Kamu akan mendapatkan kode QR untuk ditukarkan di TPS.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <!-- Start block -->
    <section class=" dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-1 lg:px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md rounded-md overflow-hidden">

                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center w-full md:w-[60%] lg:w-[100%]">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="search"
                                    placeholder="Cari data berdasarkan jenis sampah dan nama tps" name="search"
                                    value="{{ request('search') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createProductButton"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            <a href="{{ route('form.trash-submission') }}">Tambah Pengajuan</a>
                        </button>


                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox"
                                            class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 font-semibold">Nama TPS</th>
                                <th scope="col" class="p-4 font-semibold">Jenis Sampah</th>
                                <th scope="col" class="p-4 font-semibold">Berat</th>
                                <th scope="col" class="p-4 font-semibold">Poin</th>
                                <th scope="col" class="p-4 font-semibold">Tanggal Penukaran</th>
                                <th scope="col" class="p-4 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($recentSubmission as $data)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                onclick="event.stopPropagation()"
                                                class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center mr-3">
                                            {{ $data->tps->name_tps }}
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">
                                        <span
                                            class="bg-primary-100 text-primary-800 text-base  px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $data->trash }}</span>
                                    </td>
                                    <td class="px-4 py-3">{{ rtrim(rtrim(number_format($data->weight, 2), '0'), '.') }} Kg
                                    </td>
                                    @if ($data->points !== 0)
                                        <td class="px-4 py-3 text-green-500">
                                            + {{ $data->points }}
                                        </td>
                                    @else
                                        <td class="px-4 py-3">
                                            {{ $data->points }}
                                        </td>
                                    @endif
                                    <td class="px-4 py-3 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->created_at->format('D, d M Y') }}</td>
                                    <td class="px-4 py-3 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
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
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center space-x-4">
                                            @if ($data->status === 'Pending')
                                                <button type="button"
                                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <a
                                                        href="{{ route('form-edit.trash-submission', $data->id) }}">Edit</a>
                                                </button>
                                            @endif
                                            <button type="button"
                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                                <a
                                                    href="{{ route('detail.trash-submission', $data->id) }}">Preview</a>
                                            </button>

                                        </div>
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


                    <div class="mt-7">
                        {{ $recentSubmission->appends(request()->query())->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </section>







</x-user-app-layout>
