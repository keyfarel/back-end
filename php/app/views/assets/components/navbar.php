<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbaranimation.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/animations.css">
    <style>
        .dropdown-content {
            visibility: hidden;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
        }

        .nav-item:hover .dropdown-content {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-gray-50">
<header>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Section -->
                <a href="<?= BASEURL ?>" class="flex-shrink-0 flex items-center space-x-3">
                    <img src="<?= ASSETS; ?>/images/Logo1.png" alt="IsFor Logo" class="h-10 w-auto" />
                    <span class="text-lg font-semibold text-blue-900">Internet of Things For Human Life's</span>
                </a>

                <!-- Navigation Items -->
                <div class="hidden lg:flex lg:items-center">
                    <ul class="flex items-center space-x-6">
                        <li class="nav-item">
                            <a href="<?= BASEURL; ?>" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Beranda</a>
                        </li>
                        <li class="nav-item relative">
                            <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium inline-flex items-center">
                                Tentang Kami
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div class="dropdown-content absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <a href="#Sejarah" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sejarah</a>
                                <a href="#Visimisi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Visi Misi</a>
                                <a href="#Roadmap" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Roadmap</a>
                                <a href="#Pengelola" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Pengelola</a>
                                <a href="#Peneliti" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">List Peneliti</a>
                            </div>
                        </li>
                        <li class="nav-item relative">
                            <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium inline-flex items-center">
                                Riset & Publikasi
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div class="dropdown-content absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Penelitian</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Hasil Peneliti</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#agenda" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Agenda</a>
                        </li>
                        <li class="nav-item relative">
                            <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Arsip</a>
                            <div class="dropdown-content absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Dokumen</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASEURL; ?>/galeri" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Galeri</a>
                        </li>
                    </ul>
                    <div class="ml-8">
                        <a href="<?= BASEURL; ?>/login" class="text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-4 py-2 rounded-md transition-all duration-300">Masuk</a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 text-gray-700 hover:text-blue-600">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden bg-white border-t">
            <ul class="p-2">
                <!-- Mobile Navigation Items (Sama dengan Desktop) -->
                <li><a href="<?= BASEURL; ?>" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Beranda</a></li>
                <li><a href="#Sejarah" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Sejarah</a></li>
                <!-- Tambahkan semua item lain untuk menu mobile di sini -->
            </ul>
        </div>
    </nav>
</header>
<script>
    // Fungsi untuk melakukan smooth scroll
    const smoothScroll = (targetId) => {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        }
    };

    // Fungsi untuk menangani klik pada semua link
    const handleNavigation = (e) => {
        const link = e.currentTarget;
        const href = link.getAttribute('href');

        if (href.startsWith('#')) {
            // Jika href adalah tautan internal (berisi #), lakukan smooth scroll
            e.preventDefault();
            smoothScroll(href);

            // Update URL tanpa me-*reload* halaman
            history.pushState(null, '', href);
        } else {
            // Jika href adalah tautan eksternal, tambahkan efek transisi
            e.preventDefault();
            document.body.classList.add('opacity-0');
            setTimeout(() => {
                window.location.href = href;
            }, 300);
        }
    };

    // Tambahkan event listener untuk semua link
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', handleNavigation);
    });

    // Menangani navigasi saat pengguna menggunakan tombol kembali/melanjutkan di browser
    window.addEventListener('popstate', () => {
        const hash = window.location.hash;
        if (hash) {
            smoothScroll(hash);
        }
    });
</script>

</body>

</html>
