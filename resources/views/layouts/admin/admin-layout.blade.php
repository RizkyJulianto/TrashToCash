<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite('public/font/Font.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('library/sweetalert/sweetalert2.min.css') }}">

    {{-- HTML5 QRCODE --}}
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
</head>

<body class="font-fredoka antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <livewire:layout.admin.admin-navigation />

        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('library/sweetalert/sweetalert2.min.js') }}"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const html5QrCode = new Html5Qrcode("reader");

            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                // Hentikan scanner setelah berhasil memindai
                html5QrCode.stop().then(() => {
                    // Kirim data QR code ke backend
                    fetch('{{ route('admin.verifikasi.scan') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ qrcode: decodedText })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Tampilkan data transaksi yang diterima
                            // Anda perlu membuat fungsi untuk menampilkan data ini
                            displayTransactionDetails(data.transaction);
                        } else {
                            // Tampilkan error jika transaksi tidak ditemukan
                            Swal.fire('Error!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Error!', 'Gagal memproses QR code.', 'error');
                    });
                });
            };

            const config = { fps: 10, qrbox: { width: 250, height: 250 } };
            html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
        });
    </script> --}}

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

     @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tidak ada data ditemukan!',
                    text: 'Mohon periksa kembali kata kunci anda'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const inputSearch = document.getElementById('search');
                        if (inputSearch) {
                            inputSearch.value = '';
                        }

                        window.location.href = window.location.origin + window.location.pathname;
                    }
                });
            });
        </script>
    @endif


    <script>
        function confirmDelete(event, form) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Akan hapus data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#c4c4c4",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        function confirmReject(event, form) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Akan menolak pengajuan ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#c4c4c4",
                confirmButtonText: "Ya, Tolak!",
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        function confirmLogout(event, form) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Akan logout",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#c4c4c4",
                confirmButtonText: "Ya, logout!",
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        function confirmVerifications(event, form) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Akan verifikasi pengajuan ini !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#06923E",
                cancelButtonColor: "#c4c4c4",
                confirmButtonText: "Ya, verifikasi!",
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</body>

</html>
