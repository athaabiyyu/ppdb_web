<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="icon" type="image/png" href="/assets/logo_yayasan.png">

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
    @if (!isset($noNavbar) || !$noNavbar)
        @include('components.navbar_user')
    @endif
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
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile dropdown toggle
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = document.getElementById(btn.dataset.target);
                const icon = btn.querySelector('svg');

                target.classList.toggle('hidden');
                icon.style.transform = target.classList.contains('hidden') ? 'rotate(0)' : 'rotate(180deg)';
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('nav')) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
