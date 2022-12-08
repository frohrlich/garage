export const isEmpty = (elt, mute = false) => {
  eraseErrors();

  if (elt.value.length === 0) {
    if (!mute) {
      elt.nextElementSibling.innerHTML = "Veuillez remplir ce champ.<br>";
      elt.focus();
    }
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

  var letters = /^(?=.{10,1000}$).*/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Votre message doit faire entre 10 et 1000 caractères.<br>";
    elt.focus();
    return false;
  }
};

export const isPostalCodeValid = (elt) => {
  eraseErrors();

  var Reg = /^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/;

  if (elt.value.match(Reg)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un code postal valide.<br>";
    elt.focus();
    return false;
  }
};

export const isVehicleValid = (elt) => {
  eraseErrors();

  var letters = /^(?=.{2,255}$).*/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Le type de véhicule doit faire entre 2 et 255 caractères.<br>";
    elt.focus();
    return false;
  }
};

export const isPrestaValid = (elt) => {
  eraseErrors();

  var letters = /^(?=.{5,255}$).*/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Le nom de la prestation doit faire entre 5 et 255 caractères.<br>";
    elt.focus();
    return false;
  }
};

export const isReaTimeValid = (elt) => {
  eraseErrors();

  var letters = /^(?!0*[.,]0*$|[.,]0*$|0*$)\d+[,.]?\d{0,2}$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer un temps de réalisation valide.<br>";
    elt.focus();
    return false;
  }
};

export const isCostValid = (elt) => {
  eraseErrors();

  var letters = /^(?!0*[.,]0*$|[.,]0*$|0*$)\d+[,.]?\d{0,2}$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML = "Veuillez entrer un montant valide.<br>";
    elt.focus();
    return false;
  }
};

export const isDateTimeValid = (elt) => {
  eraseErrors();
  console.log(elt.value);
  var letters = /^(000[1-9]|00[1-9]\d|0[1-9]\d\d|100\d|10[1-9]\d|1[1-9]\d{2}|[2-9]\d{3}|[1-9]\d{4}|1\d{5}|2[0-6]\d{4}|27[0-4]\d{3}|275[0-6]\d{2}|2757[0-5]\d|275760)-(0[1-9]|1[012])-(0[1-9]|[12]\d|3[01])T(0\d|1\d|2[0-4]):(0\d|[1-5]\d)(?::(0\d|[1-5]\d))?(?:.(00\d|0[1-9]\d|[1-9]\d{2}))?$/;

  if (elt.value.match(letters)) {
    return true;
  } else {
    elt.nextElementSibling.innerHTML =
      "Veuillez entrer une date et une heure valides.<br>";
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
