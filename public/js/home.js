const slides = document.getElementById("slides");
    const dots = document.querySelectorAll(".dot");

    let index = 0;
    const totalSlides = dots.length;

    function updateSlide() {
        
        slides.style.transform = `translateY(-${index * 360}px)`;

        
        dots.forEach(dot => {
            dot.classList.remove("bg-white");
            dot.classList.add("bg-white/50");
        });

        dots[index].classList.remove("bg-white/50");
        dots[index].classList.add("bg-white");
    }

    function autoSlide() {
        index++;
        if (index >= totalSlides) index = 0;
        updateSlide();
    }

    updateSlide();
    setInterval(autoSlide, 3000);

    function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    menu.classList.toggle("hidden");
}

// klik luar nutup dropdown
window.addEventListener("click", function(e) {
    const dropdown = document.getElementById("dropdownMenu");

    if (!e.target.closest(".relative")) {
        dropdown.classList.add("hidden");
    }
});