<footer class="bg-[#31694E] text-gray-300 mt-20" id="kontak">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-white font-bold text-lg mb-4">PPDB Online</h3>
                <p class="text-sm text-white">Sistem Penerimaan Peserta Didik Baru secara online untuk kemudahan akses
                    pendidikan.</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}#home" class="text-white">Home</a></li>
                    <li><a href="{{ route('home') }}#info-alur" class="text-white">Informasi & Alur Pendaftaran</a></li>
                    <li><a href="{{ route('home') }}#info-unit-pendidikan" class="text-white">Informasi Unit Pendidikan</a></li>
                    <li><a href="{{ route('home') }}#pendaftaran" class="text-white">Pendaftaran</a></li>
                    <li><a href="{{ route('announcements.index') }}" class="text-white">Pengumuman</a></li>
                    <li><a href="{{ route('home') }}#lokasi" class="text-white">Lokasi</a></li>
                    <li><a href="{{ route('home') }}#kontak" class="text-white">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Kontak</h3>
                <ul class="space-y-2 text-sm">
                    <li>Email: info@ppdb.sch.id</li>
                    <li>Telp: (021) 1234-5678</li>
                    <li>Alamat: Jl. Pendidikan No. 123</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white mt-8 pt-8 text-center text-sm">
            <p class="text-white">&copy; PPDB Online. All rights reserved.</p>
        </div>
    </div>
</footer>
