<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Honor</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#2D5DA1] font-[Arial] overflow-hidden">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <?php require_once '../app/views/layouts/partials/sidebar.php'; ?>

        <!-- MAIN -->
        <div class="flex-1 bg-[#F3F1EC] rounded-l-[50px] px-[50px] py-[35px] overflow-y-auto">

            <!-- BACK -->
            <div class="flex items-center gap-[20px] mb-[40px]">

                <button onclick="history.back()"
                    type="button"
                    class="w-[45px] h-[45px] rounded-[10px] bg-[#6489BF] text-white text-[20px] hover:bg-[#4E73A5] transition">

                    <i class="fa fa-chevron-left"></i>
                </button>

                <h1 class="text-[32px] font-bold text-black">
                    Back
                </h1>

            </div>

            <!-- FORM -->
            <form action="/admin/honors/store"
                method="POST"
                enctype="multipart/form-data">

                <div class="flex gap-[40px]">

                    <!-- LEFT -->
                    <div class="w-[42%]">

                        <h2 class="text-[28px] font-bold text-center mb-[20px]">
                            Honor Photo
                        </h2>

                        <!-- IMAGE PREVIEW -->
                        <div
                            class="relative bg-[#E5E5E5] rounded-[25px] h-[500px] overflow-hidden shadow-md flex items-center justify-center">

                            <img id="previewImage"
                                src="https://placehold.co/600x800/E5E5E5/AAAAAA?text=Upload+Image"
                                alt="Preview"
                                class="w-full h-full object-cover">

                            <!-- UPLOAD -->
                            <label
                                class="absolute bottom-[40px] bg-[#6489BF] hover:bg-[#4E73A5] transition text-white px-[30px] py-[14px] rounded-[15px] cursor-pointer flex items-center gap-[15px] text-[20px] font-semibold shadow-lg">

                                Upload Photo

                                <i class="fa fa-camera"></i>

                                <input type="file"
                                    name="image"
                                    id="imageInput"
                                    accept="image/*"
                                    class="hidden"
                                    onchange="previewFile(event)">
                            </label>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="flex-1">

                        <!-- TITLE -->
                        <div class="mb-[25px]">

                            <label class="block text-[20px] font-bold mb-[10px]">
                                Title
                            </label>

                            <input type="text"
                                name="title"
                                placeholder="Honor title..."
                                required
                                class="w-full border border-black rounded-[12px] px-[20px] py-[16px] outline-none bg-transparent">
                        </div>

                        <!-- DATE -->
                        <div class="flex gap-[30px]">

                            <!-- CALENDAR -->
                            <div class="w-[320px]">

                                <label class="block text-[20px] font-bold mb-[15px]">
                                    Date
                                </label>

                                <!-- HIDDEN INPUT -->
                                <input type="hidden"
                                    name="honor_date"
                                    id="selectedDate">

                                <div class="bg-[#DCDDE4] rounded-[20px] overflow-hidden">

                                    <!-- HEADER -->
                                    <div
                                        class="bg-[#3A6CB5] px-[20px] py-[18px] flex items-center justify-between text-white">

                                        <div class="flex items-center gap-[12px]">

                                            <i class="fa fa-calendar text-[22px]"></i>

                                            <h2 id="monthYear"
                                                class="font-bold text-[18px]">
                                            </h2>

                                        </div>

                                        <div class="flex gap-[15px]">

                                            <button type="button"
                                                id="prev"
                                                class="hover:scale-125 transition">

                                                <i class="fa fa-chevron-left"></i>
                                            </button>

                                            <button type="button"
                                                id="next"
                                                class="hover:scale-125 transition">

                                                <i class="fa fa-chevron-right"></i>
                                            </button>

                                        </div>
                                    </div>

                                    <!-- DAYS -->
                                    <div class="p-[18px] bg-white">

                                        <div class="grid grid-cols-7 text-center text-gray-500 text-[14px] mb-[15px]">

                                            <span>Sun</span>
                                            <span>Mon</span>
                                            <span>Tue</span>
                                            <span>Wed</span>
                                            <span>Thu</span>
                                            <span>Fri</span>
                                            <span>Sat</span>

                                        </div>

                                        <div id="calendar"
                                            class="grid grid-cols-7 gap-y-[10px] text-center">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end mt-[40px]">

                            <button type="submit"
                                class="bg-[#6489BF] hover:bg-[#4E73A5] transition text-white font-bold text-[22px] px-[60px] py-[16px] rounded-[14px] shadow-md">

                                Add
                            </button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>

        // IMAGE PREVIEW
        function previewFile(event)
        {
            const input = event.target;

            if (!input.files || !input.files[0]) {
                return;
            }

            const file = input.files[0];

            const reader = new FileReader();

            reader.onload = function(e)
            {
                const preview =
                    document.getElementById('previewImage');

                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }


        // CALENDAR
        const calendar =
            document.getElementById("calendar");

        const monthYear =
            document.getElementById("monthYear");

        const selectedDateInput =
            document.getElementById("selectedDate");

        const savedDate =
            selectedDateInput.value;

        let currentDate = new Date();

        if (savedDate)
        {
            currentDate = new Date(savedDate);
        }

        function renderCalendar(date)
        {
            calendar.innerHTML = "";

            const year =
                date.getFullYear();

            const month =
                date.getMonth();

            const firstDay =
                new Date(year, month, 1).getDay();

            const lastDate =
                new Date(year, month + 1, 0).getDate();

            const monthNames = [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ];

            monthYear.textContent =
                `${monthNames[month]} ${year}`;

            // EMPTY
            for (let i = 0; i < firstDay; i++)
            {
                const empty =
                    document.createElement("div");

                calendar.appendChild(empty);
            }

            // DAYS
            for (let day = 1; day <= lastDate; day++)
            {
                const dayBtn =
                    document.createElement("button");

                dayBtn.type = "button";

                dayBtn.textContent = day;

                const fullDate =
                    `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                dayBtn.className =
                    "w-[35px] h-[35px] rounded-full hover:bg-[#6489BF] hover:text-white transition mx-auto";

                if (selectedDateInput.value === fullDate)
                {
                    dayBtn.classList.add(
                        "bg-[#3A6CB5]",
                        "text-white"
                    );
                }

                dayBtn.addEventListener("click", () =>
                {
                    selectedDateInput.value =
                        fullDate;

                    renderCalendar(currentDate);
                });

                calendar.appendChild(dayBtn);
            }
        }

        renderCalendar(currentDate);

        // PREV
        document
            .getElementById("prev")
            .addEventListener("click", () =>
            {
                currentDate.setMonth(
                    currentDate.getMonth() - 1
                );

                renderCalendar(currentDate);
            });

        // NEXT
        document
            .getElementById("next")
            .addEventListener("click", () =>
            {
                currentDate.setMonth(
                    currentDate.getMonth() + 1
                );

                renderCalendar(currentDate);
            });

    </script>

</body>

</html>