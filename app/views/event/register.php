<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = '';
$members = 0;

switch ($competition) {

    case 'anak-ayam':
        $title = 'Lomba Anak Ayam';
        $members = 10;
        break;

    case 'protect-the-queen':
        $title = 'Lomba Protect The Queen';
        $members = 8;
        break;

    case 'cup-of-chaos':
        $title = 'Lomba Cup of Chaos';
        $members = 5;
        break;

    default:
        $title = 'Competition Not Found';
        $members = 0;
}

$alreadyRegistered = $alreadyRegistered ?? null;
$userId = $_SESSION['user']['id'] ?? null;
$eventId = $eventId ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

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
                <?= $title ?>
            </h1>

            <!-- SUCCESS MESSAGE -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-[10px]">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <!-- ERROR MESSAGE -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-[10px]">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- NOT LOGIN -->
            <?php if (!$userId): ?>

                <p class="mt-10 text-red-500 text-[20px] font-semibold">
                    Silakan login untuk mendaftar.
                </p>

            <!-- FORM -->
            <?php elseif (!$alreadyRegistered): ?>

                <form action="/competition/store" method="POST" class="mt-10">

                    <input type="hidden" name="competition" value="<?= $competition ?>">
                    <input type="hidden" name="event_id" value="<?= $eventId ?>">

                    <!-- CLASS -->
                    <div>
                        <label class="block text-[20px] mb-4">Class</label>

                        <select name="class_target"
                                class="w-[220px] h-[55px] bg-[#6C8FC7] text-white rounded-[10px] px-5"
                                required>

                            <option value="">Select Class</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>

                        </select>
                    </div>

                    <!-- MEMBERS -->
                    <div class="mt-8">
                        <label class="block text-[20px] mb-5">Members</label>

                        <div class="grid grid-cols-2 gap-x-14 gap-y-4 max-w-[1100px]">

                            <?php for ($i = 1; $i <= $members; $i++): ?>

                                <input type="text"
                                       name="players[]"
                                       placeholder="Player <?= $i ?>"
                                       required
                                       class="border border-black rounded-[10px] px-4 h-[55px] bg-transparent">

                            <?php endfor; ?>

                        </div>

                        <p class="mt-5 italic font-semibold text-[18px]">
                            *This competition requires exactly <?= $members ?> members per team
                        </p>
                    </div>

                    <!-- PHONE -->
                    <div class="mt-6">
                        <label class="block text-[20px] mb-4">
                            Phone Number (Player 1)
                        </label>

                        <input type="text"
                               name="phone_number"
                               placeholder="08** **** ****"
                               class="w-[500px] border border-black rounded-[10px] px-4 h-[55px]"
                               required>
                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end mt-10">
                        <button type="submit"
                                class="bg-[#6C8FC7] hover:bg-[#5C7DB2] transition text-white text-[22px] font-semibold px-16 py-4 rounded-[12px]">

                            Submit
                        </button>
                    </div>

                </form>

            <!-- ALREADY REGISTERED -->
            <?php else: ?>

                <a href="/competition/detail/<?= $alreadyRegistered['id'] ?>?event_id=<?= $eventId ?>">
                    <button class="mt-10 bg-green-500 text-white px-6 py-3 rounded-[10px]">
                        Lihat Registrasi Saya
                    </button>
                </a>

            <?php endif; ?>

        </div>
    </main>

</div>

</body>
</html>