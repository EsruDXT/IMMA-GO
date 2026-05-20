<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($event['title']) ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden m-0">

<div class="flex h-screen w-full">

    <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

    <main class="flex-1 p-[25px] bg-[#F7F4ED] rounded-tl-[50px] h-full overflow-y-auto">

        <div class="bg-[#F5F4EF] rounded-[40px] p-10 md:p-[50px_60px] w-full max-w-[1400px] shadow-sm mx-auto">

            <!-- TITLE -->
            <h1 class="text-2xl md:text-[32px] font-extrabold uppercase mb-10">

                <?= htmlspecialchars($event['title']) ?>

            </h1>


            <!-- IMAGE + DESCRIPTION -->
            <div class="flex flex-col lg:flex-row gap-10 mb-14">

                <!-- IMAGE -->
                <div class="flex-1">

                    <div class="w-full lg:w-[700px] h-[400px] rounded-[25px] overflow-hidden">

                        <img
                            src="/uploads/<?= htmlspecialchars($event['image']) ?>"
                            class="h-full w-full object-cover">

                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div class="flex-1 pt-2 lg:ml-[50px]">

                    <h2 class="text-[#1e1e1e] text-[32px] font-bold mb-4">

                        <?= htmlspecialchars($event['title']) ?>

                    </h2>

                    <p class="text-[#333] text-[19px] leading-relaxed text-justify">

                        <?= nl2br(htmlspecialchars($event['description'])) ?>

                    </p>

                </div>

            </div>


            <!-- INFORMATION -->
            <div class="flex flex-col lg:flex-row gap-10 items-start">

                <div class="flex-[1.5] lg:border-r-2 border-[#D1D1D1] lg:pr-6 w-full lg:mr-[80px]">

                    <h2 class="text-2xl font-bold mb-6">
                        Informasi Acara
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">

                        <!-- DATE -->
                        <div>

                            <span class="font-bold text-xl">
                                Date
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-regular fa-calendar"></i>

                                </div>

                                <span>

                                    <?= date(
                                        "l, d F Y",
                                        strtotime($event['event_date'])
                                    ) ?>

                                </span>

                            </div>

                        </div>


                        <!-- PARTICIPANTS -->
                        <div>

                            <span class="font-bold text-xl">
                                Participants
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-solid fa-user-group"></i>

                                </div>

                                <span>

                                    <?= htmlspecialchars($event['participants']) ?>

                                </span>

                            </div>

                        </div>


                        <!-- ORGANIZER -->
                        <div>

                            <span class="font-bold text-xl">
                                Organizer
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-solid fa-user"></i>

                                </div>

                                <span>

                                    <?= htmlspecialchars($event['organizer']) ?>

                                </span>

                            </div>

                        </div>


                        <!-- CATEGORY -->
                        <div>

                            <span class="font-bold text-xl">
                                Category
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-solid fa-layer-group"></i>

                                </div>

                                <span>

                                    <?= ucfirst(htmlspecialchars($event['category'])) ?>

                                </span>

                            </div>

                        </div>


                        <!-- LOCATION -->
                        <div>

                            <span class="font-bold text-xl">
                                Location
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-solid fa-location-dot"></i>

                                </div>

                                <span>

                                    <?= htmlspecialchars($event['location']) ?>

                                </span>

                            </div>

                        </div>


                        <!-- REQUIREMENT -->
                        <div>

                            <span class="font-bold text-xl">
                                Requirement
                            </span>

                            <div class="flex items-center gap-4 mt-2">

                                <div class="bg-[#2D5DA1] text-white w-12 h-12 rounded-full flex justify-center items-center">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                </div>

                                <span>

                                    <?= ucfirst(htmlspecialchars($event['requirement'])) ?>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- REGISTER -->
                <div class="flex-1 w-full">
                        <h2 class="text-2xl font-bold text-[#111] mb-6">Pendaftaran</h2>

                        <div class="mb-5">
                            <label class="block text-[15px] font-semibold mb-3" for="competition-select">Daftar Kompetisi</label>
                            
                            <div class="relative w-full group">
                                <select id="competition-select" class="w-[300px] bg-[#6488C4] text-white px-5 py-3.5 rounded-xl text-sm font-semibold tracking-wide appearance-none outline-none cursor-pointer shadow-sm hover:bg-[#5274A8] hover:shadow-md focus:ring-4 focus:ring-[#6488C4]/40 transition-all duration-300 pr-12">
                                    <option value="" class="bg-white text-gray-400 font-normal">Select Competitions</option>
                                    <option value="Tarik Tambang" class="bg-white text-gray-800 font-medium py-2">Tarik Tambang</option>
                                    <option value="Balap Karung" class="bg-white text-gray-800 font-medium py-2">Balap Karung</option>
                                    <option value="Makan Kerupuk" class="bg-white text-gray-800 font-medium py-2">Makan Kerupuk</option>
                                    <option value="Bola Air" class="bg-white text-gray-800 font-medium py-2">Bola Air</option>
                                </select>
                                
                                <div class="absolute right-[180px] top-1/2 -translate-y-1/2 text-white pointer-events-none transition-transform duration-300 group-hover:translate-y-0.5">
                                    <i class="fa-solid fa-chevron-down text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <button id="btn-register" class="w-full bg-[#6488C4] text-white py-4 rounded-xl font-semibold text-base mt-20 hover:bg-[#5274A8] hover:-translate-y-1 hover:shadow-lg focus:ring-4 focus:ring-[#6488C4]/40 transition-all duration-300">
                            Register
                        </button>
                        
                        <p class="text-center text-xs font-medium text-[#111] mt-4 leading-relaxed">
                            Why Watch The Moment When You Could Be The<br>Moment? Register Now!
                        </p>
                    </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>


