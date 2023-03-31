const openModal = document.getElementById("btn-search");
const modal = document.querySelector(".busqueda");
const closeModal = document.querySelector(".busqueda-close");

openModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.add("busqueda-show");
});

closeModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.remove("busqueda-show");
});

// const openModal = document.querySelector('.btn-search')
// const modal = document.querySelector('.busqueda')
// const closeModal = document.querySelector(".busqueda-close");


// openModal.addEventListener("click", (e)=>{
//   e.preventDefault();
//   modal.classList.add('d-block');
// })

// closeModal.addEventListener("click", (e) => {
//     e.preventDefault();
//     modal.classList.add("d-none");
//   });