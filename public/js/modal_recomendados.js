const openModal = document.querySelectorAll(".tarjeta");
const modals = document.querySelectorAll(".recommended");
const closeModal = document.querySelectorAll(".recommended-close");


function show_modal(e) {
    e.preventDefault();
    const id=e.currentTarget.dataset.ref
    const modal = document.querySelector("#"+id)
    modal.classList.add("recommended-show");
}

function fade_modal(e) {
    e.preventDefault();
    const modales = document.querySelectorAll(".recommended");
    modales.forEach(modal => {
        modal.classList.remove("recommended-show");
    });    
}
