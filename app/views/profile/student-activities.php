<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Activities</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

    <div class="flex h-screen w-full">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- MAIN -->
        <main class="flex-1 rounded-tl-[50px] rounded-bl-[50px] bg-[#f9f5eb] shadow-2xl flex overflow-hidden">

            <!-- LEFT PROFILE -->
            <section class="w-[30%] flex flex-col items-center py-16 px-8 border-r border-gray-200">

                <!-- Profile Image -->
                <div class="relative mb-6">
                    <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="/assets/images/profile.png"
                            alt="Profile Picture"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Name -->
                <h2 class="text-2xl font-bold text-gray-800">
                    <?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>
                </h2>

                <!-- Role -->
                <p class="text-gray-500 font-medium mb-8">
                    <?= strtoupper(htmlspecialchars($_SESSION['user']['role'] ?? '')); ?>
                </p>

                <!-- Menu -->
                <div class="w-full space-y-3">

                    <button onclick="window.location.href='/profile'"
                        class="w-full text-gray-600 py-3 px-4 rounded-full flex items-center justify-center gap-3 font-medium hover:bg-gray-100 transition">

                        <i class="fas fa-user-circle"></i>
                        Personal Information
                    </button>

                    <button onclick="window.location.href='/profile/student-activities'"
                        class="w-full bg-[#a7bed3] text-gray-800 py-3 px-4 rounded-full flex items-center justify-center gap-3 font-semibold shadow-sm">

                        <i class="fas fa-list-ul"></i>
                        Student Activities
                    </button>

                    <button onclick="window.location.href='/logout'"
                        class="w-full text-gray-600 py-3 px-4 rounded-full flex items-center justify-center gap-3 font-medium hover:bg-red-50 hover:text-red-500 transition mt-10">

                        <i class="fas fa-sign-out-alt"></i>
                        Log Out
                    </button>
                </div>
            </section>

            <!-- RIGHT CONTENT -->
            <section class="flex-1 px-14 py-10 overflow-y-auto">

                <!-- Title -->
                <h1 class="text-5xl font-bold text-center text-black mb-10">
                    Student Activities
                </h1>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mb-8">

                    <!-- Total -->
                    <div class="bg-white rounded-3xl shadow-md p-6 flex items-center gap-5">

                        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-trophy text-blue-600 text-2xl"></i>
                        </div>

                        <div>
                            <h2 class="text-4xl font-bold">
                                <?= count($upcoming) + count($history); ?>
                            </h2>

                            <p class="text-gray-500 font-semibold">
                                Total Joined
                            </p>

                            <span class="text-gray-400 text-sm">
                                All Time
                            </span>
                        </div>
                    </div>

                    <!-- Upcoming -->
                    <div class="bg-white rounded-3xl shadow-md p-6 flex items-center gap-5">

                        <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-calendar text-yellow-500 text-2xl"></i>
                        </div>

                        <div>
                            <h2 class="text-4xl font-bold">
                                <?= count($upcoming); ?>
                            </h2>

                            <p class="text-gray-500 font-semibold">
                                Upcoming
                            </p>

                            <span class="text-gray-400 text-sm">
                                Registered
                            </span>
                        </div>
                    </div>

                    <!-- Completed -->
                    <div class="bg-white rounded-3xl shadow-md p-6 flex items-center gap-5">

                        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-clipboard-check text-green-600 text-2xl"></i>
                        </div>

                        <div>
                            <h2 class="text-4xl font-bold">
                                <?= count($history); ?>
                            </h2>

                            <p class="text-gray-500 font-semibold">
                                Completed
                            </p>

                            <span class="text-gray-400 text-sm">
                                Finished
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Activity Table -->
                <div class="bg-white rounded-3xl shadow-md overflow-hidden">

                    <!-- Tabs -->
                    <div class="flex items-center border-b px-6 pt-4">

                        <button id="upcomingTab"
                            class="tabBtn px-5 py-3 text-[#2D5DA1] border-b-2 border-[#2D5DA1] font-semibold flex items-center gap-2">

                            <i class="fas fa-calendar"></i>
                            Upcoming
                        </button>

                        <button id="historyTab"
                            class="tabBtn px-5 py-3 text-gray-500 font-semibold flex items-center gap-2">

                            <i class="fas fa-history"></i>
                            History
                        </button>

                        <a href="#"
                            class="ml-auto text-[#2D5DA1] text-sm font-medium hover:underline">

                            View All
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="p-6 overflow-x-auto">

                        <table class="w-full text-left border-separate border-spacing-y-4">

                            <thead>
                                <tr class="text-gray-500 text-sm">
                                    <th>Activity</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody id="activityTable">

                                <!-- UPCOMING -->
                                <?php foreach ($upcoming as $item): ?>

                                    <tr class="upcomingRow">

                                        <td class="font-medium">
                                            <?= htmlspecialchars($item['title']); ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($item['category']); ?>
                                        </td>

                                        <td>
                                            <?= date('M d, Y', strtotime($item['event_date'])); ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($item['location']); ?>
                                        </td>

                                        <td>
                                            <?php
                                            $statusLabel = ucfirst($item['status']);

                                            $badgeColor =
                                                $statusLabel === 'Registered'
                                                ? 'bg-blue-100 text-blue-600'
                                                : 'bg-green-100 text-green-600';
                                            ?>

                                            <span class="<?= $badgeColor ?> text-xs px-3 py-1 rounded-full font-semibold">
                                                <?= $statusLabel ?>
                                            </span>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>


                                <!-- HISTORY -->
                                <?php foreach ($history as $item): ?>

                                    <tr class="historyRow hidden">

                                        <td class="font-medium">
                                            <?= htmlspecialchars($item['title']); ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($item['category']); ?>
                                        </td>

                                        <td>
                                            <?= date('M d, Y', strtotime($item['event_date'])); ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($item['location']); ?>
                                        </td>

                                        <td>
                                            <?php
                                            $statusLabel = ucfirst($item['status']);

                                            $badgeColor =
                                                $statusLabel === 'Completed'
                                                ? 'bg-green-100 text-green-600'
                                                : 'bg-blue-100 text-blue-600';
                                            ?>

                                            <span class="<?= $badgeColor ?> text-xs px-3 py-1 rounded-full font-semibold">
                                                <?= $statusLabel ?>
                                            </span>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- SCRIPT -->
    <script>

        const upcomingTab = document.getElementById('upcomingTab');
        const historyTab = document.getElementById('historyTab');

        const upcomingRows = document.querySelectorAll('.upcomingRow');
        const historyRows = document.querySelectorAll('.historyRow');

        upcomingTab.addEventListener('click', () => {

            upcomingRows.forEach(row => row.classList.remove('hidden'));
            historyRows.forEach(row => row.classList.add('hidden'));

            upcomingTab.classList.add(
                'text-[#2D5DA1]',
                'border-b-2',
                'border-[#2D5DA1]'
            );

            historyTab.classList.remove(
                'text-[#2D5DA1]',
                'border-b-2',
                'border-[#2D5DA1]'
            );

            historyTab.classList.add('text-gray-500');
        });

        historyTab.addEventListener('click', () => {

            historyRows.forEach(row => row.classList.remove('hidden'));
            upcomingRows.forEach(row => row.classList.add('hidden'));

            historyTab.classList.add(
                'text-[#2D5DA1]',
                'border-b-2',
                'border-[#2D5DA1]'
            );

            upcomingTab.classList.remove(
                'text-[#2D5DA1]',
                'border-b-2',
                'border-[#2D5DA1]'
            );

            upcomingTab.classList.add('text-gray-500');
        });

    </script>

</body>

</html>