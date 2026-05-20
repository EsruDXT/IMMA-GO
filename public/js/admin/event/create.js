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
const selectedDateInput =
    document.getElementById("selectedDate");

// ambil tanggal yang sudah ada (untuk edit)
const savedDate = selectedDateInput.value;

let currentDate = new Date();

// kalau edit event → langsung buka bulan event
if (savedDate) {
    currentDate = new Date(savedDate);
}

function renderCalendar(date) {

    calendar.innerHTML = "";

    const year = date.getFullYear();
    const month = date.getMonth();

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

    // spasi kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {

        const empty =
            document.createElement("div");

        calendar.appendChild(empty);

    }

    for (let day = 1; day <= lastDate; day++) {

        const dayBtn =
            document.createElement("button");

        dayBtn.type = "button";
        dayBtn.textContent = day;

        const fullDate =
            `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;

        dayBtn.className =
        "w-[35px] h-[35px] rounded-full hover:bg-[#6489BF] hover:text-white transition mx-auto";


        // tandai tanggal aktif
        if (
            selectedDateInput.value === fullDate
        ) {

            dayBtn.classList.add(
                "bg-[#3A6CB5]",
                "text-white"
            );

        }


        dayBtn.addEventListener("click",()=>{

            selectedDateInput.value =
                fullDate;

            renderCalendar(currentDate);

        });

        calendar.appendChild(dayBtn);
    }
}

renderCalendar(currentDate);


document
.getElementById("prev")
.addEventListener("click",()=>{

    currentDate.setMonth(
        currentDate.getMonth()-1
    );

    renderCalendar(currentDate);

});


document
.getElementById("next")
.addEventListener("click",()=>{

    currentDate.setMonth(
        currentDate.getMonth()+1
    );

    renderCalendar(currentDate);

});