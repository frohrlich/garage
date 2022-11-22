export const isEmpty = (elt) => {
  eraseErrors();

  if (elt.value.length === 0) {
    elt.nextElementSibling.innerHTML = "Veuillez remplir ce champ.<br>";
    elt.focus();
    return true;
  } else {
    return false;
  }
};

export const isFirstNameValid = (elt) => {
  eraseErrors();

  var letters = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML = "Veuillez entrer un prénom valide.<br>";
    elt.focus();
    return false;
  }
};

export const isLastNameValid = (elt) => {
  eraseErrors();

  var letters = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML = "Veuillez entrer un nom valide.<br>";
    elt.focus();
    return false;
  }
};

export const isEmailValid = (elt) => {
  eraseErrors();

  var letters = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML = "Veuillez entrer un email valide.<br>";
    elt.focus();
    return false;
  }
};

export const isPhoneValid = (elt) => {
  eraseErrors();

  var letters = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un numéro de téléphone valide.<br>";
    elt.focus();
    return false;
  }
};

export const isPasswordValid = (elt) => {
  eraseErrors();
  var letters = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Le mot de passe doit être long d'au moins 8 caractères et contenir au moins une lettre et un chiffre.<br>";
    elt.focus();
    return false;
  }
};

export const isSamePassword = (password, verifPassword) => {
  eraseErrors();

  if (password.value == verifPassword.value) {
    return true;
  } else {
    verifPassword.nextElementSibling.innerHTML =
      "Les mots de passe doivent être identiques.<br>";
    verifPassword.focus();
    return false;
  }
};

export const isDateValid = (elt) => {
  eraseErrors();

  var letters = /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML = "Veuillez entrer une date valide.<br>";
    elt.focus();
    return false;
  }
};

export const isSecuValid = (elt) => {
  eraseErrors();

  var letters = /(^\d{13}$)|(^\d{15}$)/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un numéro de sécurité sociale valide.<br>";
    elt.focus();
    return false;
  }
};

export const isContractTypeValid = (elt) => {
  eraseErrors();

  let contractTypes = ["CDI", "CDD", "Alternance", "Autre"];

  if (contractTypes.includes(elt.value)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un type de contrat valide.<br>";
    elt.focus();
    return false;
  }
};

export const isWorkTimeValid = (elt) => {
  eraseErrors();

  var letters = /^\+?(0|[1-9]\d*)$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un temps de travail valide.<br>";
    elt.focus();
    return false;
  }
};

export const isMessageValid = (elt) => {
  eraseErrors();

  var letters = /^(?=.{50,1000}$).*/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Votre message doit faire entre 50 et 1000 caractères.<br>";
    elt.focus();
    return false;
  }
};

// Erases all error messages
const eraseErrors = () => {
  let errors = document.getElementsByClassName("err-msg");
  for (let error of errors) {
    error.innerHTML = "";
  }
};
