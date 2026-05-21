<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event-Admin-Dashboard</title>

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
        <main class="flex-1 overflow-y-auto px-[30px] pb-[30px]">
            <div class="flex gap-[30px]">

                <div class="flex-1">
                    <!-- FILTERS -->
                    <div class="flex gap-[15px] mb-[25px] items-center relative">
                        <span class="font-bold text-gray-800 mr-[10px]">Filter by :</span>

                        <div class="relative">
                            <button onclick="toggleDropdown('cat')" class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Categories <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="cat" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('competition')">Competition</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('event')">Event</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('workshop')">Workshop</div>
                            </div>
                        </div>

                        <div class="relative">
                            <button onclick="toggleDropdown('class')" class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Class <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="class" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('10')">Class 10</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('11')">Class 11</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('12')">Class 12</div>
                            </div>
                        </div>

                        <div class="relative">
                            <button onclick="toggleDropdown('req')" class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Requirement <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="req" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('free')">Free</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('paid')">Paid</div>
                            </div>
                        </div>

                        <div class="absolute right-0">
                            <button onclick="window.location.href='/admin/events/create'" class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[20px] py-[8px] rounded-lg flex items-center gap-[10px] text-[14px]">
                                <i class="fa fa-plus"></i> Add Event
                            </button>
                        </div>
                    </div>
                    <!-- EVENT CARDS -->
                    <div class="flex flex-col gap-[20px]">


                        <?php $events = $events ?? [];
                        foreach ($events as $event): ?>

                            <div
                                class="event-card group relative bg-[#3A6CB5] rounded-[20px] overflow-hidden flex text-white h-[240px] shadow-sm transition-all duration-300 hover:scale-[1.01]"
                                data-date="<?= $event['event_date'] ?>"
                                data-category="<?= $event['category'] ?>"
                                data-class="<?= $event['class_target'] ?>"
                                data-req="<?= $event['requirement'] ?>">

                                <!-- IMAGE -->
                                <div class="w-[30%] relative">

                                    <img
                                        src="/uploads/<?= $event['image'] ?>"
                                        alt="<?= $event['title'] ?>"
                                        class="h-full w-full object-cover">

                                    <div class="absolute bottom-[15px] w-full flex justify-center">

                                        <button
                                            onclick="window.location.href='/event/<?= $event['id'] ?>'"
                                            class="bg-[#6489BF] hover:bg-[#4E73A5] px-[20px] py-[6px] rounded-[10px] text-[14px] font-bold shadow-md transition">

                                            Learn More

                                        </button>

                                    </div>
                                </div>

                                <!-- CONTENT -->
                                <div class="w-[70%] p-[25px] flex flex-col justify-center">

                                    <h2 class="text-[20px] font-bold mb-[8px]">
                                        <?= $event['title'] ?>
                                    </h2>

                                    <p class="text-[13px] text-gray-200 mb-[20px] leading-relaxed line-clamp-3">
                                        <?= $event['description'] ?>
                                    </p>

                                    <div class="grid grid-cols-2 gap-y-[15px] gap-x-[10px] text-[13px]">

                                        <!-- DATE -->
                                        <div class="flex items-center gap-[12px]">

                                            <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center flex-shrink-0">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>

                                            <span>
                                                <?= date('l, d F Y', strtotime($event['event_date'])) ?>
                                            </span>

                                        </div>

                                        <!-- ORGANIZER -->
                                        <div class="flex items-center gap-[12px]">

                                            <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center flex-shrink-0">
                                                <i class="fa fa-user"></i>
                                            </div>

                                            <span>
                                                <?= $event['organizer'] ?>
                                            </span>

                                        </div>

                                        <!-- LOCATION -->
                                        <div class="flex items-center gap-[12px]">

                                            <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center flex-shrink-0">
                                                <i class="fa fa-map-marker-alt"></i>
                                            </div>

                                            <span>
                                                <?= $event['location'] ?>
                                            </span>

                                        </div>

                                        <!-- CLASS -->
                                        <div class="flex items-center gap-[12px]">

                                            <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center flex-shrink-0">
                                                <i class="fa fa-th-large"></i>
                                            </div>

                                            <span>
                                                <?= strtoupper($event['class_target']) ?>
                                            </span>

                                        </div>

                                    </div>
                                </div>

                                <!-- ACTION BUTTON -->
                                <div
                                    class="absolute top-0 right-[-50px] group-hover:right-0 h-full w-[50px] bg-[#6D8FC4] flex flex-col items-center justify-center gap-[25px] transition-all duration-300 ease-in-out rounded-l-[20px] shadow-lg">

                                    <!-- EDIT -->
                                    <button
                                        onclick="window.location.href='/admin/events/edit/<?= $event['id'] ?>'"
                                        class="text-white text-[22px] hover:scale-125 transition duration-200">

                                        <i class="fa fa-pen"></i>

                                    </button>

                                    <!-- DELETE -->
                                    <button
                                        onclick="openDeleteModal(<?= $event['id'] ?>)"
                                        class="text-white text-[22px] hover:scale-125 transition duration-200">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>

                </div>

                <!-- CALENDAR -->
                <div class="w-[320px] flex-shrink-0">

                    <div class="bg-white rounded-[25px] overflow-hidden shadow-sm mb-[30px]">
                        <div class="bg-[#3A6CB5] p-[20px] text-white flex justify-between items-center rounded-t-[25px]">
                            <div class="flex items-center gap-[10px]">
                                <i class="fa fa-calendar-alt text-[20px]"></i>
                                <h2 id="monthYear" class="font-bold text-[18px]"></h2>
                            </div>
                            <div class="flex gap-[15px]">
                                <button id="prev" class="px-2 py-1 rounded hover:bg-[#4E73A5] transition">‹</button>
                                <button id="next" class="px-2 py-1 rounded hover:bg-[#4E73A5] transition">›</button>
                            </div>
                        </div>

                        <div class="p-5 text-sm w-[300px]">
                            <div class="grid grid-cols-7 text-center text-gray-400 text-xs mb-2">
                                <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span>
                                <span>Thu</span><span>Fri</span><span>Sat</span>
                            </div>
                            <div id="calendar" class="grid grid-cols-7 text-center gap-y-2 text-gray-800"></div>
                        </div>
                    </div>

                    <!-- NATIONAL DAY -->
                    <h3 class="text-[24px] font-bold mb-[15px] text-black">Hari Nasional</h3>
                    <div class="flex flex-col gap-[15px]">

                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm hover:bg-[#4E73A5] transition cursor-default">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px] flex-shrink-0">
                                <div class="w-full h-full overflow-hidden rounded-md">
                                    <img src="/assets/images/80TH.jpeg" alt="HUT RI" class=" mb-[15px] w-[55px] h-[55px] object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">HUT RI</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Monday, August 17, 2026
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm hover:bg-[#4E73A5] transition cursor-default">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px] flex-shrink-0">
                                <div class="w-full h-full overflow-hidden rounded-md flex items-center justify-center">
                                    <img src="/assets/images/Batik.jpeg" alt="Batik Day" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">Batik Day</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Friday, October 2, 2026
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm hover:bg-[#4E73A5] transition cursor-default">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px] flex-shrink-0">
                                <div class="w-full h-full overflow-hidden rounded-md">
                                    <img src="/assets/images/TNI.jpeg" alt="Day TNI" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">Hari TNI</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Monday, October 5, 2026
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm hover:bg-[#4E73A5] transition cursor-default">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px] flex-shrink-0">
                                <div class="w-full h-full overflow-hidden rounded-md">
                                    <img src="/assets/images/SumpahPemuda.jpeg" alt="Day Sumpah Pemuda" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">Hari Sumpah Pemuda</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Wednesday, October 28, 2026
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>

    
    <!-- DELETE POPUP -->
    <div id="deleteModal"
        class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div class="bg-[#3A66A8] w-[500px] rounded-[20px] px-[35px] py-[25px] relative text-white">

            <!-- Close -->
            <button
                onclick="closeDeleteModal()"
                class="absolute top-[20px] right-[20px] text-[35px] leading-none">
                &times;
            </button>

            <!-- Title -->
            <div class="flex justify-center items-center gap-[10px]">

                <h2 class="text-[28px] font-bold">
                    Peringatan
                </h2>

                <i class="fa-solid fa-triangle-exclamation text-red-500 text-[30px]"></i>

            </div>

            <hr class="my-[15px] border-white">

            <!-- Text -->
            <div class="text-center">

                <h3 class="text-[18px] font-bold mb-[10px]">
                    Are you sure you want to delete this event?
                </h3>

                <p class="text-[14px] text-gray-200">
                    Just making sure—this can't be undone.
                </p>

            </div>

            <!-- Buttons -->
            <div class="flex justify-center gap-[20px] mt-[30px]">

                <a id="deleteLink"
                    href="#"
                    class="border-2 border-white px-[30px] py-[10px] rounded-[10px] text-[22px] font-semibold hover:bg-white hover:text-[#3A66A8] transition">

                    Continue

                </a>

                <button
                    onclick="closeDeleteModal()"
                    class="bg-[#6C8DC1] px-[30px] py-[10px] rounded-[10px] text-[22px] font-semibold hover:bg-[#86A1CC] transition">

                    Cancel

                </button>

            </div>

        </div>

    </div>
    <script src="/js/admin/event/index.js"></script>
</body>

</html>