<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- ===== Navbar ===== -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">MyWebsite</h1>
            <ul class="flex space-x-6">
                <li><a href="#" class="text-gray-700 hover:text-blue-600">Home</a></li>
                <li><a href="#" class="text-gray-700 hover:text-blue-600">About</a></li>
                <li><a href="#" class="text-gray-700 hover:text-blue-600">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- ===== Jumbotron / Hero Section ===== -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-4">Selamat Datang di Website Kami</h2>
            <p class="text-lg mb-6">Website sederhana menggunakan Laravel dan Tailwind CSS.</p>
            <a href="#"
                class="bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- ===== 3 Card Section ===== -->
    <section class="container mx-auto py-16 px-4">
        <h3 class="text-2xl font-bold text-center mb-10">Fitur Kami</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <a href="{{route('sma1.main')}}"
                class="block bg-white rounded-2xl shadow-md p-6 text-center hover:shadow-lg hover:scale-105 transition transform">
                <img src="https://via.placeholder.com/150" alt="Card 1" class="mx-auto mb-4 rounded-xl">
                <h4 class="text-lg font-semibold mb-2 text-gray-800">Fitur Pertama</h4>
                <p class="text-gray-600">Deskripsi singkat tentang fitur pertama yang sangat bermanfaat.</p>
            </a>

            <!-- Card 2 -->
            <a href="{{route('sma2.main')}}"
                class="block bg-white rounded-2xl shadow-md p-6 text-center hover:shadow-lg hover:scale-105 transition transform">
                <img src="https://via.placeholder.com/150" alt="Card 2" class="mx-auto mb-4 rounded-xl">
                <h4 class="text-lg font-semibold mb-2 text-gray-800">Fitur Kedua</h4>
                <p class="text-gray-600">Deskripsi singkat tentang fitur kedua yang keren dan mudah digunakan.</p>
            </a>

            <!-- Card 3 -->
            <a href="{{route('sma3.main')}}"
                class="block bg-white rounded-2xl shadow-md p-6 text-center hover:shadow-lg hover:scale-105 transition transform">
                <img src="https://via.placeholder.com/150" alt="Card 3" class="mx-auto mb-4 rounded-xl">
                <h4 class="text-lg font-semibold mb-2 text-gray-800">Fitur Ketiga</h4>
                <p class="text-gray-600">Deskripsi singkat tentang fitur ketiga yang membantu pekerjaanmu.</p>
            </a>
        </div>
    </section>

    <!-- ===== Footer ===== -->
    <footer class="bg-white text-center py-6 shadow-inner">
        <p class="text-gray-600">© 2025 MyWebsite. All rights reserved.</p>
    </footer>
</body>

</html>
