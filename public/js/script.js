const dropdown = document.querySelector(".dropdown");
const profile = document.querySelector(".profile");
const add = document.querySelector(".add-btn");
const modal = document.querySelector(".modal");
const mark = document.querySelector(".fa-xmark");

profile.addEventListener("click",()=>{
    dropdown.classList.toggle("hidden");
})

add.addEventListener("click",()=>{
    modal.classList.remove("hidden");
    
})

mark.addEventListener("click",()=>{
    modal.classList.add("hidden");
})