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
