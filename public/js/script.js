const dropdown = document.querySelector(".dropdown");
const profile = document.querySelector(".profile");
const add = document.querySelector(".add-btn");
const modal = document.querySelector(".modal");
const update_modal = document.querySelector(".update_modal");
const updates = document.querySelectorAll(".fa-pen");
const mark = document.querySelector(".fa-xmark");
const update_close = document.querySelector(".update-close");
const workspaces = document.querySelectorAll(".workspaces");
const update_btn = document.querySelector(".update-btn");


profile.addEventListener("click",()=>{
    dropdown.classList.toggle("hidden");
})

add.addEventListener("click",()=>{
    modal.classList.remove("hidden");
})

mark.addEventListener("click",()=>{
    modal.classList.add("hidden");
})

update_close.addEventListener("click",()=>{
    update_modal.classList.add("hidden");
})

for(let update of updates){
    //console.log(update_modal.childNodes[5].childNodes[13]);
    const id_input = update_modal.childNodes[5].childNodes[1];
    let id = update.parentElement.parentElement.childNodes[1].childNodes[1].value;
    let title = update.parentElement.childNodes[1].textContent;
    let img = update_modal.childNodes[5].childNodes[13];
    let title_input = update_modal.childNodes[5].childNodes[5];
    //console.log(title_input);
    update.addEventListener("click",()=>{
        update_modal.classList.remove("hidden");
        title_input.value = title;
        id_input.value = id;
        console.log(title);
    })
}

