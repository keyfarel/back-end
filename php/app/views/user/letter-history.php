<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Surat - IsFor Internet of Things For Human Life's</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fade-in { 
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }
        
        .slide-up { 
            animation: slideUp 0.5s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .letter-card {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .letter-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -10px rgba(51, 65, 85, 0.1);
        }

        .status-badge {
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-white">
    <div class="flex">
        <?php include '../app/views/assets/components/UserDashboard/sidebar.php'; ?>
    
        <div class="flex-1 min-h-screen ml-64">
            <main class="py-10 px-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Header Section -->
                    <div class="mb-8 fade-in">
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            Riwayat Surat
                        </h1>
                        <p class="mt-2 text-blue-600">Kelola dan pantau status pengajuan surat Anda</p>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-xl border-2 border-blue-100 slide-up" style="animation-delay: 0.1s">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-blue-600">Total Surat</p>
                                    <p class="text-2xl font-bold text-blue-900"><?= $data['letter']['total'] ?></p>
                                </div>
                                <div class="p-3 bg-blue-50 rounded-xl">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Similar stats cards for Approved and Pending -->
                    </div>

                    <!-- Letter List Section -->
                    <div class="bg-white rounded-xl border-2 border-blue-100 overflow-hidden slide-up" style="animation-delay: 0.2s">
                        <!-- Filters and Search -->
                        <div class="p-6 border-b border-blue-100">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <button class="px-4 py-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors" onclick="filter(0)">
                                        Semua
                                    </button>
                                    <button class="px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"  onclick="filter(2)">
                                        Disetujui
                                    </button>
                                    <button class="px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"  onclick="filter(1)">
                                        Tertunda
                                    </button>
                                    <button class="px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"  onclick="filter(3)">
                                        Ditolak
                                    </button>
                                </div>
                                <div class="relative">
                                    <input type="text" placeholder="Cari surat..." 
                                           class="pl-10 pr-4 py-2 bg-blue-50 border-0 rounded-lg text-blue-900 placeholder-blue-400
                                                  focus:ring-2 focus:ring-blue-500">
                                    <svg class="w-5 h-5 text-blue-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Letters List -->
                        <div class="p-6 space-y-4">
                            <?php if (empty($data['allLetters'])) : ?>
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 text-blue-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <h3 class="text-xl font-medium text-blue-900 mb-2">Belum ada surat</h3>
                                    <p class="text-blue-600 mb-6">Mulai ajukan surat penelitian Anda sekarang</p>
                                    <a href="<?= BASEURL; ?>/letter/addLetterView" 
                                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 
                                              transition-colors">
                                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        Ajukan Surat
                                    </a>
                                </div>
                            <?php else : ?>
                                <!-- Letter Cards -->
                                <div class="letter-card bg-white p-6 rounded-xl border-2 border-blue-100 hover:border-blue-300">
                                    <!-- Letter content here -->
                                    <table class="w-full">
                                        <thead>
                                        <tr class="text-left text-sm font-medium text-gray-500">
                                            <th class="pb-4">Jenis Dokumen</th>
                                            <th class="pb-4">Tanggal</th>
                                            <th class="pb-4">Status</th>
                                            <th class="pb-4">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Sample submission row -->
                                        <?php foreach($data['allLetters'] AS $letter) :?>
                                        <tr class="border-t border-gray-100">
                                            <td class="py-4"><?= $letter['title'] ?></td>
                                            <td class="py-4"><?= $letter['date'] ?></td>
                                            <td class="py-4">
                                                <?php if($letter['status'] == 1) :?>
                                                    <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">
                                                        Tertunda
                                                    </span>
                                                <?php elseif($letter['status'] == 2) :?>
                                                    <span class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                                        disetujui
                                                    </span>
                                                <?php else :?>
                                                    <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">
                                                        ditolak
                                                    </span>
                                                <?php endif ?>
                                            </td>
                                            <td class="py-4">
                                                <button onclick="viewLetter(<?= $letter['letter_id']; ?>)" class="text-blue-600 hover:text-blue-800">Lihat Detail</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Preview Modal -->
    <div id="letterModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-2xl p-8 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-blue-900">Detail Surat</h3>
                <button onclick="closeLetterModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="letterContent">
                <!-- Letter content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        function viewLetter(id) {
            // Implementation for viewing letter
            document.getElementById('letterModal').classList.remove('hidden');
            document.getElementById('letterModal').classList.add('flex');

            $.ajax({
                url: '<?= BASEURL ?>/letter/getLetter',
                method: 'POST',
                dataType: 'json',
                data: { id : id},
                success: function(data){
                    console.log(data);
                    // Implementation for viewing letter
                    const letterContent = document.getElementById('letterContent');
                    letterContent.innerHTML = `
                        <iframe src="${data}" width="100%" height="500px"></iframe>
                    `;
                },
                error: function(data){
                    alert('Gagal');
                }
            });
        }

        function closeLetterModal() {
            document.getElementById('letterModal').classList.add('hidden');
            document.getElementById('letterModal').classList.remove('flex');
        }

        // Animation observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.slide-up, .fade-in').forEach(el => {
            observer.observe(el);
        });

        function filter(status){
            $.ajax({
                url: '<?= BASEURL ?>/letter/filter',
                method: 'POST',
                dataType: 'json',
                data: { status : status},
                success: function(data){
                    // console.log('Success Response:', data);
                    const letterContainer = document.querySelector(".letter-card table tbody");
                    const tableHeader = `
                        <thead>
                            <tr class="text-left text-sm font-medium text-gray-500">
                                <th class="pb-4">Jenis Dokumen</th>
                                <th class="pb-4">Tanggal</th>
                                <th class="pb-4">Status</th>
                                <th class="pb-4">Aksi</th>
                            </tr>
                        </thead>
                    `;

                    // Clear existing rows and add table header
                    letterContainer.innerHTML = '';

                    // Populate table rows with data
                    data.forEach(letter => {
                        const statusBadge = letter.status === 1
                            ? '<span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Tertunda</span>'
                            : letter.status === 2
                                ? '<span class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Disetujui</span>'
                                : '<span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Ditolak</span>';

                        const row = `
                            <tr class="border-t border-gray-100">
                                <td class="py-4">${letter.title}</td>
                                <td class="py-4">${letter.date}</td>
                                <td class="py-4">${statusBadge}</td>
                                <td class="py-4">
                                    <button onclick="viewLetter(${letter.letter_id})" class="text-blue-600 hover:text-blue-800">Lihat Detail</button>
                                </td>
                            </tr>
                        `;
                        letterContainer.innerHTML += row;
                    });
                },
                error: function(xhr, status, error){
                    console.error('Error Status:', status);
                    console.error('Error Details:', error);
                    console.error('Response Text:', xhr.responseText); 
                    alert('Gagal');
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>