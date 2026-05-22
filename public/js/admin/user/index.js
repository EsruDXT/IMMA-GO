const sortBtn = document.getElementById("sortBtn");
const sortMenu = document.getElementById("sortMenu");

sortBtn.addEventListener("click", () => {
    sortMenu.classList.toggle("hidden");
});

document.addEventListener("click", (e) => {

    if (
        !sortBtn.contains(e.target) &&
        !sortMenu.contains(e.target)
    ) {
        sortMenu.classList.add("hidden");
    }

});

function openDeleteModal(id)
{
    document
        .getElementById("deleteModal")
        .classList.remove("hidden");

    document
        .getElementById("deleteLink")
        .href = `/admin/events/delete/${id}`;
}

function closeDeleteModal()
{
    document
        .getElementById("deleteModal")
        .classList.add("hidden");
}
