const list_items = document.querySelectorAll('.list-item');
const lists = document.querySelectorAll('.list');

let draggedItem = null;

for (let item of list_items) {
	let section_target = item.parentElement.id;
	let item_id = item.dataset.id;
	
	item.addEventListener('dragstart', function () {
		draggedItem = item;
	});

	item.addEventListener('dragend', function () {
		section_target = item.parentElement.id;
		changeSection(item_id,section_target);
		location.reload();
	})

	for (let list of lists) {
		
		list.addEventListener('dragover', function (e) {
			e.preventDefault();
		});
		
		list.addEventListener('dragenter', function (e) {
			e.preventDefault();
		});

		list.addEventListener('drop', function (e) {
			this.append(draggedItem);
		});
	}
}

const changeSection = async(id,section)=>{
	const form = new FormData();
	form.append("id",id);
	form.append("section",section);
	await fetch("http://localhost/YouCode/TaskBoard/tasks/updateSection",{
		method: "POST",
		body: form,
	});
}