function dislayRegistration() {
  document.getElementById("registrationform").style.display = "flex";
  document.getElementById("loginform").style.display = "none";
  document.getElementById("signuptext").style.backgroundColor = "white";
  document.getElementById("logintext").style.backgroundColor = "rgb(220, 220, 220)";
}
function dislayLogin() {
  document.getElementById("registrationform").style.display = "none";
  document.getElementById("loginform").style.display = "flex";
  document.getElementById("signuptext").style.backgroundColor = "rgb(220, 220, 220";
  document.getElementById("logintext").style.backgroundColor = "white";
}