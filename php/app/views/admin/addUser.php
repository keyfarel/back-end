<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Register</title>-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap"-->
<!--          rel="stylesheet">-->
<!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">-->
<!--    <link rel="stylesheet" href="animations.css?v=1.0">-->
<!--    <script>-->
<!--        document.addEventListener('DOMContentLoaded', function () {-->
<!--            // Tampilkan modal-->
<!--            const showAddUserModal = () => {-->
<!--                const modal = document.getElementById('addUserModal');-->
<!--                modal.classList.remove('hidden');-->
<!--            };-->
<!---->
<!--            // Sembunyikan modal-->
<!--            const hideAddUserModal = () => {-->
<!--                const modal = document.getElementById('addUserModal');-->
<!--                modal.classList.add('hidden');-->
<!--            };-->
<!---->
<!--            // Pasang event listener pada tombol-->
<!--            const addUserButton = document.getElementById('addUserButton');-->
<!--            if (addUserButton) {-->
<!--                addUserButton.addEventListener('click', showAddUserModal);-->
<!--            }-->
<!---->
<!--            const cancelButton = document.getElementById('cancelButton');-->
<!--            if (cancelButton) {-->
<!--                cancelButton.addEventListener('click', hideAddUserModal);-->
<!--            }-->
<!--        });-->
<!--    </script>-->
<!--</head>-->
<!--<body>-->
<!--<div class="login-container min-h-screen flex items-center justify-center bg-gray-100 p-6">-->
<!--    <div class="header text-center">-->
<!--        <div class="organization-name text-xl font-bold">Pusat Riset<br>Informatika</div>-->
<!--        <div class="mt-6 space-x-4">-->
<!--            <button id="addUserButton" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">-->
<!--                Tambah Pengguna-->
<!--            </button>-->
<!--            <a href="--><?php //= BASEURL ?><!--/dashboardAdmin"-->
<!--               class="px-4 py-2 bg-gray-300 text-black rounded-xl hover:bg-gray-400">-->
<!--                Kembali ke Dashboard-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    -->
<!--    <div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">-->
<!--        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4">-->
<!--            <h3 class="text-2xl font-bold text-blue-900 mb-6">Tambah Pengguna Baru</h3>-->
<!--            <form action="--><?php //= BASEURL ?><!--/User/create" method="POST" class="space-y-4" enctype="multipart/form-data">-->
<!--                <div>-->
<!--                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>-->
<!--                    <input type="text" name="username" id="username"-->
<!--                           class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"-->
<!--                           required placeholder="Username">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>-->
<!--                    <input type="email" name="email" id="email"-->
<!--                           class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"-->
<!--                           required placeholder="Email">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>-->
<!--                    <input type="password" name="password" id="password"-->
<!--                           class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"-->
<!--                           required placeholder="Password">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Peran</label>-->
<!--                    <select name="role" id="role"-->
<!--                            class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500">-->
<!--                        <option value="1">Admin</option>-->
<!--                        <option value="2">User</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-1">Unggah Foto-->
<!--                        Profil</label>-->
<!--                    <input type="file" name="profile_picture" id="profile_picture"-->
<!--                           class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500">-->
<!--                </div>-->
<!--                <div class="flex justify-end space-x-3 mt-6">-->
<!--                    <button type="button" id="cancelButton"-->
<!--                            class="px-4 py-2 text-gray-700 hover:text-gray-900">-->
<!--                        Batal-->
<!--                    </button>-->
<!--                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">-->
<!--                        Simpan-->
<!--                    </button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - IsFor PRI</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS; ?>/css/animations.css">
    <link rel="stylesheet" href="http://localhost/IsFor-website/php/app/views/assets/css/inandout.css">
    <script src="http://localhost/IsFor-website/php/app/views/assets/js/animations.js" defer></script>
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex">
    <!-- Sidebar -->
    <?php include_once '../app/views/assets/components/AdminDashboard/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 min-h-screen ml-64">
        <main class="py-10 px-8">
            <!-- Header -->
            <header class="max-w-7xl mx-auto mb-12">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="h-px w-12 bg-blue-600"></span>
                            <span class="text-blue-600 font-medium">Manajemen</span>
                        </div>
                        <h1 class="text-4xl font-bold text-blue-900">Tambah Pengguna</h1>
                    </div>
                    <a href="<?= BASEURL; ?>/users"
                       class="px-6 py-3 bg-gray-300 text-black rounded-xl hover:bg-gray-400 transition-colors">
                        Kembali ke Daftar Pengguna
                    </a>
                </div>
            </header>

            <!-- Add User Form -->
            <section class="bg-white rounded-2xl border-2 border-blue-100 overflow-hidden fade-in">
                <div class="p-6 border-b border-blue-100">
                    <h2 class="text-xl font-semibold text-blue-900">Formulir Pengguna Baru</h2>
                </div>
                <form action="<?= BASEURL; ?>/User/create" method="POST" class="space-y-4 p-6" enctype="multipart/form-data">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="username" id="username"
                               class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"
                               required placeholder="Username">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email"
                               class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"
                               required placeholder="Email">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="password"
                               class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500"
                               required placeholder="Password">
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                        <select name="role" id="role"
                                class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-1">Unggah Foto
                            Profil</label>
                        <input type="file" name="profile_picture" id="profile_picture"
                               class="w-full px-4 py-2 border-2 border-blue-100 rounded-xl focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="<?= BASEURL; ?>/users"
                           class="px-4 py-2 text-gray-700 hover:text-gray-900">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">Simpan
                        </button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>
</body>
</html>
