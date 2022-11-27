import {
  isFirstNameValid,
  isLastNameValid,
  isPostalCodeValid,
  isVehicleValid,
  isEmpty,
} from "./module/forms.js";

document.addEventListener("DOMContentLoaded", function () {
  // Bouton de suppression
  let deleteButtons = document.getElementsByClassName("btn-del");
  for (let element of deleteButtons) {
    element.addEventListener("click", function () {
      if (confirm("Voulez-vous vraiment supprimer ce client ?")) {
        let itemID =
          element.parentElement.previousElementSibling.previousElementSibling
            .id; // on récupère l'id de l'item

        // AJAX : delete the element in DB with php
        $.ajax({
          method: "POST",
          url: "src/php/forms/deleteclient.php",
          data: { id: itemID },
        }).done(function () {
          // Then hide element in page
          element.parentElement.parentElement.classList.add("d-none");
          document.getElementById("modForm").classList.add("d-none");
          alert("Client supprimé !");
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
        url: "src/php/forms/getclientinfo.php",
        data: { id: itemID },
      }).done(function (res) {
        // then fill form with values from DB
        let userData = JSON.parse(res);
        const inputs = document.getElementById("modForm").elements;
        inputs["mod_id"].value = itemID;
        inputs["mod_firstname"].value = userData["firstname"];
        inputs["mod_lastname"].value = userData["lastname"];
        inputs["mod_address"].value = userData["address"];
        inputs["mod_postalcode"].value = userData["zipcode"];
        inputs["mod_vehicle"].value = userData["vehicle"];
        inputs["mod_createdat"].value = userData["created_at"];
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
    const addAdress = document.getElementById("add_address");
    const addPostalCode = document.getElementById("add_postalcode");
    const addVehicle = document.getElementById("add_vehicle");

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
  const modForm = document.getElementById("modForm");

  modForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const modFirstName = document.getElementById("mod_firstname");
    const modLastName = document.getElementById("mod_lastname");
    const modAdress = document.getElementById("mod_address");
    const modPostalCode = document.getElementById("mod_postalcode");
    const modVehicle = document.getElementById("mod_vehicle");

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
