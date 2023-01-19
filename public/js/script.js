const dropdown = document.querySelector(".dropdown");
const profile = document.querySelector(".profile");
const add = document.querySelector(".add-btn");
const modal = document.querySelector(".modal");
const mark = document.querySelector(".fa-xmark");

const members_num = document.querySelector(".members_num");
const members = document.querySelector(".members");

profile.addEventListener("click",()=>{
    dropdown.classList.toggle("hidden");
})

add.addEventListener("click",()=>{
    modal.classList.remove("hidden");
})

mark.addEventListener("click",()=>{
    modal.classList.add("hidden");
})

members_num.addEventListener("change",(e)=>{
    members.innerHTML = ``;
    let member = e.target.value;
    let i = 0;
    while(i < member){
        members.innerHTML += `
        <label for="member_name">Name of member ${i+1} </label>
        <input placeholder="Enter name of member ${i+1}" type="text" name="name[]" class="rounded-lg h-8 p-4">
        `
        i++;
    }
    
})