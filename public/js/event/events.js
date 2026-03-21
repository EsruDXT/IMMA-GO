document.addEventListener("DOMContentLoaded", () => {
  // ========================
  // DATA EVENT (AMBIL DARI CARD)
  // ========================
  const cards = document.querySelectorAll(".event-card");

  const eventDates = [];
  cards.forEach((card) => {
    if (card.dataset.date) {
      eventDates.push(card.dataset.date);
    }
  });

  // ========================
  // ELEMENT
  // ========================
  const calendar = document.getElementById("calendar");
  const monthYear = document.getElementById("monthYear");
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");
  const searchInput = document.querySelector("input");

  let currentDate = new Date();

  // ========================
  // RENDER CALENDAR
  // ========================
  function renderCalendar() {
    calendar.innerHTML = "";

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    const today = new Date();

    const monthNames = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    monthYear.textContent = `${monthNames[month]} ${year}`;

    // kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
      calendar.innerHTML += `<span></span>`;
    }

    for (let d = 1; d <= lastDate; d++) {
      const fullDate = `${year}-${String(month + 1).padStart(2, "0")}-${String(d).padStart(2, "0")}`;

      const isToday =
        d === today.getDate() &&
        month === today.getMonth() &&
        year === today.getFullYear();

      const hasEvent = eventDates.includes(fullDate);

      const btn = document.createElement("button");
      btn.textContent = d;

      btn.className =
        "relative py-2 rounded-lg hover:bg-blue-100 transition " +
        (isToday ? "bg-blue-500 text-white" : "");

      // dot event
      if (hasEvent) {
        const dot = document.createElement("span");
        dot.className =
          "absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-red-500 rounded-full";
        btn.appendChild(dot);
      }

      // klik tanggal
      btn.addEventListener("click", () => {
        alert(
          "📅 Event sudah difilter.\nGunakan tombol panah (‹ ›) untuk menampilkan semua event kembali.",
        );

        document
          .querySelectorAll("#calendar button")
          .forEach((b) => b.classList.remove("bg-blue-500", "text-white"));

        btn.classList.add("bg-blue-500", "text-white");

        filterEvents(fullDate);
      });

      calendar.appendChild(btn);
    }
  }

  // ========================
  // FILTER EVENT BY DATE
  // ========================
  function filterEvents(date) {
    cards.forEach((card) => {
      if (card.dataset.date === date) {
        card.style.display = "flex";
      } else {
        card.style.display = "none";
      }
    });
  }

  // ========================
  // RESET FILTER (SHOW ALL)
  // ========================
  function showAllEvents() {
    cards.forEach((card) => {
      card.style.display = "flex";
    });
  }

  // ========================
  // SEARCH
  // ========================
  if (searchInput) {
    searchInput.addEventListener("input", () => {
      const value = searchInput.value.toLowerCase();

      cards.forEach((card) => {
        const text = card.innerText.toLowerCase();
        card.style.display = text.includes(value) ? "flex" : "none";
      });
    });
  }

  // ========================
  // HOVER EFFECT
  // ========================
  cards.forEach((card) => {
    card.classList.add("transition", "duration-300");

    card.addEventListener("mouseenter", () => {
      card.classList.add("scale-[1.02]");
    });

    card.addEventListener("mouseleave", () => {
      card.classList.remove("scale-[1.02]");
    });
  });

  // ========================
  // NAVIGATION
  // ========================
  if (prev) {
    prev.addEventListener("click", () => {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar();
      showAllEvents();
    });
  }

  if (next) {
    next.addEventListener("click", () => {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar();
      showAllEvents();
    });
  }

  // ========================
  // NOTIFICATION
  // ========================
  const bell = document.querySelector(".fa-bell");
  if (bell) {
    bell.addEventListener("click", () => {
      alert("No new notifications 😄");
    });
  }

  // ========================
  // INIT
  // ========================
  renderCalendar();
});
// ========================
// DROPDOWN
// ========================
function toggleDropdown(id) {
  document
    .querySelectorAll('[id="cat"],[id="class"],[id="req"]')
    .forEach((el) => {
      if (el.id !== id) el.classList.add("hidden");
    });
  document.getElementById(id).classList.toggle("hidden");
}

// ========================
// FILTER CATEGORY
// ========================
function filterCategory(value) {
  filterAll({ category: value });
}

// ========================
// FILTER CLASS
// ========================
function filterClass(value) {
  filterAll({ class: value });
}

// ========================
// FILTER REQUIREMENT
// ========================
function filterReq(value) {
  filterAll({ req: value });
}

// ========================
// FILTER ENGINE
// ========================
let filters = {
  category: "all",
  class: "all",
  req: "all",
};

function filterAll(update) {
  filters = { ...filters, ...update };

  const cards = document.querySelectorAll(".event-card");

  cards.forEach((card) => {
    const matchCategory =
      filters.category === "all" || card.dataset.category === filters.category;
    const matchClass =
      filters.class === "all" || card.dataset.class === filters.class;
    const matchReq = filters.req === "all" || card.dataset.req === filters.req;

    if (matchCategory && matchClass && matchReq) {
      card.style.display = "flex";
    } else {
      card.style.display = "none";
    }
  });
}
