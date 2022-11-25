import { isEmpty } from './module/forms.js';

// --- Validations formulaires ---

// Formulaire d'ajout
const addForm = document.getElementById('addForm');

addForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const addListUser = document.getElementById('add_list_user');
  const addListClient = document.getElementById('add_list_client');
  const addListPresta = document.getElementById('add_list_presta');
  const addDatetime = document.getElementById('add_datetime');

  if (
    !isEmpty(addListUser) &&
    !isEmpty(addListClient) &&
    !isEmpty(addListPresta) &&
    !isEmpty(addDatetime)
  ) {
    addForm.submit();
  }
});
