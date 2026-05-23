<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] m-0 overflow-hidden">

    <div class="flex h-screen w-full overflow-hidden">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- RIGHT CONTENT -->
        <div class="flex-1 rounded-tl-[50px] rounded-bl-[50px] bg-[#f9f5eb] overflow-y-auto">

            <!-- HEADER -->
            <?php require_once '../app/views/layouts/partials/header.php'; ?>

            <!-- MAIN CONTENT -->
            <main class="px-[30px] pb-[40px]">

                <div class="flex gap-[30px] min-h-max">

                    <!-- LEFT CONTENT -->
                    <div class="flex-1">

                        <!-- STATS -->
                        <div class="grid grid-cols-3 gap-5 mb-8 mt-5">

                            <!-- EVENTS -->
                            <div class="bg-[#c7d0db] rounded-2xl p-7 shadow-sm">

                                <div class="flex justify-between items-start">

                                    <div>
                                        <h3 class="text-[#2D5DA1] text-[22px] font-bold mb-4">
                                            Active Events
                                            <i class="fa fa-calendar-check ml-1"></i>
                                        </h3>

                                        <h1 class="text-[90px] font-bold leading-none text-[#2D5DA1]">
                                            <?= $totalEvents; ?>
                                        </h1>

                                        <p class="text-[#2D5DA1] text-[18px] font-semibold mt-2">
                                            Ongoing events
                                        </p>
                                    </div>

                                    <button class="w-[42px] h-[42px] rounded-full bg-[#2D5DA1] text-white" onclick="window.location.href='/admin/events'">
                                        <i class="fa fa-arrow-up-right-from-square"></i>
                                    </button>

                                </div>
                            </div>

                            <!-- PARTICIPANTS -->
                            <div class="bg-[#2D5DA1] rounded-2xl p-7 text-white shadow-sm">

                                <div class="flex justify-between items-start">

                                    <div>
                                        <h3 class="text-[22px] font-bold mb-4">
                                            Participants
                                            <i class="fa fa-users ml-1"></i>
                                        </h3>

                                        <h1 class="text-[90px] font-bold leading-none">
                                            <?= $totalParticipants; ?>
                                        </h1>

                                        <p class="text-[18px] font-semibold mt-2">
                                            Registered participants
                                        </p>
                                    </div>

                                    <button class="w-[42px] h-[42px] rounded-full border border-white text-white" onclick="window.location.href='/admin/participants'">
                                        <i class="fa fa-arrow-up-right-from-square"></i>
                                    </button>

                                </div>
                            </div>

                            <!-- USERS -->
                            <div class="bg-[#2D5DA1] rounded-2xl p-7 text-white shadow-sm">

                                <div class="flex justify-between items-start">

                                    <div>
                                        <h3 class="text-[22px] font-bold mb-4">
                                            Users
                                            <i class="fa fa-user-group ml-1"></i>
                                        </h3>

                                        <h1 class="text-[90px] font-bold leading-none">
                                            <?= $totalUsers; ?>
                                        </h1>

                                        <p class="text-[18px] font-semibold mt-2">
                                            Registered user accounts
                                        </p>
                                    </div>

                                    <button class="w-[42px] h-[42px] rounded-full border border-white text-white" onclick="window.location.href='/admin/users'">
                                        <i class="fa fa-arrow-up-right-from-square"></i>
                                    </button>

                                </div>
                            </div>

                        </div>

                        <!-- TABLE SECTION -->
                        <div>

                            <h1 class="text-[55px] font-bold text-black mb-5">
                                Recent Registrations
                            </h1>

                            <div class="overflow-x-auto">

                                <table class="w-full border-separate border-spacing-y-2">

                                    <!-- HEADER -->
                                    <thead>

                                        <tr class="bg-[#2D5DA1] text-white text-left">

                                            <th class="py-4 px-5 rounded-l-xl text-lg">
                                                No
                                            </th>

                                            <th class="py-4 px-5 text-lg">
                                                Name
                                            </th>

                                            <th class="py-4 px-5 text-lg">
                                                Class
                                            </th>

                                            <th class="py-4 px-5 text-lg">
                                                Date
                                            </th>

                                            <th class="py-4 px-5 rounded-r-xl text-lg">
                                                Event
                                            </th>

                                        </tr>

                                    </thead>

                                    <!-- BODY -->
                                    <tbody>

                                        <?php foreach ($recentRegistrations as $index => $item): ?>

                                            <tr class="bg-[#c7d0db]">

                                                <!-- NO -->
                                                <td class="py-4 px-5 font-semibold text-[#2D5DA1] rounded-l-lg">
                                                    <?= $index + 1; ?>
                                                </td>

                                                <!-- NAME -->
                                                <td class="py-4 px-5 font-semibold text-[#2D5DA1]">
                                                    <?= htmlspecialchars($item['name']); ?>
                                                </td>

                                                <!-- CLASS -->
                                                <td class="py-4 px-5 font-semibold text-[#2D5DA1]">
                                                    <?= htmlspecialchars($item['class'] ?? '-'); ?>
                                                </td>

                                                <!-- DATE -->
                                                <td class="py-4 px-5 font-semibold text-[#2D5DA1]">
                                                    <?= date('d/m/Y', strtotime($item['created_at'])); ?>
                                                </td>

                                                <!-- EVENT -->
                                                <td class="py-4 px-5 font-semibold text-[#2D5DA1] rounded-r-lg">
                                                    <?= htmlspecialchars($item['event_name']); ?>
                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT BUTTONS -->
                    <div class="w-[340px] pt-[160px] flex flex-col gap-5 sticky top-5 h-fit">

                        <!-- ADD EVENT -->
                        <button onclick="window.location.href='/admin/events/create'"
                            class="bg-[#2D5DA1] text-white rounded-2xl px-8 py-7 flex justify-between items-center hover:scale-[1.02] transition">

                            <span class="text-[24px] font-bold">
                                Add Event
                            </span>

                            <div class="w-[42px] h-[42px] rounded-full border border-white flex items-center justify-center">
                                <i class="fa fa-plus text-xl"></i>
                            </div>
                        </button>

                        <!-- ADD HONOR -->
                        <button onclick="window.location.href='/admin/honors/create'"
                            class="bg-[#6f93c8] text-white rounded-2xl px-8 py-7 flex justify-between items-center hover:scale-[1.02] transition">

                            <span class="text-[24px] font-bold">
                                Add Honor
                            </span>

                            <div class="w-[42px] h-[42px] rounded-full border border-white flex items-center justify-center">
                                <i class="fa fa-plus text-xl"></i>
                            </div>
                        </button>

                        <!-- ADD HIGHLIGHT -->
                        <button
                            class="bg-[#2D5DA1] text-white rounded-2xl px-8 py-7 flex justify-between items-center hover:scale-[1.02] transition">

                            <span class="text-[24px] font-bold">
                                Add Highlight
                            </span>

                            <div class="w-[42px] h-[42px] rounded-full border border-white flex items-center justify-center">
                                <i class="fa fa-plus text-xl"></i>
                            </div>
                        </button>

                        <!-- ADD UPCOMING -->
                        <button
                            class="bg-[#6f93c8] text-white rounded-2xl px-8 py-7 flex justify-between items-center hover:scale-[1.02] transition">

                            <span class="text-[24px] font-bold">
                                Add Upcoming
                            </span>

                            <div class="w-[42px] h-[42px] rounded-full border border-white flex items-center justify-center">
                                <i class="fa fa-plus text-xl"></i>
                            </div>
                        </button>

                    </div>

                </div>

            </main>

        </div>

    </div>

</body>

</html>