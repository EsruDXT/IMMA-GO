const competitionSelect =
    document.getElementById('competition-select');

const registerButton =
    document.getElementById('btn-register');

if (registerButton) {

    registerButton.addEventListener('click', () => {

        const eventId =
            registerButton.dataset.eventId;

        // kalau ada dropdown competition
        if (competitionSelect) {

            const competition =
                competitionSelect.value;

            if (!competition) {

                alert('Please select a competition.');

                return;
            }

            window.location.href =
                `/event/register?competition=${competition}&id=${eventId}`;

        } else {

            // kalau bukan event competition
            window.location.href =
                `/event/register?id=${eventId}`;
        }
    });
}