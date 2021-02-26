function redirectPost(url, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}

function print(value) {
  document.getElementById("result").innerHTML +="\n" + value;
}
function errorHandler(error){

}
function openTheForm(message) {
  document.getElementById("popupForm").style.display = "block";
  document.getElementById("message").innerHTML = message;
}

function closeTheForm() {
  document.getElementById("popupForm").style.display = "none";
}
function makeConnection(username, password, action){
  var result = null
  fetch("login/api/Controler.php",{headers: {'Accept': 'application/json','Content-Type': 'application/json'},method: "POST",body: JSON.stringify({password: password, username: username, action:action})}).then(function(res) {
  if (res.ok) {
    redirectPost("panel.php", {username:username,password:password})
    } else {
    let reponse = res.text();
    let statusCode = res.status;
    let error = false;
    if(statusCode == 404) {
      openTheForm("Erreur dans l'username ou le password");
      error = true;
    }
    }
  })
}
function makeLoginConnexion() {
  const username = document.getElementById("Lusername").value;
  const password = document.getElementById("Lpassword").value;
  makeConnection(username,password,"login")
}
function makeRegisterConnexion(){
  console.log("Check 0 pass")
  let action = "register"

  const username = document.getElementById("Rusername").value;
  const password = document.getElementById("Rpassword").value;
  const firstName = document.getElementById("firstName").value;
  const lastName = document.getElementById("lastName").value;
  if(username.length > 4){
    console.log(action)
    if(password.length > 8){
      console.log(action)
      console.log("Check 2 pass")

      if(firstName.length > 3){
        console.log(action)
        console.log("Check 3 pass")

        if(lastName.length > 3){
          console.log(action)
          console.log("Check 4 pass now the register is start")

          var result = null
          fetch("login/api/Controler.php",
          {
          headers: {'Accept': 'application/json','Content-Type': 'application/json'},method: "POST",body: JSON.stringify({password: password, username: username, firstname:firstName,lastname:lastName, action:"register"})}).then(function(res) {
                let reponse = res.text();
                let errorCode = "Undefined offset: 0 in";
                if(new RegExp(reponse).test(errorCode)) {
                   print("Erreur dans l'username ou le password");
                }
                setTimeout(makeConnection(username,password,"login"), 1000)
          })
          console.log(action)

        }
      }
    }
  }
}
const LoginButton = document.getElementById("Login")
const RegisterButton = document.getElementById("RegisterButton")
LoginButton.addEventListener("click", makeLoginConnexion);
RegisterButton.addEventListener("click", makeRegisterConnexion);

//object.addEventListener("click", myScript);
//object.addEventListener("click", myScript);
