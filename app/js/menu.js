var signInButton = document.querySelector('.wrapper__signIn');
var signUpButton = document.querySelector('.wrapper__signUp'); 
var forms = document.querySelectorAll('.wrapper__form');

function setFormVisible(button, form) {
  button.classList.add('btn--active');
  form.classList.add('wrapper__form--active');
}

function setFormHidden(button, form) {
  button.classList.remove('btn--active');
  form.classList.remove('wrapper__form--active');
}

function showSignIn() {
  setFormHidden(signUpButton, forms[1]);
  setFormVisible(signInButton, forms[0]);
}

function showSignUp() {
  setFormHidden(signInButton, forms[0]);
  setFormVisible(signUpButton, forms[1]);
}

signInButton.addEventListener('click', showSignIn, false);
signUpButton.addEventListener('click', showSignUp, false);