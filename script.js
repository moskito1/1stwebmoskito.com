const formElement = document.getElementById("signupform");
const firstName = document.getElementById("firstname");
const lastName = document.getElementById("lastname");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const repeatPassword = document.getElementById("passwordRepeat");

formElement.addEventListener("submit", (event) => {
  if (!Validate(formElement)) {
    event.preventDefault();
  }
});

function Validate(formElement) {
  const usernameVal = username.value.trim();
  const firstnameVal = firstName.value.trim();
  const lastnameVal = lastName.value.trim();
  const emailVal = email.value.trim();
  const passwordVal = password.value.trim();
  const repeatPasswordVal = repeatPassword.value.trim();

  let namePattern = /^[A-Za-z\s]+$/;
  let mailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  //firstname lastname validation
  if (!firstnameVal.match(namePattern) || !lastnameVal.match(namePattern)) {
    setErrorMsg(firstName, "");
    setErrorMsg(lastName, "Name should only contain letters");
    return false;
  } else {
    setErrorMsg(firstName, "");
    setErrorMsg(lastName, "");
  }

  // username validation
  if (!usernameVal.match(/^[A-Za-z0-9\s]+$/)) {
    setErrorMsg(username, "Username should only contain letters and numbers");
    return false;
  } else {
    setErrorMsg(username, "");
  }

  //email validation
  if (!emailVal.match(mailPattern)) {
    setErrorMsg(email, "Enter a valid email address");
    return false;
  } else {
    setErrorMsg(email, "");
  }

  // repeat password validation
  if (passwordVal !== repeatPasswordVal) {
    setErrorMsg(repeatPassword, "Passwords don't match");
    return false;
  } else {
    setErrorMsg(repeatPassword, "");
  }

  return true;
}

function setErrorMsg(input, errormsg) {
  const formField = input.parentElement;
  const small = formField.querySelector("small");
  formField.className = errormsg ? "form-field error" : "form-field";
  small.innerText = errormsg;
}

function decreaseCount(event, inputElement) {
  var input = inputElement.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

function increaseCount(event, inputElement) {
  var input = inputElement.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}
let activeButton = null;

function updatePrice(button, size, price) {
  var displayPrice = document.querySelector(".display-price");
  var selectedSizeInput = document.getElementById("selected_size");
  var selectedPriceInput = document.getElementById("selected_price");
  price = parseFloat(price);
  if (!isNaN(price)) {
    displayPrice.innerHTML = "₱ " + price.toFixed(2);
    selectedSizeInput.value = size;
    selectedPriceInput.value = price;
    if (activeButton) {
      activeButton.classList.remove("active");
    }
    button.classList.add("active");
    activeButton = button;
  }
}
