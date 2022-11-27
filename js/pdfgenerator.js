import { isEmpty, isDateTimeValid } from './module/forms.js';

// --- Validations formulaires ---

// Formulaire d'ajout
const addForm = document.getElementById('form');

addForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const addListClient = document.getElementById('add_list_client');
  const addListPresta = document.getElementById('add_list_presta');
  const addDatetime = document.getElementById('add_datetime');

  if (
    !isEmpty(addListClient) &&
    !isEmpty(addListPresta) &&
    !isEmpty(addDatetime) &&
    isDateTimeValid(addDatetime)
  ) {
    addForm.submit();
  }
});
