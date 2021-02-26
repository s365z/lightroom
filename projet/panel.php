<?php
$data = json_decode(file_get_contents('php://input'), true);

$data = $_POST;
if(@$_POST['username']){
  if($data['username'] = ""){

  } else {
    header('HTTP/1.0 403 Unauthorized');
  }

} else {
  header('HTTP/1.0 401 Unauthorized');
  return false;
}
?>
<html lang="en" dir="ltr">
  <head>
    <script type="text/javascript">
    window.username = "<?=$_POST['username']?>";
    window.password = "<?=$_POST['password']?>";
    </script>
    <script src="js/panelControler.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="style/panel.css">
    <link rel="stylesheet" href="style/wooo.css">
    <link rel="stylesheet" href="style/input.css">
    <link rel="stylesheet" href="style/animation.css">
    <link rel="stylesheet" href="style/grid.css">
    <link rel="stylesheet" href="style/secondPopup.css">
    <script src="js/ImageControler.js"></script>
    <meta charset="utf-8">
    <ul>
    </ul>
  </head>
  <body>
    <main class="animate__animated animate__fadeInLeft">
      <div class="banner">
        <h2 class="middle rainbow">Welcome <?php echo $_POST['username'];?> !</h2>
      </div>
    </main>
    <hr class="">
    <div class="option">
      <div class="ChangePassword">
        <input id="newpass" placeholder="new password">
        <br>
        <button type="button" id="ChangePassButon" name="button">Change</button>
      </div>
    </div>
    <div>
      <input type="text" id="fileImgUrl" placeholder="image url"></input>
      <button type="button" id="LoadImage" name="button">Load</button>
      <br>
      <div class="grid">
        <div id="imageContainer">

        </div>
        <div id="setting" class="Panelsetting" statue="disabled">
          <!-- every setting-->
          <p>Blur</p>
          <input type="range" min="0" max="150" value="-1" class="setting" data="blur" id="blur">

          <p>Brightness</p>
          <input type="range" min="0" max="100" value="-1" class="setting" data="brightness" id="brightness">

          <p>Sepia </p>
          <input type="range" min="0" max="100" value="-1" class="setting" data="sepia" id="sepia">

          <p>Gray Scale </p>
          <input type="range" min="0" max="100" value="-1" class="setting" data="gray" id="gray">

          <p>Contrast </p>
          <input type="range" min="0" max="100" value="-1" class="setting" data="contrast" id="contrast">

          <p>Hue </p>
          <input type="range" min="0" max="100" value="-1" class="setting" data="contrast" id="hue">

      </div>

    </div>
  </body>
</html>
