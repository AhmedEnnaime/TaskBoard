const dropdown = document.querySelector(".dropdown");
const profile = document.querySelector(".profile");
const add = document.querySelector(".add-btn");
const modal = document.querySelector(".modal");
const update_modal = document.querySelector(".update_modal");
const updates = document.querySelectorAll(".fa-pen");
const mark = document.querySelector(".fa-xmark");
const update_close = document.querySelector(".update-close");
const workspaces = document.querySelectorAll(".workspaces");
//const update_btn = document.querySelector(".update-btn");

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

update_close.addEventListener("click",()=>{
    update_modal.classList.add("hidden");
})

for(let update of updates){
    //console.log(update.parentElement.childNodes[1].textContent);
    let title = update.parentElement.childNodes[1].textContent;
    let title_input = update_modal.childNodes[5].childNodes[3].textContent;
   
    //console.log(title_input);
    update.addEventListener("click",()=>{
        update_modal.classList.remove("hidden");
        title_input = title
        console.log(title);
    })
}

// for(let workspace of workspaces){
//     //console.log(workspace);
//     //console.log(workspace.childNodes[3].childNodes[1].textContent);
//     let title = workspace.childNodes[3].childNodes[1].textContent
//     let title_input = update_modal.childNodes[5].childNodes[3].textContent;
//     for(let update of updates){
//         update.addEventListener("click",()=>{
//             update_modal.classList.remove("hidden");
//             console.log(title);
//         })
//     }
   
//     // title_input = title;
//     // console.log(update_modal.childNodes[5].childNodes[3].textContent);
//     //let update_btn = workspace.childNodes[1].childNodes[3].childNodes[5];
//     //console.log(workspace.childNodes[1].childNodes[1].childNodes[1].style.background);
//     //console.log(workspace.childNodes[1].childNodes[3].childNodes[5]);
// }


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