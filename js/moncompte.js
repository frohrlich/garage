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
const form = document.getElementById('form');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const firstName = document.getElementById('firstname');
  const lastName = document.getElementById('lastname');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const passwordVerif = document.getElementById('password_verif');
  const birthDate = document.getElementById('birthdate');
  const secu = document.getElementById('secu');

  if (
    !isEmpty(firstName) &&
    isFirstNameValid(firstName) &&
    !isEmpty(lastName) &&
    isLastNameValid(lastName) &&
    !isEmpty(email) &&
    isEmailValid(email) &&

    ((isEmpty(password, true) &&
    isEmpty(passwordVerif, true)) ||
    (!isEmpty(password) &&
    isPasswordValid(password) &&
    !isEmpty(passwordVerif) &&
    isSamePassword(password, passwordVerif))) &&

    !isEmpty(birthDate) &&
    isDateValid(birthDate) &&
    !isEmpty(secu) &&
    isSecuValid(secu)
  ) {
    form.submit();
  }
});
