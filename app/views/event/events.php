<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-[#2D5DA1] font-[Arial]">

    <div class="flex">

        <!-- SIDEBAR -->
        <div class="w-[140px] text-white p-[25px]">

            <img src="/assets/images/SKI.png" class="w-[67px] h-[76px] mx-auto mb-[40px]"></img>

            <ul class="text-center">

                <li class="flex flex-col items-center my-[60px] cursor-pointer">
                    <i class="fa fa-home text-[36px] mb-[6px]"></i>
                    Home
                </li>

                <li class="flex flex-col items-center my-[60px] cursor-pointer ">
                    <i class="fa fa-calendar text-[36px] mb-[6px]"></i>
                    Events
                </li>

                <li class="flex flex-col items-center my-[60px] cursor-pointer">
                    <i class="fa fa-medal text-[36px] mb-[6px]"></i>
                    Honors
                </li>

                <li class="flex flex-col items-center my-[60px] cursor-pointer">
                    <i class="fa fa-th-large text-[36px] mb-[6px]"></i>
                    Overview
                </li>

                <li class="flex flex-col items-center my-[60px] cursor-pointer">
                    <i class="fa fa-user text-[36px] mb-[6px]"></i>
                    Profile
                </li>

            </ul>

        </div>


        <!-- MAIN -->
        <div class="flex-1 p-[25px] bg-[#F7F4ED] rounded-tl-[50px]">

            <!-- HEADER -->
            <div class="flex items-center mb-[25px] mx-[30px]">

                <div class="bg-[#6489BF] w-[50px] h-[50px] flex items-center justify-center rounded-[10px]">
                    <i class="fa fa-bell text-white text-[22px]"></i>
                </div>

                <div class="bg-[#6489BF] px-[15px] py-[10px] rounded-[10px] w-[550px] h-[50px] flex items-center mx-[30px]">
                    <i class="fa fa-search text-white text-[22px]"></i>
                    <input class="ml-[10px] bg-transparent outline-none border-none placeholder-white text-white" placeholder="Search...">
                </div>

                <div class="flex items-center gap-[10px] ml-auto">

                    <!-- Profile -->
                    <div class="mr-[10px]">
                        <b class="text-[20px]">Forensya Hani</b><br>
                        <span class="text-[#2D5DA1] font-bold">Student</span>
                    </div>
                    <img src="/assets/images/profile.png" alt="Profile" class="w-[75px] h-[75px] rounded-full  bg-gray-300">
                </div>

            </div>


            <div class="flex gap-[30px] mx-[30px]">

                <div class="flex-1">
                    <!-- Filter -->
                    <div class="flex gap-[15px] mb-[25px] items-center relative">
                        <span class="font-bold text-gray-800 mr-[10px]">Filter by :</span>

                        <!-- Categories -->
                        <div class="relative">
                            <button onclick="toggleDropdown('cat')" class="bg-[#6489BF] text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Categories <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="cat" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('competition')">Competition</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('event')">Event</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterCategory('workshop')">Workshop</div>
                            </div>
                        </div>

                        <!-- Class -->
                        <div class="relative">
                            <button onclick="toggleDropdown('class')" class="bg-[#6489BF] text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Class <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="class" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('10')">Class 10</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('11')">Class 11</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterClass('12')">Class 12</div>
                            </div>
                        </div>

                        <!-- Requirement -->
                        <div class="relative">
                            <button onclick="toggleDropdown('req')" class="bg-[#6489BF] text-white px-[20px] py-[8px] rounded-full flex items-center gap-[10px] text-[14px]">
                                Requirement <i class="fa fa-chevron-down text-[12px]"></i>
                            </button>
                            <div id="req" class="hidden absolute mt-2 bg-white shadow-lg rounded-lg text-black w-[150px] overflow-hidden z-50">
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('all')">All</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('free')">Free</div>
                                <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="filterReq('paid')">Paid</div>
                            </div>
                        </div>
                    </div>


                    <!-- CARD 1 -->

                    <div class="flex flex-col gap-[20px]">

                        <div class="event-card bg-[#3A6CB5] rounded-[20px] overflow-hidden flex text-white h-[240px] shadow-sm"
                            data-date="2026-08-14"
                            data-category="event"
                            data-class="all"
                            data-req="free">
                            <div class="w-[30%] relative">
                                <img src="/assets/images/independence_day.jpeg" alt="Independence Day" class="h-full w-full object-cover">
                                <div class="absolute bottom-[15px] w-full flex justify-center">
                                    <button class="bg-[#6489BF] hover:bg-[#4E73A5] px-[20px] py-[6px] rounded-[10px] text-[14px] font-bold shadow-md transition">Learn More</button>
                                </div>
                            </div>
                            <div class="w-[70%] p-[25px] flex flex-col justify-center">
                                <h2 class="text-[20px] font-bold mb-[8px]">80th Indonesian Independence Day</h2>
                                <p class="text-[13px] text-gray-200 mb-[20px] leading-relaxed">Celebrate the spirit of independence through exciting games, creative performances, and fun activities that bring everyone together.</p>
                                <div class="grid grid-cols-2 gap-y-[15px] gap-x-[10px] text-[13px]">
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-calendar-alt"></i></div>
                                        <span>Friday August 14, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-user"></i></div>
                                        <span>Vincent Genesius</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-map-marker-alt"></i></div>
                                        <span>Lapangan SMKK Immanuel</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-th-large"></i></div>
                                        <span>All Class</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 2 -->

                        <div class="event-card bg-[#3A6CB5] rounded-[20px] overflow-hidden flex text-white h-[240px] shadow-sm"
                            data-date="2026-08-11"
                            data-category="competition"
                            data-class="all"
                            data-req="free">
                            <div class="w-[30%] relative">
                                <img src="/assets/images/statistic_competition.jpeg" alt="Statistic Competition" class="h-full w-full object-cover">
                                <div class="absolute bottom-[15px] w-full flex justify-center">
                                    <button class="bg-[#6489BF] hover:bg-[#4E73A5] px-[20px] py-[6px] rounded-[10px] text-[14px] font-bold shadow-md transition">Learn More</button>
                                </div>
                            </div>
                            <div class="w-[70%] p-[25px] flex flex-col justify-center">
                                <h2 class="text-[20px] font-bold mb-[8px]">Statistic Competition 2026</h2>
                                <p class="text-[13px] text-gray-200 mb-[20px] leading-relaxed">Challenge your analytical and problem-solving skills in this engaging statistics competition. Compete with others and showcase your abilities.</p>
                                <div class="grid grid-cols-2 gap-y-[15px] gap-x-[10px] text-[13px]">
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-calendar-alt"></i></div>
                                        <span>Tuesday, August 11, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-user"></i></div>
                                        <span>Sondang S.</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-map-marker-alt"></i></div>
                                        <span>Universitas Tanjungpura Pontianak</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-th-large"></i></div>
                                        <span>All Class</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 3 -->

                        <div class="event-card bg-[#3A6CB5] rounded-[20px] overflow-hidden flex text-white h-[240px] shadow-sm"
                            data-date="2026-08-10"
                            data-category="workshop"
                            data-class="all"
                            data-req="free">
                            <div class="w-[30%] relative">
                                <img src="/assets/images/CordonWorkshop.jpeg" alt="Info Session" class="h-full w-full object-cover">
                                <div class="absolute bottom-[15px] w-full flex justify-center">
                                    <button class="bg-[#6489BF] hover:bg-[#4E73A5] px-[20px] py-[6px] rounded-[10px] text-[14px] font-bold shadow-md transition">Learn More</button>
                                </div>
                            </div>
                            <div class="w-[70%] p-[25px] flex flex-col justify-center">
                                <h2 class="text-[20px] font-bold mb-[8px]">Info Session & Mini Workshop</h2>
                                <p class="text-[13px] text-gray-200 mb-[20px] leading-relaxed">Join this informative session and hands-on mini workshop to explore the world of professional culinary arts.</p>
                                <div class="grid grid-cols-2 gap-y-[15px] gap-x-[10px] text-[13px]">
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-calendar-alt"></i></div>
                                        <span>Monday, August 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-user"></i></div>
                                        <span>Rieky Martin</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-map-marker-alt"></i></div>
                                        <span>Aula Tiranus II</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-th-large"></i></div>
                                        <span>All Class</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 4 -->

                        <div class="event-card bg-[#3A6CB5] rounded-[20px] overflow-hidden flex text-white h-[240px] shadow-sm"
                            data-date="2026-09-01"
                            data-category="competition"
                            data-class="all"
                            data-req="paid">
                            <div class="w-[30%] relative">
                                <img src="/assets/images/MathComp.jpeg" alt="Info Session" class="h-full w-full object-cover">
                                <div class="absolute bottom-[15px] w-full flex justify-center">
                                    <button class="bg-[#6489BF] hover:bg-[#4E73A5] px-[20px] py-[6px] rounded-[10px] text-[14px] font-bold shadow-md transition">Learn More</button>
                                </div>
                            </div>
                            <div class="w-[70%] p-[25px] flex flex-col justify-center">
                                <h2 class="text-[20px] font-bold mb-[8px]">KOMET (Math Competition)</h2>
                                <p class="text-[13px] text-gray-200 mb-[20px] leading-relaxed">Love math? Then KOMET 2026 is your stage. Compete, challenge yourself, and show everyone what you’ve got!</p>
                                <div class="grid grid-cols-2 gap-y-[15px] gap-x-[10px] text-[13px]">
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-calendar-alt"></i></div>
                                        <span>Monday, September 1, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-user"></i></div>
                                        <span>Iis Krisdiyanti</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-map-marker-alt"></i></div>
                                        <span>Universitas Tanjungpura Pontianak</span>
                                    </div>
                                    <div class="flex items-center gap-[12px]">
                                        <div class="bg-[#6489BF] rounded-full w-[35px] h-[35px] flex items-center justify-center"><i class="fa fa-th-large"></i></div>
                                        <span>All Class</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
<!-- Calendar -->
                <div class="w-[320px]">

                    <div class="bg-white rounded-[25px] overflow-hidden shadow-sm mb-[30px]">
                        <div class="bg-[#3A6CB5] p-[20px] text-white flex justify-between items-center rounded-t-[25px]">
                            <div class="flex items-center gap-[10px]">
                                <i class="fa fa-calendar-alt text-[20px]"></i>
                                <h2 id="monthYear" class="font-bold text-[18px]"></h2>
                            </div>
                            <div class="flex gap-[15px]">
                                <button id="prev" class="px-2 py-1 rounded hover:bg-gray-200">‹</button>
                                <button id="next" class="px-2 py-1 rounded hover:bg-gray-200">›</button>
                            </div>
                        </div>

                        <div class="p-5 text-sm w-[300px]">

                            <!-- Day -->
                            <div class="grid grid-cols-7 text-center text-gray-400 text-xs mb-2">
                                <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span>
                                <span>Thu</span><span>Fri</span><span>Sat</span>
                            </div>

                            <!-- Date -->
                            <div id="calendar" class="grid grid-cols-7 text-center gap-y-2"></div>

                        </div>
                    </div>

                    <!-- National Days -->

                    <!-- Day 1 -->
                    <h3 class="text-[24px] font-bold mb-[15px] text-black">Hari Nasional</h3>
                    <div class="flex flex-col gap-[15px]">

                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px]">
                                <div class="w-[75px] h-[45px] overflow-hidden rounded-md">
                                    <img src="/assets/images/80TH.jpeg"
                                        alt="HUT RI"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">HUT RI</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Monday, August 17, 2026
                                </div>
                            </div>
                        </div>
                        <!-- Day 2 -->
                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px]">
                                <div class="w-[40px] h-[40px] overflow-hidden rounded-md">
                                    <img src="/assets/images/Batik.jpeg"
                                        alt="Batik Day"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">Batik Day</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Friday, October 2, 2026
                                </div>
                            </div>
                        </div>
                        <!-- Day 3 -->
                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px]">
                                <div class="w-[75px] h-[45px] overflow-hidden rounded-md">
                                    <img src="/assets/images/TNI.jpeg"
                                        alt="Day TNI"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                            <div>
                                <div class="text-[16px] font-bold mb-[2px]">Hari TNI</div>
                                <div class="text-[12px] text-gray-200 flex items-center gap-[5px]">
                                    <i class="fa fa-calendar"></i> Monday, October 5, 2026
                                </div>
                            </div>
                        </div>
                        <!-- Day 4 -->
                        <div class="bg-[#3A6CB5] p-[15px] rounded-[15px] flex items-center gap-[15px] text-white shadow-sm">
                            <div class="w-[45px] h-[45px] bg-white rounded-[10px] overflow-hidden flex items-center justify-center p-[2px]">
                                <div class="w-[75px] h-[45px] overflow-hidden rounded-md">
                                    <img src="/assets/images/SumpahPemuda.jpeg"
                                        alt="Day Sumpah Pemuda"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
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

                <script src="/js/events/events.js"></script>