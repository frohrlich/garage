import {
  isFirstNameValid,
  isLastNameValid,
  isEmailValid,
  isPasswordValid,
  isSamePassword,
  isDateValid,
  isSecuValid,
  isEmpty,
} from './module/forms.js';

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

// Formulaire de modification
const modForm = document.getElementById('modForm');

modForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const modFirstName = document.getElementById('mod_firstname');
  const modLastName = document.getElementById('mod_lastname');
  const modEmail = document.getElementById('mod_email');
  const modPassword = document.getElementById('mod_password');
  const modPasswordVerif = document.getElementById('mod_password_verif');
  const modBirthDate = document.getElementById('mod_birthdate');
  const modSecu = document.getElementById('mod_secu');

  if (
    !isEmpty(modFirstName) &&
    isFirstNameValid(modFirstName) &&
    !isEmpty(modLastName) &&
    isLastNameValid(modLastName) &&
    !isEmpty(modEmail) &&
    isEmailValid(modEmail) &&
    !isEmpty(modPassword) &&
    isPasswordValid(modPassword) &&
    !isEmpty(modPasswordVerif) &&
    isSamePassword(modPassword, modPasswordVerif) &&
    !isEmpty(modBirthDate) &&
    isDateValid(modBirthDate) &&
    !isEmpty(modSecu) &&
    isSecuValid(modSecu)
  ) {
    modForm.submit();
  }
});
