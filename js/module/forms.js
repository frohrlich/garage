export function validateEmpty() {
  var email = document.forms['RegForm']['Email'];
  var password = document.forms['RegForm']['Mot de passe'];

  if (email.value == '') {
    alert('Mettez une adresse email valide.');
    email.focus();
    return false;
  } else if (email.value.indexOf('@', 0) < 0) {
    alert('Mettez une adresse email valide.');
    email.focus();
    return false;
  } else if (email.value.indexOf('.', 0) < 0) {
    alert('Mettez une adresse email valide.');
    email.focus();
    return false;
  } else if (password.value == '') {
    alert('Saisissez votre mot de passe');
    password.focus();
    return false;
  }
  return true;
}
