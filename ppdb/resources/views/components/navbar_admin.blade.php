<nav class="bg-[#31694E] text-white shadow-lg sticky top-0 z-50 w-full">
    <div class="flex items-center justify-between px-6 py-4">

        <!-- LEFT: Logo & Title -->
        <div class="flex items-center space-x-4">
            <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16">
            <div>
                <h1 class="text-xl font-bold">PPDB Admin</h1>
                <p class="text-xs text-green-100">Yayasan Mambaul Maarif Denanyar Jombang</p>
            </div>
        </div>

        <!-- RIGHT: Hamburger + Menu -->
        <div class="flex items-center space-x-4">

            <!-- Hamburger Button (visible on small screens) -->
            <button id="hamburgerBtn" class="md:hidden flex flex-col space-y-1">
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>

            <!-- Menu Items -->
            <ul id="menuItems" class="hidden md:flex space-x-1 flex-col md:flex-row md:space-x-1 md:flex md:items-center absolute md:static top-full right-0 bg-[#31694E] w-full md:w-auto md:bg-transparent">
                <li>
                    <a href="/admin/dashboard"
                       class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium flex items-center gap-3">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.data_siswa') }}"
                       class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium flex items-center gap-3">
                        Data Pendaftaran
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.announcements.index') }}"
                       class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium flex items-center gap-3">
                        Pengumuman
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home_settings') }}"
                       class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium flex items-center gap-3">
                        Edit Home
                    </a>
                </li>
                <!-- Admin Button -->
                <li>
                    <form action="{{ route('admin.editProfile') }}" method="GET">
                        @csrf
                        <button type="submit"
                                class="flex items-center space-x-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition w-full md:w-auto">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-green-600 font-bold text-sm">A</span>
                            </div>
                            <span class="font-medium">Admin</span>
                        </button>
                    </form>
                </li>
                <!-- Logout -->
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg font-medium transition w-full md:w-auto">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>

<script>
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const menuItems = document.getElementById('menuItems');

    hamburgerBtn.addEventListener('click', () => {
        menuItems.classList.toggle('hidden');
    });
</script>
