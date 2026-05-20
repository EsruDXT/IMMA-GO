// IMAGE PREVIEW
        function previewFile(event) {
            const input = event.target;
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }

        // CALENDAR
        const calendar = document.getElementById("calendar");
        const monthYear = document.getElementById("monthYear");

        let currentDate = new Date();

        function renderCalendar(date) {

            calendar.innerHTML = "";

            const year = date.getFullYear();
            const month = date.getMonth();

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            const monthNames = [
                "January", "February", "March", "April",
                "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];

            monthYear.textContent = `${monthNames[month]} ${year}`;

            for (let i = 0; i < firstDay; i++) {
                const empty = document.createElement("div");
                calendar.appendChild(empty);
            }

            for (let day = 1; day <= lastDate; day++) {

                const dayBtn = document.createElement("button");

                dayBtn.type = "button";
                dayBtn.textContent = day;

                dayBtn.className =
                    "w-[35px] h-[35px] rounded-full hover:bg-[#6489BF] hover:text-white transition mx-auto";

                dayBtn.addEventListener("click", () => {

                    document.querySelectorAll("#calendar button")
                        .forEach(btn => {
                            btn.classList.remove("bg-[#3A6CB5]", "text-white");
                        });

                    dayBtn.classList.add("bg-[#3A6CB5]", "text-white");

                    const selected =
                        `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                    document.getElementById("selectedDate").value = selected;
                });

                calendar.appendChild(dayBtn);
            }
        }

        renderCalendar(currentDate);

        document.getElementById("prev").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        document.getElementById("next").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });