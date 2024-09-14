/*
  1.Get All input name
  2.Get Form name
  3.Get Error Validation
  4.Error Automatically Close
  5.Using If Condition
*/

const userInput = document.querySelector("#exampleInputUser");
const passInput = document.querySelector("#exampleInputPassword1");
const phoneNumberInput = document.querySelector("#exampleInputNumber");

const formButton = document.querySelector("form");
//error show
const userName = document.querySelector(".user-input");
const password = document.querySelector(".pass-input");
const phoneNumber = document.querySelector(".number-input");

//e-element
formButton.addEventListener("submit", (e) => {
  e.preventDefault();
  //create a function
  getValidation();
});

const getValidation = () => {
  const userValue = userInput.value.trim(); //trim=> clear space
  const passValue = passInput.value.trim();
  const phoneValue = phoneNumberInput.value.trim();

  //IF CONDTITION
  if (userValue === "") {
    userName.classList.add("user-input-true");
  } else {
    userName.classList.remove("user-input-true");
  }

  if (passValue === "") {
    password.classList.add("pass-input-true");
  } else {
    password.classList.remove("pass-input-true");
  }

  if (phoneValue === "") {
    phoneNumber.classList.add("number-input-true");
  } else {
    phoneNumber.classList.remove("number-input-true");
  }

  //close the error
  userInput.addEventListener("input", () => {
    userName.classList.remove("user-input-true");
  });
  passInput.addEventListener("input", () => {
    password.classList.remove("pass-input-true");
  });
  phoneNumberInput.addEventListener("input", () => {
    phoneNumber.classList.remove("number-input-true");
  });
};
