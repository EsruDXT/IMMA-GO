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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

    <div class="flex h-screen w-full">

        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <main class="flex-1 p-[25px] bg-[#F7F4ED] rounded-tl-[50px] h-full overflow-y-auto">

            <div class="bg-[#F5F4EF] rounded-[40px] p-10 md:p-[50px_60px] w-full max-w-[1400px] shadow-sm mx-auto">

                <!-- CONTENT -->
                <main>

                    <!-- BACK -->
                    <div class="flex items-center gap-5 mb-[30px]">

                       <button
    type="button"
    onclick="window.location.href='/event/<?= $eventId ?>'"
    class="w-[45px] h-[45px] bg-[#6489BF] rounded-[10px] text-white">

    <i class="fa-solid fa-chevron-left"></i>

</button>

                        <h1 class="text-[28px] font-medium">
                            Back
                        </h1>

                    </div>

                    <!-- TITLE -->
                    <h1 class="text-[56px] font-bold leading-tight">
                        <?= $title ?>
                    </h1>

                    <!-- FORM -->
                    <form
                        action="/competition/store"
                        method="POST"
                        class="mt-10">

                        <!-- HIDDEN -->
                        <input
                            type="hidden"
                            name="competition"
                            value="<?= $competition ?>">

                        <!-- CLASS -->
                        <div>

                            <label class="block text-[20px] mb-4">
                                Class
                            </label>

                            <select
                                name="class_target"
                                required
                                class="w-[220px] h-[55px] bg-[#6C8FC7] text-white rounded-[10px] px-5 outline-none">

                                <option value="">
                                    Select Class
                                </option>

                                <option value="10">
                                    10
                                </option>

                                <option value="11">
                                    11
                                </option>

                                <option value="12">
                                    12
                                </option>

                            </select>

                        </div>

                        <!-- MEMBERS -->
                        <div class="mt-8">

                            <label class="block text-[20px] mb-5">
                                Members
                            </label>

                            <div class="grid grid-cols-2 gap-x-14 gap-y-4 max-w-[1100px]">

                                <?php for ($i = 1; $i <= $members; $i++): ?>

                                    <input
                                        type="text"
                                        name="players[]"
                                        placeholder="Player <?= $i ?>..."
                                        required
                                        class="border border-black rounded-[10px] px-4 h-[55px] bg-transparent outline-none">

                                <?php endfor; ?>

                            </div>

                            <!-- NOTE -->
                            <p class="mt-5 italic font-semibold text-[18px]">

                                *This competition requires exactly <?= $members ?> members per team

                            </p>

                        </div>

                        <!-- PHONE -->
                        <div class="mt-6">

                            <label class="block text-[20px] mb-4">
                                Phone Number (Player 1)
                            </label>

                            <input
                                type="text"
                                name="phone_number"
                                placeholder="08** **** ****"
                                required
                                class="w-[500px] border border-black rounded-[10px] px-4 h-[55px] bg-transparent outline-none">

                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end mt-10">

                            <button
                                type="submit"
                                class="bg-[#6C8FC7] hover:bg-[#5C7DB2] transition text-white text-[22px] font-semibold px-16 py-4 rounded-[12px]">

                                Submit

                            </button>

                        </div>

                    </form>

                </main>

            </div>

        </main>

    </div>

    <!-- POPUP -->
    <div id="alreadyRegisteredPopup"
        class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-[#2D5DA1] w-[500px] rounded-[20px] p-8 relative text-white">

            <!-- CLOSE -->
            <button
                onclick="closePopup()"
                class="absolute top-5 right-5 text-[28px] font-bold">

                &times;

            </button>

            <!-- TITLE -->
            <div class="flex items-center justify-center gap-3">

                <h1 class="text-[40px] font-bold">
                    Registration Successful
                </h1>

                <i class="fa-solid fa-circle-check text-green-400 text-[34px]"></i>

            </div>

            <!-- LINE -->
            <div class="w-full h-[2px] bg-white mt-4 mb-6"></div>

            <!-- MESSAGE -->
            <h2 class="text-center text-[28px] font-semibold leading-tight">

                You have successfully registered for this competition.

            </h2>

            <p class="text-center text-[18px] mt-4 text-[#E8E8E8]">

                Your registration has been recorded successfully.

            </p>

            <!-- BUTTON -->
            <div class="flex justify-center mt-8">

                <button
                    onclick="closePopup()"
                    class="border-2 border-white px-10 py-3 rounded-[10px] text-[24px] font-semibold hover:bg-white hover:text-[#2D5DA1] transition">

                    OK

                </button>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>

        function openPopup() {

            document
                .getElementById('alreadyRegisteredPopup')
                .classList
                .remove('hidden');

            document
                .getElementById('alreadyRegisteredPopup')
                .classList
                .add('flex');
        }

        function closePopup() {

            document
                .getElementById('alreadyRegisteredPopup')
                .classList
                .add('hidden');

            document
                .getElementById('alreadyRegisteredPopup')
                .classList
                .remove('flex');
        }

    </script>

    <!-- AUTO OPEN -->
    <?php if (isset($_SESSION['register_success'])): ?>

        <script>

            window.onload = function () {
                openPopup();
            };

        </script>

        <?php unset($_SESSION['register_success']); ?>

    <?php endif; ?>

</body>

</html>