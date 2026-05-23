<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Competition Registrations
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

    <div class="flex h-screen w-full">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- MAIN -->
        <main class="flex-1 p-[25px] bg-[#F7F4ED] rounded-tl-[50px] h-full overflow-y-auto">

            <div class="bg-[#F5F4EF] rounded-[40px] p-[40px] shadow-sm">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-10">

                    <div>

                        <h1 class="text-[42px] font-bold text-[#1E1E1E]">

                            Competition Registrations

                        </h1>

                        <p class="text-gray-500 mt-2">

                            Manage all participant registrations

                        </p>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full border-separate border-spacing-y-4">

                        <!-- TABLE HEAD -->
                        <thead>

                            <tr class="text-left text-[#555]">

                                <th class="pb-4">
                                    Competition
                                </th>

                                <th class="pb-4">
                                    Class
                                </th>

                                <th class="pb-4">
                                    Phone Number
                                </th>

                                <th class="pb-4">
                                    Members
                                </th>

                                <th class="pb-4">
                                    Registered At
                                </th>

                                <th class="pb-4 text-center">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>

                            <?php if (!empty($registrations)): ?>

                                <?php foreach ($registrations as $registration): ?>

                                    <tr class="bg-white shadow-sm">

                                        <!-- COMPETITION -->
                                        <td class="px-5 py-5 rounded-l-[18px] font-semibold">

                                            <?= ucwords(
                                                str_replace(
                                                    '-',
                                                    ' ',
                                                    htmlspecialchars($registration['competition'])
                                                )
                                            ) ?>

                                        </td>

                                        <!-- CLASS -->
                                        <td class="px-5 py-5">

                                            Class <?= htmlspecialchars($registration['class_target']) ?>

                                        </td>

                                        <!-- PHONE -->
                                        <td class="px-5 py-5">

                                            <?= htmlspecialchars($registration['phone_number']) ?>

                                        </td>

                                        <!-- MEMBERS -->
                                        <td class="px-5 py-5">

                                            <?php

                                            $members =
                                                $this->registrationModel
                                                    ->getMembers($registration['id']);

                                            ?>

                                            <div class="flex flex-col gap-2">

                                                <?php foreach ($members as $member): ?>

                                                    <span
                                                        class="bg-[#EDF2FF] text-[#2D5DA1] px-3 py-1 rounded-full text-[14px] w-fit">

                                                        <?= htmlspecialchars($member['player_name']) ?>

                                                    </span>

                                                <?php endforeach; ?>

                                            </div>

                                        </td>

                                        <!-- CREATED -->
                                        <td class="px-5 py-5">

                                            <?= date(
                                                "d M Y",
                                                strtotime($registration['created_at'])
                                            ) ?>

                                        </td>

                                        <!-- ACTION -->
                                        <td class="px-5 py-5 rounded-r-[18px]">

                                            <div class="flex justify-center gap-3">

                                                <!-- DETAIL -->
                                                <a
                                                    href="/competition/detail/<?= $registration['id'] ?>"
                                                    class="w-[42px] h-[42px] rounded-[10px] bg-[#6488C4] text-white flex items-center justify-center hover:scale-105 transition">

                                                    <i class="fa-solid fa-eye"></i>

                                                </a>

                                                <!-- DELETE -->
                                                <a
                                                    href="/competition/delete/<?= $registration['id'] ?>"
                                                    onclick="return confirm('Delete this registration?')"
                                                    class="w-[42px] h-[42px] rounded-[10px] bg-red-500 text-white flex items-center justify-center hover:scale-105 transition">

                                                    <i class="fa-solid fa-trash"></i>

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center py-10 text-gray-500">

                                        No registrations found.

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>