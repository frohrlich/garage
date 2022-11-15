export const validateEmpty = (elt) => {
  if (elt.value.length === 0) {
    console.log(elt.name, ' est vide');
  }
};
