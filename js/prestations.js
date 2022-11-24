import {
  isPrestaValid,
  isReaTimeValid,
  isCostValid,
  isEmpty,
} from './module/forms.js';

document.addEventListener('DOMContentLoaded', function () {
  // Bouton de suppression
  let deleteButtons = document.getElementsByClassName('btn-del');
  for (let element of deleteButtons) {
    element.addEventListener('click', function () {
      if (confirm('Voulez-vous vraiment supprimer cette prestation?')) {
        alert('Prestation supprimé !');
      }
    });
  }

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

  // Formulaire d'ajout
  const addForm = document.getElementById('addForm');

  addForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const addPresta = document.getElementById('add_presta');
    const addReaTime = document.getElementById('add_reatime');
    const addCost = document.getElementById('add_cost');

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
  const modForm = document.getElementById('modForm');

  modForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const modPresta = document.getElementById('mod_presta');
    const modReaTime = document.getElementById('mod_reatime');
    const modCost = document.getElementById('mod_cost');

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
