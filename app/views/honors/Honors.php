<?php
$honors = [
    [
        "title" => "Prestasi Membanggakan : Juara 3 Lomba Band Symphoria SMAN 3 Pontianak.",
        "image" => "/assets/images/Prestasi 1.png",
        "likes" => 11,
        "date" => "March 6, 2026"
    ],
    [
        "title" => "Best Coordinator Supporter Honda DBL 2025-2026 West Kalimantan Series.",
        "image" => "/assets/images/Prestasi 2.png",
        "likes" => 10,
        "date" => "March 5, 2026"
    ],
    [
        "title" => "Juara harapan 1 Lomba Wushu Tingkat Nasional Universitas Indonesia Tahun 2025.",
        "image" => "/assets/images/Prestasi 3.png",
        "likes" => 9,
        "date" => "March 5, 2026"
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honors</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-[#315E9E] overflow-hidden">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

    <!-- CONTENT -->
    <main class="
        flex-1
        bg-[#F3F0EB]

        rounded-tl-[45px]
        rounded-bl-[45px]

        ml-[-6px]

        px-[55px]
        pt-[42px]

        min-h-screen
    ">

        <!-- TITLE -->
        <h1 class="
            text-[36px]
            font-bold
            text-black
            mb-[28px]
        ">
            Honors
        </h1>

        <!-- CARDS -->
        <div class="
            flex
            gap-[48px]
        ">

            <?php foreach($honors as $honor): ?>

                <div class="w-[450px]">

                    <!-- IMAGE -->
                    <img
                        src="<?= $honor['image']; ?>"
                        alt="honor"
                       class="
                         w-[450px]
                         h-[300px]
                         object-cover
                         rounded-[4px]
                        "
                    >

                    <!-- TITLE -->
                    <h2 class="
                        mt-[10px]

                        text-[#2957A5]

                        text-[15px]
                        font-bold
                        leading-[1.3]
                    ">
                        <?= $honor['title']; ?>
                    </h2>

                    <!-- FOOTER -->
                    <div class="
                        flex
                        justify-between
                        items-center

                        mt-[14px]

                        text-[13px]
                        text-[#555]
                    ">

                        <!-- LIKE -->
                        <div class="flex items-center gap-[6px]">

                            <i class="fa-solid fa-thumbs-up text-[#2957A5] text-[12px]"></i>

                            <span>
                                <?= $honor['likes']; ?>
                            </span>

                        </div>

                        <!-- DATE -->
                        <div class="flex items-center gap-[6px]">

                            <i class="fa-solid fa-calendar text-[#2957A5] text-[12px]"></i>

                            <span>
                                <?= $honor['date']; ?>
                            </span>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </main>

</div>

</body>
</html>