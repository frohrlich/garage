import {
  isPrestaValid,
  isReaTimeValid,
  isCostValid,
  isEmpty,
} from "./module/forms.js";

document.addEventListener("DOMContentLoaded", function () {
  // Bouton de suppression
  let deleteButtons = document.getElementsByClassName("btn-del");
  for (let element of deleteButtons) {
    element.addEventListener("click", function () {
      if (confirm("Voulez-vous vraiment supprimer cette prestation ?")) {
        let itemID =
          element.parentElement.previousElementSibling.previousElementSibling
            .id; // on récupère l'id de l'item

        // AJAX : delete the element in DB with php
        $.ajax({
          method: "POST",
          url: "src/php/forms/deleteprestation.php",
          data: { id: itemID },
        }).done(function () {
          // Then hide element in page
          element.parentElement.parentElement.classList.add("d-none");
          document.getElementById("modForm").classList.add("d-none");
          alert("Prestation supprimée !");
        });
      }
    });
  }

  // Bouton de modification des données
  let modifButtons = document.getElementsByClassName("btn-mod"); // liste des boutons modification
  let prevSelectedName = 0;
  for (let element of modifButtons) {
    element.addEventListener("click", function () {
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
        url: "src/php/forms/getprestationinfo.php",
        data: { id: itemID },
      }).done(function (res) {
        // then fill form with values from DB
        let userData = JSON.parse(res);
        const inputs = document.getElementById("modForm").elements;
        inputs["mod_id"].value = itemID;
        inputs["mod_presta"].value = userData["name"];
        inputs["mod_reatime"].value = userData["time"];
        inputs["mod_cost"].value = userData["cost"];
      });
    });
  }

  // --- Validations formulaires ---

  // Formulaire d'ajout
  const addForm = document.getElementById("addForm");

  addForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const addPresta = document.getElementById("add_presta");
    const addReaTime = document.getElementById("add_reatime");
    const addCost = document.getElementById("add_cost");

    if (
      !isEmpty(addPresta) &&
      isPrestaValid(addPresta) &&
      !isEmpty(addReaTime) &&
      isReaTimeValid(addReaTime) &&
      !isEmpty(addCost) &&
      isCostValid(addCost)
    ) {
      addForm.submit();
    }
  });

  // Formulaire de modification
  const modForm = document.getElementById("modForm");

  modForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const modPresta = document.getElementById("mod_presta");
    const modReaTime = document.getElementById("mod_reatime");
    const modCost = document.getElementById("mod_cost");

    if (
      !isEmpty(modPresta) &&
      isPrestaValid(modPresta) &&
      !isEmpty(modReaTime) &&
      isReaTimeValid(modReaTime) &&
      !isEmpty(modCost) &&
      isCostValid(modCost)
    ) {
      modForm.submit();
    }
  });
});
