let signup = document.querySelector(".signup");
let login = document.querySelector(".login");
let slider = document.querySelector(".slider");
let formSection = document.querySelector(".form-section");
 
signup.addEventListener("click", () => {
    slider.classList.add("moveslider");
    formSection.classList.add("form-section-move");
});
 
login.addEventListener("click", () => {
    slider.classList.remove("moveslider");
    formSection.classList.remove("form-section-move");
});
const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye")
eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
})
const spasswordInput= document.querySelector("#spassword")
const confieye=document.querySelector("#confieye")
confieye.addEventListener("click",function(){
  this.classList.toggle("fa-eye-slash")
  const type=spasswordInput.getAttribute("type")==="password" ? "text" : "password"
  spasswordInput.setAttribute("type",type)
})
const cpasswordInput=document.querySelector("#cpassword")
const ceye=document.querySelector("#ceye")
ceye.addEventListener("click",function(){
  this.classList.toggle("fa-eye-slash")
  const type= cpasswordInput.getAttribute("type")==="password" ? "text": "password"
  cpasswordInput.setAttribute("type",type)
})
