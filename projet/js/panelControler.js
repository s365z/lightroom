
console.log("...")

/*setTimeout(userName.remove().value,500)
setTimeout(userPass.remove().value,500)*/
console.log(window.username)
console.log(window.password)

function ChangePassword(){
  console.log("SAlut")
  window.newpass = document.getElementById("newpass").value
  action = "ChangePassword"
  const res = fetch("login/api/Controler.php",{headers: {'Accept': 'application/json','Content-Type': 'application/json'},method: "POST",body: JSON.stringify({password: window.password, username: window.username,newpass:window.newpass, action:'ChangePassword'})})

  if (res.ok) {
  }
}
window.onload=function(){
  const changePasswordButton = document.getElementById("ChangePassButon")
  changePasswordButton.addEventListener("click", ChangePassword);
}
