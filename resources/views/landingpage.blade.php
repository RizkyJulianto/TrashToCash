<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('public/font/Font.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('library/sweetalert/sweetalert2.min.css') }}">


    {{-- Aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="antialiased w-screen overflow-x-hidden">
    <header class="header relative py-7 px-6 overflow-x-hidden" id="Home">
        <nav class="navbar transition-all duration-500 py-7 px-6 md:px-12 md:left-10 lg:left-8 w-[87%] md:w-[88%] lg:w-[95%] bg-gray-300/20 rounded-full bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-20 border border-gray-100 fixed z-20"
            id="navigation-container">
            <div class="flex justify-between items-center">
                <div class="logo">
                    <h1 class="text-color-cloudwhite text-[28px] md:text-4xl lg:text-[28px] font-fredoka font-medium"
                        id="logo">
                        Trashto<span class="text-color-primary">Cash</span>
                    </h1>
                </div>
                <div class="anchor">
                    <ul class="navbar-links flex flex-col lg:flex-row absolute lg:static bg-white lg:bg-transparent w-[90%] md:w-[92%] lg:w-auto left-5 md:left-8 lg:left-0 top-[150px] lg:top-0 opacity-0 lg:opacity-100 rounded-xl gap-x-7 gap-y-7 p-7 lg:p-0 text-black/70 shadow-md lg:shadow-none border-2 border-gray-200 lg:border-0 lg:text-white/80 transition-all duration-500 font-roboto"
                        id="navigation">
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#Home"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">Beranda</a>
                        </li>
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#About"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">Tentang
                                Kami</a>
                        </li>
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#Service"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">Layanan</a>
                        </li>
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#Works"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">Cara
                                Kerja</a>
                        </li>
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#Review"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">Testimoni</a>
                        </li>
                        <li class="border-b border-gray py-5 lg:border-0 lg:py-0">
                            <a href="#FAQ"
                                class="hover:text-white transition-all duration-300 text-xl md:text-[26px]  lg:text-base">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="button-hamburger relative flex items-center lg:hidden ml-2">
                    <button id="hamburger" name="hamburger" type="button" class="block">
                        <span
                            class="hamburger-bar bg-white block w-[30px] h-[2px] my-2 rounded-md origin-top-left transiton-all duration-500"></span>
                        <span
                            class="hamburger-bar bg-white block w-[30px] h-[2px] my-2 ml-2 rounded-md transition-all duration-500"></span>
                        <span
                            class="hamburger-bar bg-white block w-[30px] h-[2px] my-2 rounded-md origin-bottom-left transiton-all duration-500"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Home Section -->
    <section class="home h-screen scroll-mt-28 ">
        <img src="{{ asset('images/bg-image.png') }}" alt=""
            class="absolute top-0 w-full border-red-300 -z-20 h-screen object-cover" />

        <div class="background-overlay bg-black w-full h-screen object-cover absolute top-0 opacity-25 -z-10"></div>

        <div class="home-textbox mt-28 lg:mt-32 px-10 flex flex-col gap-y-5 md:max-w-[700px]" data-aos="fade-right" data-aos-duration="1000">
            <div class="textbox-title">
                <h2
                    class="text-white/90 font-bold font-roboto text-[26px] md:text-5xl leading-8 md:leading-16 lg:text-5xl">
                    Ubah Sampah Jadi Peluang, Bantu Lingkungan Sekaligus Dapatkan <span
                        class="text-yellow-400">Reward!</span>
                </h2>
            </div>
            <div class="textbox-description">
                <p class="font-fredoka text-white/80 font-light text-justify text-base md:text-2xl lg:text-base">
                    Bergabunglah dengan TrashtoCash ubah
                    barang daur ulang Anda menjadi uang sungguhan sambil memberikan
                    dampak positif bagi lingkungan. Bersama-sama, kita sedang membangun
                    masa depan yang berkelanjutan
                </p>
            </div>

            <div class="cta mt-8 lg:mt-6 flex gap-x-3">
                <div class="btn-getstarted">
                    <a href="{{ route('user.login') }}"
                        class="bg-color-primary p-5 md:py-5 md:px-10 lg:py-3 lg:px-7 text-xl lg:text-base rounded-md text-white/80 font-semibold hover:text-white transition-all duration-300 hover:bg-[#16610E]">Daftar
                        Sekarang</a>
                </div>
                <div class="btn-work">
                    <a href="#Works"
                        class="border-2 border-color-primary p-5 md:py-5 md:px-10 lg:py-3 lg:px-7 text-xl lg:text-base rounded-md text-white/80 font-semibold transition-all duration-300 hover:text-white hover:bg-color-primary">Cara
                        Kerja</a>
                </div>
            </div>
        </div>

        <div
            class="card-home flex flex-col md:flex-row max-md:items-center gap-y-5 gap-x-5 w-full justify-center px-10 md:px-7 mt-40 md:mt-[260px] lg:mt-24 " data-aos="fade-up" data-aos-duration="700">
            <div
                class="card bg-white rounded-2xl py-5 px-7 w-full md:w-[240px] flex flex-col items-center font-fredoka gap-y-1 border-2 drop-shadow-xl transition-all duration-300 hover:scale-[102%] cursor-pointer border-color-primary">
                <div class="title">
                    <h3 class="text-color-primary font-medium text-4xl">15,847</h3>
                </div>
                <div class="description">
                    <p class="opacity-80 text-xl lg:text-sm">Anggota Aktif</p>
                </div>
            </div>
            <div
                class="card bg-white rounded-2xl py-5 px-7 w-full md:w-[240px] flex flex-col items-center font-fredoka gap-y-1 border-2 drop-shadow-xl transition-all duration-300 hover:scale-[102%] cursor-pointer border-color-secondary">
                <div class="title">
                    <h3 class="text-color-secondary font-medium text-4xl">100 +</h3>
                </div>
                <div class="description">
                    <p class="opacity-80 text-xl text-center lg:text-sm">
                        Kg Sampah Daur Ulang
                    </p>
                </div>
            </div>
            <div
                class="card bg-white rounded-2xl py-5 px-7 w-full md:w-[240px] flex flex-col justify-center items-center font-fredoka gap-y-1 border-2 drop-shadow-xl transition-all duration-300 hover:scale-[102%] cursor-pointer border-color-primary">
                <div class="title">
                    <h3 class="text-color-primary font-medium text-4xl">1 jt +</h3>
                </div>
                <div class="description">
                    <p class="opacity-80 text-xl text-center lg:text-sm">
                        Pendapatan Setiap Anggota
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->

    <!-- About Section -->
    <section class="about  lg:py-12 w-full flex flex-col items-center scroll-mt-28" id="About">
        <div class="section-title text-center flex flex-col gap-y-3 items-center" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="font-roboto text-4xl md:text-5xl lg:text-4xl font-medium opacity-80">
                Tentang Kami
            </h2>
            <div class="underline bg-color-primary w-28 h-[1px]"></div>
        </div>
        <div class="about-content flex flex-col items-center px-6 gap-y-10 gap-x-12 mt-20 lg:flex-row overflow-x-hidden">
            <div class="about-left-col max-md:px-4" data-aos="fade-right" data-aos-duration="1200">
                <img src="{{ asset('images/tentang-image.png') }}" alt="" class="lg:w-[450px] md:w-[600px]" />
            </div>
            <div class="about-right-col max-w-[400px] md:max-w-[600px] lg:max-w-[600px] max-md:px-4" data-aos="fade-left" data-aos-duration="1000">
                <div class="title">
                    <h2
                        class="font-roboto font-medium opacity-80 text-[22px] md:text-[40px] lg:text-[34px] md:leading-12 lg:leading-10">
                        Membangun Masa Depan Berkelanjutan Melalui Aksi Nyata
                    </h2>
                </div>
                <div class="description">
                    <p
                        class="text-justify opacity-80 font-light font-fredoka mt-4 text-xl md:text-[22px] lg:text-base">
                        Didirikan pada tahun 2025, TrashtoCash lahir dari ide sederhana
                        namun kuat: memberdayakan komunitas untuk mengelola dampak
                        lingkungan mereka sambil menciptakan peluang ekonomi. Kami percaya
                        bahwa pengelolaan limbah yang berkelanjutan harus memberikan
                        manfaat bagi planet ini dan masyarakat yang menghuninya.
                    </p>
                </div>
                <div class="underline bg-color-primary h-[2px] md:w-[380px] mt-4"></div>

                <div class="benefits mt-4 flex flex-col gap-y-3">
                    <div class="list flex gap-x-3 items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                                viewBox="0 0 24 24" class="text-color-primary">
                                <path fill="currentColor"
                                    d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </div>
                        <div class="text">
                            <p class="font-fredoka opacity-80 text-[18px] md:text-[22px] lg:text-[18px]">
                                Proses Cepat dan Praktis
                            </p>
                        </div>
                    </div>
                    <div class="list flex gap-x-3 items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                                viewBox="0 0 24 24" class="text-color-primary">
                                <path fill="currentColor"
                                    d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </div>
                        <div class="text">
                            <p class="font-fredoka opacity-80 text-[18px] md:text-[22px] lg:text-[18px]">
                                Dapatkan Uang Jajan Tambahan dari Sampahmu
                            </p>
                        </div>
                    </div>
                    <div class="list flex gap-x-3 items-center">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                                viewBox="0 0 24 24" class="text-color-primary">
                                <path fill="currentColor"
                                    d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </div>
                        <div class="text">
                            <p class="font-fredoka opacity-80 text-[18px] md:text-[22px] lg:text-[18px]">
                                Telah Mengelola 100+ kg Sampah Daur Ulang
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section -->
    <section class="service py-20 px-7 lg:px-10 w-full scroll-mt-28" id="Service">
        <div class="section-title text-center flex flex-col gap-y-3 items-center" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="font-roboto text-2xl md:text-4xl font-medium opacity-80">
                Mengapa Memilih TrashtoCash ?
            </h2>
            <div class="underline bg-color-primary w-28 h-[1px]"></div>
            <div class="subtitle max-w-[320px] md:max-w-[600px] lg:max-w-[500px]">
                <p class="font-fredoka font-thin opacity-80 text-[18px] md:text-2xl lg:text-xl leading-6">
                    Temukan manfaat bergabung dengan komunitas pengelolaan limbah
                    berkelanjutan kami
                </p>    
            </div>
        </div>
        <div class="service-content mt-12 flex flex-col lg:flex-row gap-x-7 gap-y-5" data-aos="fade-right" data-aos-duration="1200">
            <div
                class="card bg-white border border-gray drop-shadow-xl rounded-xl p-7 flex flex-col transition-all duration-300 hover:scale-[102%]">
                <div class="icon bg-[#DBEAFE] w-fit rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        class="text-color-secondary">
                        <path fill="currentColor"
                            d="M12 16q-.825 0-1.412-.587T10 14t.588-1.412T12 12t1.413.588T14 14t-.587 1.413T12 16M7.375 7h9.25l2-4H5.375zM8.4 21h7.2q2.25 0 3.825-1.562T21 15.6q0-.95-.325-1.85t-.925-1.625L17.15 9H6.85l-2.6 3.125q-.6.725-.925 1.625T3 15.6q0 2.275 1.563 3.838T8.4 21" />
                    </svg>
                </div>
                <div class="title-card mt-3">
                    <h3 class="font-roboto opacity-80 font-medium text-xl md:text-[26px] lg:text-2xl">
                        Dapatkan Uang
                    </h3>
                </div>
                <div class="description-card mt-2">
                    <p class="font-fredoka opacity-80 font-light text-base lg:text-base lg:max-w-[400px] text-justify">
                        Ubah limbah daur ulang Anda menjadi hadiah uang tunai. Sistem
                        penetapan harga yang transparan kami memastikan Anda mendapatkan
                        kompensasi yang adil atas upaya lingkungan Anda.
                    </p>
                </div>
            </div>
            <div
                class="card bg-white border border-gray drop-shadow-xl rounded-xl p-7 flex flex-col transition-all duration-300 hover:scale-[102%]">
                <div class="icon bg-[#DBEAFE] w-fit rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        class="text-color-secondary">
                        <path fill="currentColor"
                            d="M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-.175-.012-.363t-.013-.312q-.125.725-.675 1.2T18 13h-2q-.825 0-1.412-.587T14 11v-1h-4V8q0-.825.588-1.412T12 6h1q0-.575.313-1.012t.762-.713q-.5-.125-1.012-.2T12 4Q8.65 4 6.325 6.325T4 12h5q1.65 0 2.825 1.175T13 16v1h-3v2.75q.5.125.988.188T12 20" />
                    </svg>
                </div>
                <div class="title-card mt-3">
                    <h3 class="font-roboto opacity-80 font-medium text-xl md:text-[26px] lg:text-2xl">
                        Melindungi Lingkungan
                    </h3>
                </div>
                <div class="description-card mt-2">
                    <p class="font-fredoka opacity-80 font-light text-base lg:text-base lg:max-w-[400px] text-justify">
                        Setiap barang yang Anda daur ulang membantu mengurangi limbah di
                        tempat pembuangan akhir dan emisi a. Jadilah bagian dari solusi
                        perubahan iklim di komunitas Anda.
                    </p>
                </div>
            </div>
            <div
                class="card bg-white border border-gray drop-shadow-xl rounded-xl p-7 flex flex-col transition-all duration-300 hover:scale-[102%]">
                <div class="icon bg-[#DBEAFE] w-fit rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        class="text-color-secondary">
                        <path fill="currentColor"
                            d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.54 5.54 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9z" />
                    </svg>
                </div>
                <div class="title-card mt-3">
                    <h3 class="font-roboto opacity-80 font-medium text-xl md:text-[26px] lg:text-2xl">
                        Bangun Komunitas
                    </h3>
                </div>
                <div class="description-card mt-2">
                    <p class="font-fredoka opacity-80 font-light text-base lg:text-base lg:max-w-[400px] text-justify">
                        Bergabunglah dengan tetangga yang memiliki minat serupa dan peduli
                        terhadap keberlanjutan. Bersama-sama, kita menciptakan perubahan
                        positif yang berkelanjutan di wilayah lokal kita.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!-- Works Section -->
    <section class="work px-7 lg:px-10 py-20 w-full relative z-0 scroll-mt-28" id="Works">
        <div class="bg-work">
            <img src="{{ asset('images/bg-gradient.png') }}" alt=""
                class="absolute -z-10 w-full left-0 h-full top-0" />
        </div>
        <div class="section-title text-center flex flex-col gap-y-3 items-center" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="font-roboto text-2xl md:text-4xl font-medium text-color-cloudwhite">
                Cara Kerja TrashtoCash ?
            </h2>
            <div class="underline bg-white w-28 h-[1px]"></div>
            <div class="subtitle max-w-[320px] md:max-w-[550px] lg:max-w-[450px]">
                <p class="font-fredoka font-thin text-color-cloudwhite text-[18px] md:text-2xl lg:text-xl leading-6">
                    Langkah-langkah sederhana untuk mulai menghasilkan uang sambil
                    membantu lingkungan.
                </p>
            </div>
        </div>

        <div class="works-content flex flex-col lg:flex-row gap-x-7 gap-y-10 mt-12 relative items-center" data-aos="fade-right" data-aos-duration="1200">
            <div
                class="line w-[3px] h-[80%] lg:w-[80%] lg:h-[2px] bg-color-yellow absolute left-[38px] md:left-[115px] lg:left-[10%] md:top-[10%] lg:top-[20%] -z-1 max-md:opacity-0">
            </div>
            <div
                class="list flex flex-col md:flex-row gap-x-10 lg:flex-col items-center md:w-[550px] lg:max-w-[306px]">
                <div
                    class="icon bg-color-yellow rounded-full p-4 shadow-md border border-gray max-md:w-20 max-md:h-20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        class="text-color-brown">
                        <path fill="currentColor"
                            d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                    </svg>
                </div>
                <div class="text flex flex-col gap-y-1 max-md:items-center lg:items-center">
                    <div class="list-title mt-5 md:mt-3">
                        <h3 class="text-color-cloudwhite text-xl md:text-[28px] lg:text-xl font-medium">
                            Daftar
                        </h3>
                    </div>
                    <div class="list-description mt-3">
                        <p
                            class="text-color-cloudwhite font-fredoka font-thin text-[18px] md:text-2xl lg:text-base text-center md:text-justify lg:text-center">
                            Buat akun TrashtoCash gratis Anda dan siapkan dompet digital Anda
                            untuk mulai menghasilkan.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="list flex flex-col md:flex-row gap-x-10 lg:flex-col items-center md:w-[550px] lg:max-w-[306px]">
                <div
                    class="icon bg-color-yellow rounded-full p-4 shadow-md border border-gray max-md:w-20 max-md:h-20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        class="text-color-brown">
                        <path fill="currentColor"
                            d="m9.2 9.2l2.225-3.675l-1.475-2.45q-.3-.5-.862-.5t-.863.5L5.775 7.15zm9.675 6.8l-2.225-3.7l3.475-2l1.6 2.675q.275.425.3.95t-.225.975q-.25.5-.737.8T20 16zM16 23l-4-4l4-4v2h4.75l-1.45 2.9q-.275.5-.75.8t-1.05.3H16zm-9.675-2q-.5 0-.913-.262T4.8 20.05q-.2-.4-.187-.837t.237-.813L5.7 17H10v4zM3.85 18.15L2.225 14.9q-.225-.45-.213-.962t.288-.963l.4-.675L1 11.275L6.475 9.9l1.375 5.5l-1.725-1.05zm13.5-8.55l-5.475-1.375L13.6 7.2L10.475 2H14q.525 0 .988.263t.737.712l1.3 2.175l1.7-1.05z" />
                    </svg>
                </div>
                <div class="text flex flex-col gap-y-1 max-md:items-center lg:items-center">
                    <div class="list-title mt-5 md:mt-3">
                        <h3 class="text-color-cloudwhite text-xl md:text-[28px] lg:text-xl font-medium">
                            Kumpulkan Sampah
                        </h3>
                    </div>
                    <div class="list-description mt-3">
                        <p
                            class="text-color-cloudwhite font-fredoka font-thin text-[18px] md:text-2xl lg:text-base text-center md:text-justify lg:text-center">
                            Kumpulkan bahan daur ulang seperti botol plastik, kertas, dan
                            kaleng logam dari rumah Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="list flex flex-col md:flex-row gap-x-10 lg:flex-col items-center md:w-[550px] lg:max-w-[306px]">
                <div
                    class="icon bg-color-yellow rounded-full p-4 shadow-md border border-gray max-md:w-20 max-md:h-20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        class="text-color-brown">
                        <path fill="currentColor"
                            d="M3.5 13v-3H1l3.5-5v3H7zm3.3 7q-1.25 0-2.125-.875T3.8 17q0-.625.288-1.175t.787-.95L10.85 6h-4.3l.425-2H18l-.925 4H20l3 4l-1 5h-2q0 1.25-.875 2.125T17 20t-2.125-.875T14 17H9.8q0 1.25-.875 2.125T6.8 20m.2-2q.425 0 .713-.288T8 17t-.288-.712T7 16t-.712.288T6 17t.288.713T7 18m10 0q.425 0 .713-.288T18 17t-.288-.712T17 16t-.712.288T16 17t.288.713T17 18m-1.075-5h4.825l.1-.525L19 10h-2.375z" />
                    </svg>
                </div>
                <div class="text flex flex-col gap-y-1 max-md:items-center lg:items-center">
                    <div class="list-title mt-5 md:mt-3">
                        <h3 class="text-color-cloudwhite text-xl md:text-[28px] lg:text-xl font-medium">
                            Serahkan Sampah
                        </h3>
                    </div>
                    <div class="list-description mt-3">
                        <p
                            class="text-color-cloudwhite font-fredoka font-thin text-[18px] md:text-2xl lg:text-base text-center md:text-justify lg:text-center">
                            Bawa sampah yang sudah dipisahkan ke pusat daur ulang terdekat.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="list flex flex-col md:flex-row gap-x-10 lg:flex-col items-center md:w-[550px] lg:max-w-[306px]">
                <div
                    class="icon bg-color-yellow rounded-full p-4 shadow-md border border-gray max-md:w-20 max-md:h-20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        class="text-color-brown">
                        <path fill="currentColor"
                            d="M4 12h16V8H4zm15 10v-3h-3v-2h3v-3h2v3h3v2h-3v3zM4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v6h-3q-2.075 0-3.537 1.463T14 17v3z" />
                    </svg>
                </div>
                <div class="text flex flex-col gap-y-1 max-md:items-center lg:items-center">
                    <div class="list-title mt-5 md:mt-3">
                        <h3 class="text-color-cloudwhite text-xl md:text-[28px] lg:text-xl font-medium">
                            Dapatkan Bayaran
                        </h3>
                    </div>
                    <div class="list-description mt-3">
                        <p
                            class="text-color-cloudwhite font-fredoka font-thin text-[18px] md:text-2xl lg:text-base text-center md:text-justify lg:text-center">
                            Dapatkan pembayaran instan ke dompet digital Anda berdasarkan
                            berat dan jenis bahan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Works Section End -->

    <!-- Testimoni Section -->
    <section class="testimoni flex flex-col items-center w-full py-20 scroll-mt-28" id="Review" >
        <div class="section-title text-center flex flex-col gap-y-3 items-center" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="font-roboto text-2xl md:text-4xl font-medium opacity-80">
                Apa Kata Mereka ?
            </h2>
            <div class="underline bg-color-primary w-28 h-[1px]"></div>
            <div class="subtitle max-w-[320px] md:max-w-[550px] lg:max-w-[450px]">
                <p class="font-fredoka font-thin text-[19px] md:text-2xl lg:text-xl leading-6 opacity-80">
                    Lihat perubahan positif yang kita buat bersama di lingkungan dan
                    komunitas kita
                </p>
            </div>
        </div>

        <div class="testimoni-content flex flex-col gap-y-5 lg:flex-row justify-center gap-x-7 px-10 mt-12" data-aos="fade-right" data-aos-duration="1200">
            <div
                class="card bg-white shadow-md rounded-tl-3xl rounded-b-3xl py-7 px-10 border border-gray font-fredoka lg:w-[370px] transition-all duration-300 hover:scale-[102%]">
                <div class="top-content flex gap-x-7 items-center">
                    <div class="profile-img">
                        <img src="{{ asset('images/17039.jpg') }}" alt=""
                            class="w-[70px] h-[70px] object-cover rounded-full" />
                    </div>
                    <div class="identity">
                        <div class="name">
                            <p class="text-xl md:text-2xl lg:text-xl opacity-80">
                                Rio Saputra
                            </p>
                        </div>
                        <div class="role">
                            <p class="font-light text-[18px]">Mahasiswa</p>
                        </div>
                    </div>
                </div>
                <div class="card-description">
                    <p class="font-light opacity-80 mt-6 lg:mt-4 text-justify text-base md:text-xl lg:text-sm">
                        "Trashtocash telah mengubah cara pandang masyarakat di lingkungan
                        kami terhadap limbah. Saya telah mendapatkan lebih dari 1jt tahun
                        ini sambil mengajarkan teman-teman saya tentang tanggung jawab
                        lingkungan.”
                    </p>
                </div>
            </div>
            <div
                class="card bg-white shadow-md rounded-tl-3xl rounded-b-3xl py-7 px-10 border border-gray font-fredoka lg:w-[370px] transition-all duration-300 hover:scale-[102%]">
                <div class="top-content flex gap-x-7 items-center">
                    <div class="profile-img">
                        <img src="{{ asset('images/27592.jpg') }}" alt=""
                            class="w-[70px] h-[70px] object-cover rounded-full" />
                    </div>
                    <div class="identity">
                        <div class="name">
                            <p class="text-xl md:text-2xl lg:text-xl opacity-80">
                                Sarah Putri
                            </p>
                        </div>
                        <div class="role">
                            <p class="font-light text-[18px]">Pemilik Restoran</p>
                        </div>
                    </div>
                </div>
                <div class="card-description">
                    <p class="font-light opacity-80 mt-6 lg:mt-4 text-justify text-base md:text-xl lg:text-sm">
                        “Sebagai pemilik restoran, TrashtoCash membantu saya mengelola
                        limbah secara bertanggung jawab sambil mendapatkan penghasilan
                        tambahan. Layanan penjemputan limbahnya sangat praktis.”
                    </p>
                </div>
            </div>
            <div
                class="card bg-white shadow-md rounded-tl-3xl rounded-b-3xl py-7 px-10 border border-gray font-fredoka lg:w-[370px] transition-all duration-300 hover:scale-[102%]">
                <div class="top-content flex gap-x-7 items-center">
                    <div class="profile-img">
                        <img src="{{ asset('images/16320.jpg') }}" alt=""
                            class="w-[70px] h-[70px] object-cover rounded-full" />
                    </div>
                    <div class="identity">
                        <div class="name">
                            <p class="text-xl md:text-2xl lg:text-xl opacity-80">
                                Cahyono
                            </p>
                        </div>
                        <div class="role">
                            <p class="font-light text-[18px]">Pekerja Kantoran</p>
                        </div>
                    </div>
                </div>
                <div class="card-description">
                    <p class="font-light opacity-80 mt-6 lg:mt-4 text-justify text-base md:text-xl lg:text-sm">
                        “Saya senang melihat bagaimana BanksSampah mempersatukan komunitas
                        kita. Setiap bulan kami mengadakan kegiatan pembersihan lingkungan
                        dan semua orang mendapat manfaat secara finansial.”
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimoni Section End -->

    <!-- fAQ Section -->
    <section class="faq flex flex-col px-10 py-20 w-full scroll-mt-28" id="FAQ">
        <div class="section-title text-center flex flex-col gap-y-3 items-center" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="font-roboto text-2xl md:text-4xl font-medium opacity-80">
                Pertanyaan Populer
            </h2>
            <div class="underline bg-color-primary w-28 h-[1px]"></div>
            <div class="subtitle max-w-[320px] md:max-w-[550px] lg:max-w-[450px]">
                <p class="font-fredoka font-thin text-[18px] md:text-2xl lg:text-xl leading-6 opacity-80">
                    Semua yang perlu Anda ketahui tentang TrashtoCash dan cara kerjanya
                </p>
            </div>
        </div>

        <div class="faq-content flex flex-col items-center w-full mt-12 gap-y-5"  data-aos="fade-down" data-aos-duration="1000">
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Apa Itu Bank Sampah ?</span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <p class="font-light font-fredoka text-base md:text-[18px] lg:text-base">
                        Bank Sampah Digital adalah platform yang dibuat untuk memudahkan
                        mahasiswa mengubah sampah daur ulang menjadi uang, sambil
                        berkontribusi menjaga lingkungan kampus. Semua proses, mulai dari
                        pendataan hingga penukaran, dilakukan secara digital.
                    </p>
                </div>
            </div>
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Bagaimana Cara Kerja Bank <br class="md:hidden" />
                        Sampah?</span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <ul class="font-fredoka text-base md:text-[18px] lg:text-base">
                        <li>Proses sangat mudah :</li>
                        <li>
                            <span class="font-medium">1. Input Data Sampah:</span> Masukkan
                            data sampah dan dapatkan QR Code unik.
                        </li>
                        <li>
                            <span class="font-medium">2. Scan & Verifikasi:</span> Bawa
                            sampah ke lokasi Bank Sampah dan biarkan admin memverifikasinya
                            dengan QR Code Anda.
                        </li>
                        <li>
                            <span class="font-medium">3. Dapatkan Uang:</span> Saldo akan
                            otomatis ditambahkan ke akun Anda sesuai nilai sampah yang
                            ditukar.
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Jenis Sampah Apa Saja yang Bisa Ditukar?</span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <p class="font-light font-fredoka text-base md:text-[18px] lg:text-base">
                        Saat ini, kami menerima sampah anorganik kering seperti botol
                        plastik, kertas, kardus, dan kaleng aluminium. Pastikan sampah
                        sudah bersih dan tidak tercampur.
                    </p>
                </div>
            </div>
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Bagaimana Cara Menghitung Nilai Uangnya?
                    </span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <p class="font-light font-fredoka text-base md:text-[18px] lg:text-base">
                        Nilai uang dihitung berdasarkan jenis dan berat sampah. Setiap
                        jenis sampah memiliki harga per kilogram yang berbeda. Anda bisa
                        melihat daftar harga lengkap di dashboard akun Anda.
                    </p>
                </div>
            </div>
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Apakah Harus Daftar untuk Menggunakan Layanan?
                    </span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <p class="font-light font-fredoka text-base md:text-[18px] lg:text-base">
                        Ya, Anda perlu mendaftar dan membuat akun. Prosesnya cepat dan
                        gratis. Cukup klik tombol 'Daftar Sekarang' di halaman utama untuk
                        memulai.
                    </p>
                </div>
            </div>
            <div
                class="accordion list bg-white border border-gray shadow-md rounded-xl p-5 font-fredoka md:w-[670px] lg:w-[730px]">
                <div class="header flex justify-between items-center cursor-pointer">
                    <span class="text-sm md:text-xl lg:text-[18px]">Di mana Lokasi Bank Sampah?
                    </span>
                    <div class="icon list-toggle transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
                        </svg>
                    </div>
                </div>

                <div
                    class="content max-w-[600px] text-justify transition-all duration-500 rounded-md max-h-0 overflow-hidden">
                    <p class="font-light font-fredoka text-base md:text-[18px] lg:text-base">
                        Sebagai proyek simulasi, kami membayangkan Bank Sampah fisik akan
                        berlokasi di beberapa titik strategis di lingkungan kampus,
                        seperti dekat perpustakaan, kantin, atau area asrama.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- fAQ Section End -->

    <!-- Footer  -->
    <footer class="footer py-12 px-10 mt-40 w-full bg-color-dark">
        <div class="container flex flex-col md:flex-row flex-wrap lg:flex-nowrap gap-y-10">
            <div class="identity font-fredoka lg:basis-[40%]">
                <div class="logo">
                    <h2
                        class="text-color-cloudwhite text-3xl font-medium transition-all duration-300 hover:scale-[101%] cursor-pointer">
                        Trashto<span class="text-color-primary">Cash</span>
                    </h2>
                </div>
                <div class="description mt-5 max-w-[92%] lg:max-w-[80%]">
                    <p class="text-white/80 font-thin text-justify text-[18px] md:text-xl lg:text-base">
                        Membangun komunitas yang berkelanjutan melalui pengelolaan limbah
                        inovatif dan pengelolaan lingkungan yang bertanggung jawab.
                    </p>
                </div>

                <div class="sosial-media flex gap-x-4 mt-5">
                    <div class="facebook transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                            class="text-color-cloudwhite bg-color-darkSecondary p-2 rounded-xl transition-all duration-300 hover:bg-color-primary">
                            <path fill="currentColor"
                                d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4z" />
                        </svg>
                    </div>
                    <div class="x transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                            class="text-color-cloudwhite bg-color-darkSecondary p-2 rounded-xl transition-all duration-300 hover:bg-color-primary">
                            <path fill="currentColor"
                                d="m17.687 3.063l-4.996 5.711l-4.32-5.711H2.112l7.477 9.776l-7.086 8.099h3.034l5.469-6.25l4.78 6.25h6.102l-7.794-10.304l6.625-7.571zm-1.064 16.06L5.654 4.782h1.803l10.846 14.34z" />
                        </svg>
                    </div>
                    <div class="instagram transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                            class="text-color-cloudwhite bg-color-darkSecondary p-2 rounded-xl transition-all duration-300 hover:bg-color-primary">
                            <path fill="currentColor"
                                d="M12.001 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6m0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0M12.001 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.9 2.9 0 0 0-1.08.703a2.9 2.9 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.007 9.075 4 9.461 4 12c0 2.475.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.475 0 2.878-.007 4.029-.058c.782-.037 1.308-.142 1.797-.331a2.9 2.9 0 0 0 1.08-.703c.337-.336.538-.649.704-1.08c.19-.492.296-1.018.332-1.8c.052-1.103.058-1.49.058-4.028c0-2.474-.007-2.878-.058-4.029c-.037-.782-.143-1.31-.332-1.798a2.9 2.9 0 0 0-.703-1.08a2.9 2.9 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.926 4.006 14.54 4 12 4m0-2c2.717 0 3.056.01 4.123.06c1.064.05 1.79.217 2.427.465c.66.254 1.216.598 1.772 1.153a4.9 4.9 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122s-.01 3.056-.06 4.122s-.218 1.79-.465 2.428a4.9 4.9 0 0 1-1.153 1.772a4.9 4.9 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-1.067.047-1.406.06-4.123.06s-3.056-.01-4.123-.06c-1.064-.05-1.789-.218-2.427-.465a4.9 4.9 0 0 1-1.772-1.153a4.9 4.9 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.012 15.056 2 14.717 2 12s.01-3.056.06-4.122s.217-1.79.465-2.428a4.9 4.9 0 0 1 1.153-1.772A4.9 4.9 0 0 1 5.45 2.525c.637-.248 1.362-.415 2.427-.465C8.945 2.013 9.284 2 12.001 2" />
                        </svg>
                    </div>
                    <div class="youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                            class="text-color-cloudwhite bg-color-darkSecondary p-2 rounded-xl transition-all duration-300 hover:bg-color-primary">
                            <path fill="currentColor"
                                d="M12.244 4c.534.003 1.87.016 3.29.073l.504.022c1.429.067 2.857.183 3.566.38c.945.266 1.687 1.04 1.938 2.022c.4 1.56.45 4.602.456 5.339l.001.152v.174c-.007.737-.057 3.78-.457 5.339c-.254.985-.997 1.76-1.938 2.022c-.709.197-2.137.313-3.566.38l-.504.023c-1.42.056-2.756.07-3.29.072l-.235.001h-.255c-1.13-.007-5.856-.058-7.36-.476c-.944-.266-1.687-1.04-1.938-2.022c-.4-1.56-.45-4.602-.456-5.339v-.326c.006-.737.056-3.78.456-5.339c.254-.985.997-1.76 1.939-2.021c1.503-.419 6.23-.47 7.36-.476zM9.999 8.5v7l6-3.5z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="quick-links font-fredoka basis-[30%] lg:basis-[20%]">
                <div class="title">
                    <h3 class="text-color-cloudwhite text-xl font-medium">Link Cepat</h3>
                </div>
                <div class="links mt-5">
                    <ul class="flex flex-col gap-y-3 font-light text-white/70">
                        <li>
                            <a href="#Home" class="transition-all duration-300 hover:text-white">Beranda</a>
                        </li>
                        <li>
                            <a href="#About" class="transition-all duration-300 hover:text-white">Tentang
                                Kami</a>
                        </li>
                        <li>
                            <a href="#Service" class="transition-all duration-300 hover:text-white">Layanan</a>
                        </li>
                        <li>
                            <a href="#Works" class="transition-all duration-300 hover:text-white">Cara Kerja</a>
                        </li>
                        <li>
                            <a href="#Review" class="transition-all duration-300 hover:text-white">Testimoni</a>
                        </li>
                        <li>
                            <a href="#FAQ" class="transition-all duration-300 hover:text-white">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="support font-fredoka basis-[28%] lg:basis-[20%] ">
                <div class="title">
                    <h3 class="text-color-cloudwhite text-xl font-medium">Dukungan</h3>
                </div>
                <div class="links mt-5">
                    <ul class="flex flex-col gap-y-3 font-light text-white/70">
                        <li>
                            <a href="#" class="transition-all duration-300 hover:text-white">Pusat
                                Bantuan</a>
                        </li>
                        <li>
                            <a href="#" class="transition-all duration-300 hover:text-white">Kontak Kami</a>
                        </li>
                        <li>
                            <a href="#" class="transition-all duration-300 hover:text-white">Kebijakan
                                Privasi</a>
                        </li>
                        <li>
                            <a href="#" class="transition-all duration-300 hover:text-white">Syarat &
                                Ketentuan</a>
                        </li>
                        <li>
                            <a href="#" class="transition-all duration-300 hover:text-white">Kebijakan
                                Cookie</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="connect font-fredoka basis-[15%]">
                <div class="title">
                    <h3 class="text-color-cloudwhite text-xl font-medium">
                        Terhubung Dengan Kami
                    </h3>
                </div>
                <div class="description mt-5">
                    <p class="text-white/70 font-light">
                        Dapatkan berita terbaru tentang dampak lingkungan kami dan
                        prestasi komunitas.
                    </p>
                </div>

                <div class="form">
                    <form action=""
                        class="bg-color-darkSecondary rounded-xl mt-5 w-full lg:max-w-[270px] flex justify-between">
                        <div class="form-group flex justify-between h-full p-2 ">
                            <input type="email" name="email" id="email" placeholder="Email Anda"
                                class="font-light text-white/70 bg-transparent outline-0 border-0" />
                        </div>
                        <div
                            class="btn-send bg-color-primary p-2 rounded-xl flex items-center justify-center w-[60px] transition-all duration-300 hover:bg-[#16610E]">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="text-white/80">
                                    <path fill="currentColor"
                                        d="M1.946 9.315c-.522-.174-.527-.455.01-.634L21.044 2.32c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8l-8 6z" />
                                </svg></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="underline bg-[#d9d9d9]/10 h-[1px] w-full mt-8"></div>
        <div class="copyright mt-3 text-white/70 font-light">
            <p>&copy; 2025 TrashtoCash. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="{{ asset('library/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        AOS.init();
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
</body>

</html>
