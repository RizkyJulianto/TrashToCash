<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Aktivitas Terkini
        </h2>
    </x-slot>

    <section class=" dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-3">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
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
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs  text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 font-semibold">Jenis Penukaran</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Keterangan</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Tanggal Penukaran</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Poin</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Penukaran {{ $data->type }}</th>
                                    <td class="px-4 py-3">{{ $data->description }}</td>
                                    <td class="px-4 py-3">{{ $data->created_at->format('D, d M Y') }}</td>
                                    @if ($data->points !== 0 && $data->status === 'Sukses')
                                        <td class="px-4 py-3 text-green-500">
                                            + {{ $data->points }}
                                        </td>
                                    @elseif ($data->points !== 0 && $data->type === 'Tunai' && $data->status !== 'Sukses')
                                        <td class="px-4 py-3 text-red-500">
                                            - {{ $data->points }}
                                        </td>
                                    @else
                                        <td class="px-4 py-3">
                                            {{ $data->points }}
                                        </td>
                                    @endif
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
                                        @else
                                            <span
                                                class="rounded-full bg-red-500 px-2.5 py-0.5 text-sm whitespace-nowrap text-white dark:bg-red-500 dark:text-white">
                                                {{ $data->status }}
                                            </span>
                                        @endif
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
                            class="font-semibold text-gray-900 dark:text-white">{{ $transaction->firstItem() }}</span>
                        sampai
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $transaction->lastItem() }}</span>
                        dari
                        <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $transaction->total() }}</span>
                        riwayat
                    </span>


                    <div class="mt-7">
                        {{ $transaction->appends(request()->query())->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-user-app-layout>
