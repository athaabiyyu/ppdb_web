<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>PPDB</title>
</head>

<body class="bg-gray-100">

    <!-- ================== NAVBAR ================== -->
    <nav class="bg-green-700 text-white px-6 py-4 shadow">
        <div class="max-w-6xl mx-auto flex items-center justify-between">

            <!-- Left Logo -->
            <div class="flex items-center space-x-3">
                <img src="https://via.placeholder.com/60x60" alt="Logo"
                    class="w-12 h-12 rounded-full border-2 border-white">
                <span class="text-xl font-bold">PPDB</span>
            </div>

            <!-- Right Menu -->
            <ul class="flex space-x-6 font-semibold">
                <li><a href="/" class="hover:text-gray-200">Home</a></li>
                <li><a href="/pendaftaran" class="hover:text-gray-200">Pendaftaran</a></li>
                <li><a href="/pengumuman" class="hover:text-gray-200">Pengumuman</a></li>
                <li><a href="/kontak" class="hover:text-gray-200">Contact Us</a></li>
            </ul>

        </div>
    </nav>
    <!-- ================== END NAVBAR ================== -->

    <div class="max-w-5xl mx-auto py-12">

        <!-- ================== SLIDER ================== -->
        <div class="swiper mySwiper mb-8 rounded-xl shadow overflow-hidden">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <img src="https://picsum.photos/id/1005/1200/400" class="w-full h-64 object-cover">
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="https://picsum.photos/id/1011/1200/400" class="w-full h-64 object-cover">
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="https://picsum.photos/id/1003/1200/400" class="w-full h-64 object-cover">
                </div>

            </div>

            <!-- Pagination Bullets -->
            <div class="swiper-pagination"></div>

            <!-- Left/Right Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- ================== END SLIDER ================== -->

        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="font-semibold">Info & Alur</h2>
            <p class="text-sm text-gray-600 mt-2">(Tuliskan alur, syarat, dan cara pendaftaran di sini.)</p>
        </div>

        <h1 class="text-3xl font-bold text-center mb-6">JENJANG PENDIDIKAN</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/daftar/sd" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-3">SD</h2>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Daftar</button>
            </a>

            <a href="/daftar/smp" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-3">SMP / MTS</h2>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Daftar</button>
            </a>

            <a href="/daftar/sma" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-3">SMA / MA / SMK</h2>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Daftar</button>
            </a>
        </div>
    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper Initialize -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>

</html>
