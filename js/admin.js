document.addEventListener("DOMContentLoaded", function () {
  // confirmation suppression
  let deleteButtons = document.getElementsByClassName("btn-del");
  for (let element of deleteButtons) {
    element.addEventListener("click", function () {
      if (confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
        alert("Utilisateur supprimé !");
      }
    });
  }

  // ouverture formulaire modification
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
      element.parentNode.parentNode.appendChild(modForm); // on place le formulaire a la suite de l'item sélectionné
      if (
        !prevSelectedName ||
        prevSelectedName == textName ||
        (prevSelectedName != textName && modForm.classList.contains("d-none"))
      ) {
        modForm.classList.toggle("d-none"); // et on l'affiche
      }
      prevSelectedName = textName;
    });
  }
});
