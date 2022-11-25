import {
  isFirstNameValid,
  isLastNameValid,
  isPostalCodeValid,
  isVehicleValid,
  isEmpty,
} from './module/forms.js';

document.addEventListener('DOMContentLoaded', function () {
  // Bouton de suppression
  let deleteButtons = document.getElementsByClassName('btn-del');
  for (let element of deleteButtons) {
    element.addEventListener('click', function () {
      if (confirm('Voulez-vous vraiment supprimer ce client ?')) {
        alert('Client supprimé !');
      }
    });
  }

  // Bouton de modification des données
  let modifButtons = document.getElementsByClassName('btn-mod'); // liste des boutons modification
  let prevSelectedName = 0;
  for (let element of modifButtons) {
    element.addEventListener('click', function () {
      let textName = element.parentElement.previousElementSibling; // on récupère le nom de l'item
      let modForm = document.getElementById('modForm'); // formulaire de modification

      textName.style.color = 'aqua'; // on le met en couleur "sélectionné"
      if (prevSelectedName) {
        if (
          prevSelectedName == textName &&
          modForm.classList.contains('d-none')
        ) {
          prevSelectedName.style.color = 'aqua';
        } else {
          prevSelectedName.style.color = 'white'; // et on remet en blanc le dernier item sélectionné
        }
      }
      element.parentNode.parentNode.after(modForm); // on place le formulaire a la suite de l'item sélectionné
      if (
        !prevSelectedName ||
        prevSelectedName == textName ||
        (prevSelectedName != textName && modForm.classList.contains('d-none'))
      ) {
        modForm.classList.toggle('d-none'); // et on l'affiche
      }
      prevSelectedName = textName;
    });
  }

  // --- Validations formulaires ---

  // Formulaire d'ajout
  const addForm = document.getElementById('addForm');

  addForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const addFirstName = document.getElementById('add_firstname');
    const addLastName = document.getElementById('add_lastname');
    const addAdress = document.getElementById('add_address');
    const addPostalCode = document.getElementById('add_postalcode');
    const addVehicle = document.getElementById('add_vehicle');

    if (
      !isEmpty(addFirstName) &&
      isFirstNameValid(addFirstName) &&
      !isEmpty(addLastName) &&
      isLastNameValid(addLastName) &&
      !isEmpty(addAdress) &&
      !isEmpty(addPostalCode) &&
      isPostalCodeValid(addPostalCode) &&
      !isEmpty(addVehicle) &&
      isVehicleValid(addVehicle)
    ) {
      addForm.submit();
    }
  });

  // Formulaire de modification
  const modForm = document.getElementById('modForm');

  modForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const modFirstName = document.getElementById('mod_firstname');
    const modLastName = document.getElementById('mod_lastname');
    const modAdress = document.getElementById('mod_address');
    const modPostalCode = document.getElementById('mod_postalcode');
    const modVehicle = document.getElementById('mod_vehicle');

    if (
      !isEmpty(modFirstName) &&
      isFirstNameValid(modFirstName) &&
      !isEmpty(modLastName) &&
      isLastNameValid(modLastName) &&
      !isEmpty(modAdress) &&
      !isEmpty(modPostalCode) &&
      isPostalCodeValid(modPostalCode) &&
      !isEmpty(modVehicle) &&
      isVehicleValid(modVehicle)
    ) {
      modForm.submit();
    }
  });
});
