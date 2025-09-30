<x-user-app-layout>
    <x-slot name="header">
        <h2 class="font-600 text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tukar poin menjadi uang
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 mt-12">
       
        <div
            class="card  bg-gradient-to-br from-blue-700 to-blue-300  rounded-md shadow-md flex gap-x-4 max-w-full  lg:max-w-[450px] py-4 px-6 items-center ">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="title">
                        <span class="text-white text-[18px] md:text-xl">Tukar ke Rekening Bank</span>
                    </div>
                </div>

                <div class="line bg-gray-300 rounded-md w-full h-[1px] my-2"></div>
                <div class="content">
                    <p class="text-white text-sm md:text-base font-light">Tukarkan poin Anda dengan uang tunai, yang akan kami kirimkan langsung ke rekening bank Anda. Proses aman dan terpercaya.</p>
                </div>

                <div class="cta mt-3">
                  <button class="border border-white py-2 px-4 rounded-full transition-all duration-300 hover:bg-blue-500">
                    <a href="{{ route('form.bank-reedem') }}" class="text-white">Pilih Opsi ini</a>
                  </button>
                </div>
            </div>
        </div>
        <div
            class="card  bg-gradient-to-br to-yellow-700 from-yellow-400  rounded-md shadow-md flex gap-x-4 max-w-full  lg:max-w-[450px] py-4 px-6 items-center ">
            <div class="content">
                <div class="header flex gap-x-2 items-center">
                    <div class="title">
                        <span class="text-white text-[18px] md:text-xl">Tukar ke E-Wallet</span>
                    </div>
                </div>

                <div class="line bg-gray-300 rounded-md w-full h-[1px] my-2"></div>
                <div class="content">
                    <p class="text-white text-sm md:text-base font-light">Tukarkan poin Anda dengan saldo digital yang akan dikirimkan ke DANA, OVO, atau GoPay. Mudah dan instan.</p>
                </div>

                <div class="cta mt-3">
                  <button class="border border-white py-2 px-4 rounded-full transition-all duration-300 hover:bg-yellow-500">
                    <a href="{{ route('form.ewallet-reedem') }}" class="text-white">Pilih Opsi ini</a>
                  </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</x-user-app-layout>
