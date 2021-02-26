<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login 3em - login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/luxonauta/luxa@latest/dist/expanded/luxa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/luxonauta/luxa@latest/dist/compressed/luxa.css">
    <link rel="stylesheet" href="style/input.css">
    <link rel="stylesheet" href="style/panel.css">
    <link rel="stylesheet" href="style/mainpopup.css">
  </head>
  <body>
    <h1>projet de stage</h1>
    <hr class="rainbowBack">
    <div class="grid">
      <div class="loginBox card">


        <input type="text" id="Lusername" name="username" class="neon" placeholder="username"><br>
        <input type="password" id="Lpassword" name="password" placeholder="password"><br>
        <button type="button" id="Login">login</button>
      </div>
      <br style="padding-top:5%">
      <div class="Vitrine1">
        <div class="registerBox card">

            <input type="text" id="Rusername" name="username" minlength="4" placeholder="username"><br>
            <input type="password" id="Rpassword" name="password" minlength="7" placeholder="password"><br>
            <input type="text" id="firstName" name="firstName" minlength="4" placeholder="firstName"><br>
            <input type="text" id="lastName" name="lastName" minlength="4" placeholder="lastName"><br>
            <button type="button" id="RegisterButton">register</button>
            <div class="loginPopup">
            <div class="formPopup" id="popupForm">
                <h1 id="message"></h1>
                <button type="button" class="btn cancel" onclick="closeTheForm()">Close</button>

          </div>
        </div>
      </div>
    </div>
    </div>
    <div id="result"></div>
    <script type="text/javascript" src="js/sendToPhp.js"></script>
  </body>
</html>
