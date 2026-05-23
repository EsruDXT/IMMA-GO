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
        <!-- HEADER -->
        <?php require_once '../app/views/layouts/partials/header.php'; ?>
        <!-- MAIN CONTENT -->
        <div class="flex gap-[30px] mx-[30px] overflow-y-auto">

            <!-- LEFT -->
            <div class="flex-[7]">

                <!-- RECENT EVENT -->
                <div class="relative rounded-[35px] overflow-hidden mb-[20px] w-[630px] h-[360px]">

                    <div class="relative w-[630px] h-[400px] overflow-hidden rounded-[35px]">

                        <!-- Automatic Slide -->
                        <div id="slides" class="flex flex-col transition-all duration-500">

                            <div class="w-full h-full flex-shrink-0">
                                <img src="/assets/images/Slider 1.png" alt="Slide 1" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full h-full flex-shrink-0">
                                <img src="/assets/images/Slider 2.png" alt="Slide 2" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full h-full flex-shrink-0">
                                <img src="/assets/images/Slider 3.png" alt="Slide 3" class="w-full h-full object-cover">
                            </div>

                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-[#2D5DA1] text-white p-[30px] rounded-[35px]">
                        <h2 class="text-[20px] font-bold">Recent Events</h2>
                        <p class="text-[18px]">2025</p>
                        <!-- Titik -->
                        <div class="absolute right-[15px] top-1/2 -translate-y-1/2 flex flex-col gap-[8px]">
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                        </div>

                    </div>

                </div>


                <h1 class="my-[20px] font-extrabold">UPCOMING EVENTS</h1>

                <div class="flex gap-[15px] items-center">

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">
                        
                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]">
                        <img src="/assets/images/CareerDay.jpeg" alt="Event 1" class="w-full h-full object-cover rounded-t-[9px]">
                        </div>

                        <p class="text-[22px] font-bold">Career Day</p>
                        <span class="text-[14px] text-gray-300">25 September 2026</span>

                    </div>

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">

                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]">
                            <img src="/assets/images/HariGuru.jpeg" alt="Event 2" class="w-full h-full object-cover rounded-t-[9px]">
                        </div>

                        <p class="text-[22px] font-bold">Hari Guru</p>
                        <span class="text-[14px] text-gray-300">25 November 2026</span>

                    </div>

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">

                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]">
                            <img src="/assets/images/IbadahNatal.jpeg" alt="Event 3" class="w-full h-full object-cover rounded-t-[9px]">
                        </div>

                        <p class="text-[22px] font-bold">Hari Natal</p>
                        <span class="text-[14px] text-gray-300">17 Desember 2026</span>

                    </div>

                    <div class="flex text-[22px] text-white border-2 rounded-full bg-[#6489BF] p-[10px] justify-center">
                        <i class="fa fa-arrow-right"></i>
                    </div>

                </div>


                <h1 class="my-[20px] font-extrabold">EVENT GALLERY</h1>

                <div class="relative h-[420px] rounded-[10px] overflow-hidden">

    <!-- IMAGE -->
    <img src="/assets/images/Gallery.png"
        alt="Gallery"
        class="w-full h-full object-cover">

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/35 flex items-center justify-center">

        <div class="text-center text-white p-[20px]">

            <h2 class="text-[22px] font-bold">
                UNLOCK OUR GALLERY
            </h2>

            <div class="text-[25px] my-[10px]">
                <i class="fa fa-lock"></i>
            </div>

            <button class="mt-[10px] px-[15px] py-[8px] bg-white rounded-[6px] font-bold text-blue-500 hover:scale-105 transition">
                Unlock Now
            </button>

        </div>

    </div>

</div>

            </div>


            <!-- RIGHT -->
<div class="w-[520px]">

    <h3 class="mb-[20px] text-[22px] font-bold flex justify-center">
        PRESTASI TERBARU
    </h3>

    <?php if (!empty($honors)): ?>

        <?php
        $latestHonors = array_slice($honors, 0, 4);
        ?>

        <?php foreach ($latestHonors as $honor): ?>

            <div class="flex gap-[10px] p-[10px] rounded-[10px] mb-[15px]shadow-sm hover:shadow-md transition">

                <!-- IMAGE -->
                <div class="w-[210px] h-[145px] rounded-[8px] shrink-0 overflow-hidden">

                    <img src="/uploads/honors/<?= htmlspecialchars($honor['image']); ?>"
                        alt="<?= htmlspecialchars($honor['title']); ?>"
                        class="w-full h-full object-cover rounded-[8px]">

                </div>

                <!-- CONTENT -->
                <div class="flex flex-col justify-between">

                    <p class="mt-[5px] ml-[10px] text-[20px] leading-[1.3] font-bold text-[#2D5DA1]">

                        <?= htmlspecialchars($honor['title']); ?>

                    </p>

                    <div class="flex items-center gap-[8px] ml-[10px] mt-[10px]">

                        <i class="fa fa-calendar text-[#2D5DA1]"></i>

                        <span class="text-gray-500 font-bold text-[16px]">

                            <?= date('d F Y', strtotime($honor['honor_date'])); ?>

                        </span>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="flex flex-col items-center justify-center h-[400px] text-center">

            <i class="fa fa-trophy text-[70px] text-[#6489BF] mb-[20px]"></i>

            <h2 class="text-[28px] font-bold text-[#2D5DA1] mb-[10px]">
                No Honors Yet
            </h2>

            <p class="text-gray-500 text-[18px]">
                No achievements have been added.
            </p>

        </div>

    <?php endif; ?>

</div>

        </div>

        <?php require_once '../app/views/layouts/partials/footer.php'; ?>

    </div>

    </div>
<script src="/js/home.js"></script>
</body>

</html>