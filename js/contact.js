import {
  isLastNameValid,
  isEmailValid,
  isPhoneValid,
  isMessageValid,
  isEmpty,
} from "./module/forms.js";

document.addEventListener("DOMContentLoaded", function () {
  // --- Validations formulaire ---

  // Formulaire d'ajout
  const messForm = document.getElementById("mess_form");

  messForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const message = document.getElementById("message");

    if (
      !isEmpty(name) &&
      isLastNameValid(name) &&
      !isEmpty(email) &&
      isEmailValid(email) &&
      !isEmpty(phone) &&
      isPhoneValid(phone) &&
      !isEmpty(message) &&
      isMessageValid(message)
    ) {
      messForm.submit();
    }
  });
});
