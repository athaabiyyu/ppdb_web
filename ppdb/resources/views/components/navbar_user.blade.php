<nav class="bg-[#31694E] text-white shadow-md sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Left Logo -->
            <div class="flex items-center space-x-4">
                <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16 rounded-lg">
                <div>
                    <span class="text-xl font-bold block">PPDB Online</span>
                    <span class="text-xl opacity-90">Yayasan Mambaul Maarif</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-2">
                <li>
                    <a href="{{ route('home') }}#home"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Home
                    </a>
                </li>

                <!-- Informasi Dropdown -->
                <li class="relative group">
                    <button
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base flex items-center gap-1 tracking-widest">
                        Informasi
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul
                        class="absolute left-0 mt-0 w-56 bg-[#2a5840] rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all py-2">
                        <li>
                            <a href="{{ route('home') }}#info-alur"
                                class="block px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest">
                                Syarat & Alur Pendaftaran
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#info-unit-pendidikan"
                                class="block px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest">
                                Unit Pendidikan
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('home') }}#pendaftaran"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Pendaftaran
                    </a>
                </li>

                <li>
                    <a href="{{ route('announcements.index') }}"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Pengumuman
                    </a>
                </li>

                <li>
                    <a href="#kontak"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Contact Us
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button"
                class="lg:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-white/20 mt-4 pt-4">
            <ul class="flex flex-col gap-1">
                <li>
                    <a href="{{ route('home') }}#home"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Home
                    </a>
                </li>

                <!-- Mobile Informasi Dropdown -->
                <li>
                    <button
                        class="w-full text-left px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base flex items-center justify-between mobile-dropdown-toggle tracking-widest"
                        data-target="info-submenu">
                        Informasi
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="info-submenu" class="hidden bg-white/5 rounded-lg ml-4 mt-1 overflow-hidden">
                        <li>
                            <a href="{{ route('home') }}#info-alur"
                                class="block px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest">
                                Syarat & Alur Pendaftaran
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}#info-unit-pendidikan"
                                class="block px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest">
                                Unit Pendidikan
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('home') }}#pendaftaran"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-bas tracking-widest">
                        Pendaftaran
                    </a>
                </li>

                <li>
                    <a href="{{ route('announcements.index') }}"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Pengumuman
                    </a>
                </li>

                <li>
                    <a href="#kontak"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

