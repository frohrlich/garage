// On importe des fonctions depuis des modules
import { isEmpty, isEmailValid } from "./module/forms.js";

document.addEventListener("DOMContentLoaded", function () {
  // On pointe sur le formulaire de contact
  const connectForm = document.getElementById("connectForm");

  connectForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const connectEmail = document.getElementById("email");
    const connectMdp = document.getElementById("password");

    // On valide le formulaire de contact
    if (
      !isEmpty(connectEmail) &&
      isEmailValid(connectEmail) &&
      !isEmpty(connectMdp)
    ) {
      connectForm.submit();
    }
  });
});
