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
function showCategory() {
  document.body.style.backgroundColor = "rgba(20, 20, 50, 0.8)";
  document.getElementById("categorylist").style.display = "flex";
}
function fadeCategory() {
  document.body.style.backgroundColor = "rgb(254, 255, 212)";
  document.getElementById("categorylist").style.display = "none";
}
function showSubCategory() {
  document.getElementById("categorylist").style.display = "none";
}
