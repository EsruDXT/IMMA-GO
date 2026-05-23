<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>School Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

    <div class="flex h-screen w-full">
        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>


        <main class="flex-1 rounded-tl-[50px] rounded-bl-[50px] bg-[#f9f5eb] shadow-2xl flex overflow-hidden">
            <!-- Left -->
            <section class="w-[30%] flex flex-col items-center py-16 px-8 border-r border-gray-200">
                <div class="relative mb-6">
                    <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="/assets/images/profile.png" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?></h2>
                <p class="text-gray-500 font-medium mb-8"><?= strtoupper(htmlspecialchars($_SESSION['user']['role'] ?? '')); ?></p>

                <!-- Menu -->
                <div class="w-full space-y-3">

                    <button onclick="window.location.href='/profile'"
                        class="w-full bg-[#a7bed3] text-gray-800 py-3 px-4 rounded-full flex items-center justify-center gap-3 font-semibold shadow-sm">
                        <i class="fas fa-user-circle"></i>
                        Personal Information
                    </button>

                    <button onclick="window.location.href='/profile/student-activities'"
                        class="w-full text-gray-600 py-3 px-4 rounded-full flex items-center justify-center gap-3 font-medium hover:bg-gray-100 transition">
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

            <section class="flex-1 p-16">
                <h1 class="text-4xl font-bold text-gray-800 mb-10">Student Profile</h1>

                <form class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">First Name</label>
                        <input type="text" value="<?= htmlspecialchars($profile['first_name'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">Last Name</label>
                        <input type="text" value="<?= htmlspecialchars($profile['last_name'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">Class</label>
                        <input type="text" value="<?= htmlspecialchars($profile['class'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">Gender</label>
                        <input type="text" value="<?= htmlspecialchars($profile['gender'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">NIS</label>
                        <input type="text" value="<?= htmlspecialchars($profile['nis'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">NISN</label>
                        <input type="text" value="<?= htmlspecialchars($profile['nisn'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>

                    <div class="col-span-2 space-y-2">
                        <label class="block text-gray-600 font-medium">Email</label>
                        <input type="email" value="<?= htmlspecialchars($_SESSION['user']['email'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>

                    <div class="col-span-2 space-y-2">
                        <label class="block text-gray-600 font-medium">Address</label>
                        <input type="text" value="<?= htmlspecialchars($profile['address'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">Phone Number</label>
                        <input type="text" value="<?= htmlspecialchars($profile['phone_number'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-600 font-medium">Date of Birth</label>
                        <input type="text" value="<?= htmlspecialchars($profile['date_of_birth'] ?? ''); ?>" readonly class="w-full bg-[#d9d9d9] p-3 rounded-lg border-none">
                    </div>
                </form>
            </section>
        </main>

</body>

</html>