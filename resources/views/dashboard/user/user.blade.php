<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-fredoka text-xl text-gray-900 dark:text-gray-100">
                    <h2>Selamat Datang, <span>Rizky Julianto</span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col md:flex-row gap-4">
        <div
            class="card bg-white rounded-md shadow-md flex gap-x-4 max-w-full lg:max-w-[300px] py-4 px-6 items-center border border-gray-200">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="icon">
                        <i class="fa-solid fa-coins text-xl text-yellow-300"></i>
                    </div>
                    <div class="point">
                        <span class="text-[26px] md:text-2xl lg:text-3xl opacity-80">{{ $user->point }}</span>
                    </div>
                </div>
                <div class="title">
                    <span class="text-gray-500  lg:text-[18px] font-light">Total poin yang kamu dapat</span>
                </div>
                <x-primary-button class="mt-3">
                    <a href="{{ route('point-submission') }}">Tukar poin sekarang</a>
                </x-primary-button>
            </div>
        </div>
        <div
            class="card bg-white rounded-md shadow-md flex gap-x-4 max-w-full lg:max-w-[300px] py-4 px-6 items-center border border-gray-200">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="icon">
                        <i class="fa-solid fa-trash text-xl text-green-700"></i>
                    </div>
                    <div class="point">
                        <span class="text-[26px] md:text-2xl lg:text-3xl opacity-80">{{ $totalWeight }} Kg</span>
                    </div>
                </div>
                <div class="title">
                    <span class="text-gray-500 lg:text-[18px] font-light">Total sampah ditukar</span>
                </div>
                <x-secondary-button class="mt-3">
                    <a href="{{ route('trash-submission') }}">Tukar sampah sekarang</a>
                </x-secondary-button>
            </div>
        </div>
    </div>

    {{-- Table Submissions --}}
    <section class="dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl md:px-2 lg:px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md rounded-md overflow-hidden">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5>

                            <span class="dark:text-white">Sampah yang sudah ditukar</span>
                        </h5>
                        <h5 class="text-gray-500 dark:text-gray-400 ml-1">1-5 (20)</h5>
                        <button type="button" class="group" data-tooltip-target="results-tooltip">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">More info</span>
                        </button>
                        <div id="results-tooltip" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm  text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Menampilkan 1-5 dari 20 Hasil
                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>

                </div>
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="search" placeholder="Cari data berdasarkan jenis sampah dan nama tps" name="search"
                                    value="{{ request('search') }}" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
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
                            @foreach ($transaction as $data)    
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
                                    class="px-4 py-3 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center mr-3">
                                        {{ $data->Tps->name_tps }}
                                    </div>
                                </th>
                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-base  px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $data->trash }}</span>
                                </td>
                                <td class="px-4 py-3">{{ $data->weight }}</td>
                                <td
                                    class="px-4 py-3 font-normal text-color-primary whitespace-nowrap dark:text-color-primary">
                                    +{{ $data->points }}</td>
                                <td class="px-4 py-3 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                   {{ $data->created_at->format('D, d M Y')}}</td>
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
                                        @else
                                        <span
                                            class="rounded-full bg-red-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-red-500 dark:text-white">
                                            {{ $data->status }}
                                        </span>
                                        @endif
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
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">1-5</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">20</span>
                    </span>
                    <x-secondary-button>
                        <a href="{{ route('history') }}">Lihat Semua Riwayat</a>
                    </x-secondary-button>
                </nav>
            </div>
        </div>
    </section>

  
   
</x-user-app-layout>
