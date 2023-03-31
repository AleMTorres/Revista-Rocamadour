const openModal = document.querySelectorAll(".btn-delete");
const modals = document.querySelectorAll(".confirm");
const closeModal = document.querySelectorAll(".confirm-close");


openModal.forEach((button) => {
    button.addEventListener("click", (e)=> {
        e.preventDefault();
        modals.forEach((modal)=> {
            modal.classList.add("confirm-show");
        })
    })
});

closeModal.forEach((button) => {
    button.addEventListener("click", (e)=> {
        e.preventDefault();
        modals.forEach((modal)=> {
            modal.classList.remove("confirm-show");
        })
    })
});

