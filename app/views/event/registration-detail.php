<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// HAPUS SUCCESS SESSION DARI LOGIN
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

// MAP COMPETITION NAMES
$competitionNames = [
    'anak-ayam' => 'Lomba Anak Ayam',
    'protect-the-queen' => 'Lomba Protect The Queen',
    'cup-of-chaos' => 'Lomba Cup of Chaos',
];

$competitionName = $competitionNames[$registration['competition']] ?? 'Unknown Competition';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Registrasi - <?= $competitionName ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

<div class="flex h-screen w-full">

    <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

    <main class="flex-1 p-[25px] bg-[#F7F4ED] rounded-tl-[50px] h-full overflow-y-auto">

        <div class="bg-[#F5F4EF] rounded-[40px] p-10 md:p-[50px_60px] w-full max-w-[1400px] shadow-sm mx-auto">

            <!-- BACK -->
            <div class="flex items-center gap-5 mb-[30px]">

                <button
                    type="button"
                    onclick="window.location.href='<?= $eventId ? '/event/' . $eventId : '/events' ?>'"
                    class="w-[45px] h-[45px] bg-[#6489BF] rounded-[10px] text-white">

                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <h1 class="text-[28px] font-medium">Back</h1>

            </div>

            <!-- TITLE -->
            <h1 class="text-[56px] font-bold leading-tight">
                <?= $competitionName ?>
            </h1>

            <!-- SUCCESS BADGE -->
            <div class="mt-6 inline-flex items-center gap-2 px-6 py-3 bg-green-100 border border-green-400 text-green-700 rounded-[10px] font-semibold text-[18px]">
                <i class="fa-solid fa-check-circle"></i>
                Registrasi Berhasil!
            </div>
            <?php if (isset($_SESSION['success'])) unset($_SESSION['success']); ?>

            <!-- ERROR MESSAGE -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-[10px]">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- REGISTRATION DETAILS -->
            <div class="mt-10 bg-white rounded-[20px] p-8 shadow-sm">

                <!-- CLASS & PHONE -->
                <div class="grid grid-cols-2 gap-8 mb-8">

                    <!-- CLASS -->
                    <div>
                        <label class="block text-[18px] font-semibold text-gray-700 mb-2">Kelas</label>
                        <div class="bg-[#6C8FC7] text-white rounded-[10px] px-6 py-3 text-[20px] font-bold">
                            <?= htmlspecialchars($registration['class_target']) ?>
                        </div>
                    </div>

                    <!-- PHONE -->
                    <div>
                        <label class="block text-[18px] font-semibold text-gray-700 mb-2">Nomor Telepon (Pemain 1)</label>
                        <div class="bg-[#6C8FC7] text-white rounded-[10px] px-6 py-3 text-[20px] font-bold">
                            <?= htmlspecialchars($registration['phone_number']) ?>
                        </div>
                    </div>

                </div>

                <!-- MEMBERS LIST -->
                <div>
                    <label class="block text-[18px] font-semibold text-gray-700 mb-4">Daftar Member</label>

                    <div class="space-y-3">
                        <?php foreach ($members as $index => $member): ?>
                            <div class="bg-gray-100 rounded-[10px] px-6 py-3 flex items-center gap-4">
                                <span class="bg-[#6C8FC7] text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                    <?= $index + 1 ?>
                                </span>
                                <span class="text-[18px]">
                                    <?= htmlspecialchars($member['player_name']) ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- REGISTRATION INFO -->
                <div class="mt-8 pt-8 border-t border-gray-300">
                    <div class="text-gray-600 text-[14px]">
                        <p>
                            <span class="font-semibold">Registration ID:</span>
                            <span class="text-gray-500">#<?= htmlspecialchars($registration['id']) ?></span>
                        </p>
                        <p class="mt-2">
                            <span class="font-semibold">Tanggal Daftar:</span>
                            <span class="text-gray-500">
                                <?php if (isset($registration['created_at'])): ?>
                                    <?= date('d M Y H:i', strtotime($registration['created_at'])) ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </span>
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </main>

</div>

</body>

</html>
