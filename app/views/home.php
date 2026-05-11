<?php
session_start();
?>
<!-- Cek User Session Bisa atau ndak -->
<pre>
<?php print_r($_SESSION['user']); ?>
</pre>
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
                                <img src="/assets/images/Slider 2.png" alt="Slide 2" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full h-full flex-shrink-0">
                                <img src="/assets/images/Slider 2.png" alt="Slide 2" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full h-full flex-shrink-0">
                                <img src="/assets/images/Slider 2.png" alt="Slide 2" class="w-full h-full object-cover">
                            </div>

                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-[#2D5DA1] text-white p-[30px] rounded-[35px]">
                        <h2 class="text-[20px] font-bold">Recent Events</h2>
                        <p class="text-[18px]">IBADAH NATAL 2025</p>
                        <!-- Titik -->
                        <div class="absolute right-[15px] top-1/2 -translate-y-1/2 flex flex-col gap-[8px]">
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                            <span class="dot w-[8px] h-[8px] bg-white/50 rounded-full"></span>
                        </div>

                    </div>

                </div>


                <h3 class="my-[20px]">UPCOMING EVENTS</h3>

                <div class="flex gap-[15px] items-center">

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">

                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]"></div>

                        <p class="text-[22px] font-bold">Imma Fest</p>
                        <span class="text-[14px] text-gray-300">10 Februari 2026</span>

                    </div>

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">

                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]"></div>

                        <p class="text-[22px] font-bold">Imma Fest</p>
                        <span class="text-[14px] text-gray-300">10 Februari 2026</span>

                    </div>

                    <div class="w-[180px] h-[260px] bg-[#2D5DA1] text-white rounded-t-[10px] rounded-b-[20px] text-center">

                        <div class="h-[170px] bg-[#cfd6ea] rounded-t-[9px] mb-[12px]"></div>

                        <p class="text-[22px] font-bold">Imma Fest</p>
                        <span class="text-[14px] text-gray-300">10 Februari 2026</span>

                    </div>

                    <div class="flex text-[22px] text-white border-2 rounded-full bg-[#6489BF] p-[10px] justify-center">
                        <i class="fa fa-arrow-right"></i>
                    </div>

                </div>


                <h3 class="my-[20px]">EVENT GALLERY</h3>

                <div class="h-[220px] bg-[#cfd6ea] rounded-[10px] flex items-center justify-center">

                    <div class="text-center text-white p-[20px]">

                        <h2 class="text-[22px] font-bold">UNLOCK OUR GALLERY</h2>

                        <div class="text-[25px] my-[10px]">
                            <i class="fa fa-lock"></i>
                        </div>

                        <button class="mt-[10px] px-[15px] py-[8px] bg-white rounded-[6px] font-bold text-blue-500">
                            Unlock Now
                        </button>

                    </div>

                </div>

            </div>


            <!-- RIGHT -->
            <div>

                <h3 class="mb-[16px] text-[22px] font-bold flex justify-center">PRESTASI TERBARU</h3>

                <div class="flex gap-[10px] p-[10px] rounded-[10px] mb-[10px]">
                    <div class="w-[210px] h-[145px] bg-[#cfd6ea] rounded-[8px] shrink-0">
                        <img src="/assets/images/prestasi 1.png" alt="Prestasi 1" class="w-full h-full object-cover rounded-[8px]">
                    </div>
                    <div>
                        <p class="mt-[5px] ml-[10px] text-[22px] font-bold text-[#2D5DA1]">Prestasi Membanggakan : Juara 3 Lomba Band Symphoria</p>
                        <span class="text-gray-500 font-bold text-[18px]"><i class="fa fa-calendar text-[#2D5DA1] mt-[5px] ml-[10px] mr-[5px]"></i>1 March 2026</span>
                    </div>
                </div>

                <div class="flex gap-[10px] p-[10px] rounded-[10px] mb-[10px]">
                    <div class="w-[210px] h-[145px] bg-[#cfd6ea] rounded-[8px] shrink-0">
                        <img src="/assets/images/prestasi 2.png" alt="Prestasi 2" class="w-full h-full object-cover rounded-[8px]">
                    </div>
                    <div>
                        <p class="mt-[5px] ml-[10px] text-[22px] font-bold text-[#2D5DA1]">Best Coordinator Supporter Honda DBL</p>
                        <span class="text-gray-500 font-bold text-[18px]"><i class="fa fa-calendar text-[#2D5DA1] mt-[5px] ml-[10px] mr-[5px]"></i>5 Mar 2026</span>
                    </div>
                </div>

                <div class="flex gap-[10px] p-[10px] rounded-[10px] mb-[10px]">
                    <div class="w-[210px] h-[145px] bg-[#cfd6ea] rounded-[8px] shrink-0">
                        <img src="/assets/images/prestasi 3.png" alt="Prestasi 3" class="w-full h-full object-cover rounded-[8px]">
                    </div>
                    <div>
                        <p class="mt-[5px] ml-[10px] text-[22px] font-bold text-[#2D5DA1]">Juara Harapan 1 Lomba Wushu</p>
                        <span class="text-gray-500 font-bold text-[18px]"><i class="fa fa-calendar text-[#2D5DA1] mt-[5px] ml-[10px] mr-[5px]"></i>5 Mar 2026</span>
                    </div>
                </div>

                <div class="flex gap-[10px] p-[10px] rounded-[10px] mb-[10px]">
                    <div class="w-[210px] h-[145px] bg-[#cfd6ea] rounded-[8px] shrink-0">
                        <img src="/assets/images/prestasi 4.png" alt="Prestasi 4" class="w-full h-full object-cover rounded-[8px]">
                    </div>
                    <div>
                        <p class="mt-[5px] ml-[10px] text-[22px] font-bold text-[#2D5DA1]">Juara 3 Duta Pelajar Remaja Kalimantan Barat</p>
                        <span class="text-gray-500 font-bold text-[18px]"><i class="fa fa-calendar text-[#2D5DA1] mt-[5px] ml-[10px] mr-[5px]"></i>20 Jan 2026</span>
                    </div>
                </div>

            </div>

        </div>

        <?php require_once '../app/views/layouts/partials/footer.php'; ?>

    </div>

    </div>
<script src="/js/home.js"></script>
</body>

</html>