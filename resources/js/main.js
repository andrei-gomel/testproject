// Добавление записи


addRecordForm = document.getElementById('addRecordForm');
btnAddSubmit = document.getElementById('btn-add-submit');

addRecordForm.addEventListener('submit', (e) => {
	e.preventDefault();
	btnAddSubmit.textContent = 'Сохраняется...';
	btnAddSubmit.disabled = true;
});