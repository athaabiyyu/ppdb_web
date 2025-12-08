<nav class="bg-[#31694E] text-white shadow-md sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <!-- Left Logo -->
            <div class="flex items-center space-x-3">
                <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16">
                <div>
                    <span class="text-2xl font-bold block">PPDB Online</span>
                    <span class="text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                </div>
            </div>

            <!-- Right Menu -->
            <ul class="hidden md:flex space-x-6 font-medium">
                <li>
                    <a href="{{ route('home') }}#home"
                        class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                        Home
                        <span
                            class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#info-alur"
                        class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                        Informasi & Alur Pendaftaran
                        <span
                            class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}#pendaftaran"
                        class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                        Pendaftaran
                        <span
                            class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('announcements.index')}}"
                        class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                        Pengumuman
                        <span
                            class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="#kontak"
                        class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                        Contact Us
                        <span
                            class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                    </a>
                </li>
            </ul>


            <!-- Mobile Menu Button -->
            <div class="md:hidden relative">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Mobile Dropdown Menu -->
                <ul id="mobile-menu"
                    class="absolute right-0 mt-2 w-56 bg-[#31694E]/95 backdrop-blur-md rounded-xl shadow-xl hidden flex-col py-2 z-50">
                    <li>
                        <a href="#home" class="relative group block px-6 py-3 text-white font-medium transition">
                            Home
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#info-alur" class="relative group block px-6 py-3 text-white font-medium transition">
                            Informasi & Alur Pendaftaran
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#pendaftaran" class="relative group block px-6 py-3 text-white font-medium transition">
                            Pendaftaran
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('announcements.index') }}"
                            class="relative group block px-6 py-3 text-white font-medium transition">
                            Pengumuman
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#kontak" class="relative group block px-6 py-3 text-white font-medium transition">
                            Contact Us
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
