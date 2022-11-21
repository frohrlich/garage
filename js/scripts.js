// On importe des fonctions depuis des modules
import { validateEmpty } from './module/forms.js';

// On pointe sur le formulaire de contact
const connectForm = document.getElementById('connectForm');

connectForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const connectEmail = document.getElementById('Email');
  const connectMdp = document.getElementById('Password');

  // On valide le formulaire de contact
  if (!validateEmpty(connectEmail) && !validateEmpty(connectMdp)) {
    connectForm.submit();
  }
});
