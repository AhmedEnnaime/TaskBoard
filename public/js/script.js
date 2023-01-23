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
const task_titles = document.querySelectorAll(".task_title");

for(let task_title of task_titles){
    task_title.addEventListener("click",updateTask)
}
const updateTask = (e) => {
    let el = e;
    el.setAttribute("contenteditable","true");

}

profile.addEventListener("click",()=>{
    dropdown.classList.toggle("hidden");
})

add.addEventListener("click",()=>{
    modal.classList.remove("hidden");
})

mark.addEventListener("click",()=>{
    modal.classList.add("hidden");
})

update_close?.addEventListener("click",()=>{
    update_modal.classList.add("hidden");
})

for(let update of updates){
    const id_input = update_modal?.childNodes[5].childNodes[1];
    let id = update.parentElement.parentElement.childNodes[1].childNodes[1].value;
    let title = update.parentElement.childNodes[1].textContent;
    let title_input = update_modal?.childNodes[5].childNodes[5];
    update.addEventListener("click",()=>{
        update_modal.classList.remove("hidden");
        title_input.value = title;
        id_input.value = id;
    })
}

// const updateTask = async(id,title,deadline)=>{
// 	const form = new FormData();
// 	form.append("id",id);
// 	form.append("title",title);
//     form.append("deadline",deadline);
// 	await fetch("http://localhost/YouCode/TaskBoard/tasks/updateTask",{
// 		method: "POST",
// 		body: form,
// 	});
// }



