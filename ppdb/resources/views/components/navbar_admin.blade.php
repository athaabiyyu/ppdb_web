<nav class="bg-[#31694E] text-white shadow-md sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Left Logo -->
            <div class="flex items-center space-x-4">
                <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16 rounded-lg">
                <div>
                    <span class="text-xl font-bold block">PPDB Admin</span>
                    <span class="text-xl opacity-90">Yayasan Mambaul Maarif</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-2">
                <li>
                    <a href="/admin/dashboard"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.data_siswa') }}"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Data Pendaftaran
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.announcements.index') }}"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Pengumuman
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.home_settings.index') }}"
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Edit Home
                    </a>
                </li>

                <!-- Admin Dropdown -->
                <li class="relative group">
                    <button
                        class="px-4 py-2 rounded-lg hover:bg-white/10 transition-colors font-medium text-base flex items-center gap-2 tracking-widest">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-green-600 font-bold text-sm">A</span>
                        </div>
                        Admin
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul
                        class="absolute right-0 mt-2 w-48 bg-[#2a5840] rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all py-2">
                        <li>
                            <form action="{{ route('admin.editProfile') }}" method="GET" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </button>
                            </form>
                        </li>
                        <li class="border-t border-white/10 my-1"></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2.5 hover:bg-red-500/20 text-red-200 hover:text-white transition-colors text-base tracking-widest flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
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
                    <a href="/admin/dashboard"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.data_siswa') }}"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Data Pendaftaran
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.announcements.index') }}"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Pengumuman
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.home_settings.index') }}"
                        class="block px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base tracking-widest">
                        Edit Home
                    </a>
                </li>

                <!-- Mobile Admin Dropdown -->
                <li>
                    <button
                        class="w-full text-left px-4 py-3 rounded-lg hover:bg-white/10 transition-colors font-medium text-base flex items-center justify-between mobile-dropdown-toggle tracking-widest"
                        data-target="admin-submenu">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-green-600 font-bold text-sm">A</span>
                            </div>
                            Admin
                        </div>
                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="admin-submenu" class="hidden bg-white/5 rounded-lg ml-4 mt-1 overflow-hidden">
                        <li>
                            <form action="{{ route('admin.editProfile') }}" method="GET" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2.5 hover:bg-white/10 transition-colors text-base tracking-widest">
                                    Profile
                                </button>
                            </form>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2.5 hover:bg-red-500/20 text-red-200 hover:text-white transition-colors text-base tracking-widest">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Toggle mobile menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Mobile dropdown functionality
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);
            const icon = this.querySelector('svg');

            // Toggle menu
            targetMenu.classList.toggle('hidden');

            // Rotate icon
            if (targetMenu.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)';
            } else {
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuButton = document.getElementById('mobile-menu-button');

        if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>
