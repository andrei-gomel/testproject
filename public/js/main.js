// Добавление записи


addRecordForm = document.getElementById('addRecordForm');
btnAddSubmit = document.getElementById('btn-add-submit');

addRecordForm.addEventListener('submit', (e) => {
	e.preventDefault();
	btnAddSubmit.textContent = 'Сохраняется...';
	btnAddSubmit.disabled = true;

	fetch('/clients/save', {
		method: 'POST',
		body: new FormData(addRecordForm)
	})
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
		});
});
