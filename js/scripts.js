// On importe des fonctions depuis des modules
import { validateEmpty } from './modules/forms.js';

// On pointe sur le formulaire de contact
const connexionForm = document.getElementById('connexionForm');
// On valide le formulaire de contact
validateEmpty(connexionForm);
