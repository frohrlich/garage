import {
  isFirstNameValid,
  isLastNameValid,
  isEmailValid,
  isPasswordValid,
  isSamePassword,
  isDateValid,
  isSecuValid,
  isContractTypeValid,
  isWorkTimeValid,
  isEmpty,
} from "./module/forms.js";

document.addEventListener("DOMContentLoaded", function () {
  // Bouton de suppression
  let deleteButtons = document.getElementsByClassName("btn-del");
  for (let element of deleteButtons) {
    element.addEventListener("click", function () {
      if (confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
        let itemID =
          element.parentElement.previousElementSibling.previousElementSibling
            .id; // on récupère l'id de l'item

        // AJAX : delete the element in DB with php
        $.ajax({
          method: "POST",
          url: "src/php/forms/deleteuser.php",
          data: { id: itemID },
        }).done(function () {
          // Then hide element in page
          element.parentElement.parentElement.classList.add("d-none");
          document.getElementById("modForm").classList.add("d-none");
          alert("Utilisateur supprimé !");
        });
      }
    });
  }

  // Bouton de modification des données
  let modifButtons = document.getElementsByClassName("btn-mod"); // liste des boutons modification
  let prevSelectedName = 0;
  for (let element of modifButtons) {
    element.addEventListener("click", function () {
      // Visual effets
      let textName = element.parentElement.previousElementSibling; // on récupère le nom de l'item
      let modForm = document.getElementById("modForm"); // formulaire de modification

      textName.style.color = "aqua"; // on le met en couleur "sélectionné"
      if (prevSelectedName) {
        if (
          prevSelectedName == textName &&
          modForm.classList.contains("d-none")
        ) {
          prevSelectedName.style.color = "aqua";
        } else {
          prevSelectedName.style.color = "white"; // et on remet en blanc le dernier item sélectionné
        }
      }
      element.parentNode.parentNode.after(modForm); // on place le formulaire a la suite de l'item sélectionné
      if (
        !prevSelectedName ||
        prevSelectedName == textName ||
        (prevSelectedName != textName && modForm.classList.contains("d-none"))
      ) {
        modForm.classList.toggle("d-none"); // et on l'affiche
      }
      prevSelectedName = textName;

      // Get data from DB and put it in form
      let itemID = element.parentElement.previousElementSibling.id; // get item ID

      // AJAX : get data from DB via a php file
      $.ajax({
        method: "POST",
        url: "src/php/forms/getuserinfo.php",
        data: { id: itemID },
      }).done(function (res) {
        // then fill form with values from DB
        let userData = JSON.parse(res);
        const inputs = document.getElementById("modForm").elements;
        inputs["mod_id"].value = itemID;
        inputs["mod_firstname"].value = userData["firstname"];
        inputs["mod_lastname"].value = userData["lastname"];
        inputs["mod_email"].value = userData["email"];
        inputs["mod_birthdate"].value = userData["birthdate"];
        inputs["mod_entry_date"].value = userData["entrydate"];
        inputs["mod_secu"].value = userData["secunumber"];
        inputs["mod_contract_type"].value = userData["contracttype"];
        inputs["mod_work_time"].value = userData["worktimeweek"];
        inputs["mod_lastco"].value = userData["lastlogin"];
      });
    });
  }

  // --- Validations formulaires ---

  // Formulaire d'ajout
  const addForm = document.getElementById("addForm");

  addForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const addFirstName = document.getElementById("add_firstname");
    const addLastName = document.getElementById("add_lastname");
    const addEmail = document.getElementById("add_email");
    const addPassword = document.getElementById("add_password");
    const addPasswordVerif = document.getElementById("add_password_verif");
    const addBirthDate = document.getElementById("add_birthdate");
    const addEntryDate = document.getElementById("add_entry_date");
    const addSecu = document.getElementById("add_secu");
    const addContractType = document.getElementById("add_contract_type");
    const addWorkTime = document.getElementById("add_work_time");

    if (
      !isEmpty(addFirstName) &&
      isFirstNameValid(addFirstName) &&
      !isEmpty(addLastName) &&
      isLastNameValid(addLastName) &&
      !isEmpty(addEmail) &&
      isEmailValid(addEmail) &&
      !isEmpty(addPassword) &&
      isPasswordValid(addPassword) &&
      !isEmpty(addPasswordVerif) &&
      isSamePassword(addPassword, addPasswordVerif) &&
      !isEmpty(addBirthDate) &&
      isDateValid(addBirthDate) &&
      !isEmpty(addEntryDate) &&
      isDateValid(addEntryDate) &&
      !isEmpty(addSecu) &&
      isSecuValid(addSecu) &&
      !isEmpty(addContractType) &&
      isContractTypeValid(addContractType) &&
      !isEmpty(addWorkTime) &&
      isWorkTimeValid(addWorkTime)
    ) {
      addForm.submit();
    }
  });

  // Formulaire de modification
  const modForm = document.getElementById("modForm");

  modForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const modFirstName = document.getElementById("mod_firstname");
    const modLastName = document.getElementById("mod_lastname");
    const modEmail = document.getElementById("mod_email");
    const modPassword = document.getElementById("mod_password");
    const modPasswordVerif = document.getElementById("mod_password_verif");
    const modBirthDate = document.getElementById("mod_birthdate");
    const modEntryDate = document.getElementById("mod_entry_date");
    const modSecu = document.getElementById("mod_secu");
    const modContractType = document.getElementById("mod_contract_type");
    const modWorkTime = document.getElementById("mod_work_time");

    if (
        !isEmpty(modFirstName) &&
        isFirstNameValid(modFirstName) &&
        !isEmpty(modLastName) &&
        isLastNameValid(modLastName) &&
        !isEmpty(modEmail) &&
        isEmailValid(modEmail) &&

        ((isEmpty(modPassword, true) &&
        isEmpty(modPasswordVerif, true)) ||
        (!isEmpty(modPassword) &&
        isPasswordValid(modPassword) &&
        !isEmpty(modPasswordVerif) &&
        isSamePassword(modPassword, modPasswordVerif))) &&

        !isEmpty(modBirthDate) &&
        isDateValid(modBirthDate) &&
        !isEmpty(modEntryDate) &&
        isDateValid(modEntryDate) &&
        !isEmpty(modSecu) &&
        isSecuValid(modSecu) &&
        !isEmpty(modContractType) &&
        isContractTypeValid(modContractType) &&
        !isEmpty(modWorkTime) &&
        isWorkTimeValid(modWorkTime)
    ) {
      modForm.submit();
    }
  });
});
