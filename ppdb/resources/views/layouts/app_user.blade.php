<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="https://cdn.tailwindcss.com"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
       <title>@yield('title', 'PPDB - Penerimaan Peserta Didik Baru')</title>

       <style>
              html {
              scroll-behavior: smooth;
              }
       </style>

       @stack('styles')

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
       <!-- ================== NAVBAR ================== -->
       @include('components.navbar_user')
       <!-- ================== END NAVBAR ================== -->

       <!-- ================== MAIN CONTENT ================== -->
       @yield('content')
       <!-- ================== END MAIN CONTENT ================== -->

       <!-- ================== FOOTER ================== -->
       @include('components.footer_user')
       <!-- ================== END FOOTER ================== -->

       <!-- Swiper JS -->
       <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
       <script>
              const swiper = new Swiper(".mySwiper", {
              loop: true,
              pagination: {
                     el: ".swiper-pagination",
                     clickable: true,
              },
              navigation: {
                     nextEl: ".swiper-button-next",
                     prevEl: ".swiper-button-prev",
              },
              autoplay: {
                     delay: 3000,
                     disableOnInteraction: false,
              },
              });
       </script>

       <!--Navbar-->
       <script>
              // Toggle mobile menu
              const btn = document.getElementById('mobile-menu-button');
              const menu = document.getElementById('mobile-menu');
              btn.addEventListener('click', () => {
              menu.classList.toggle('hidden');
              });
       </script>

       @stack('scripts')
</body>

</html>
