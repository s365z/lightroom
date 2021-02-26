var Url = ""
var settingPanel = ""

function ShowSize(){
  var image = document.getElementById("Image");
  document.getElementById("imageContainer").innerHTML += "<p> image size : ", image.width , "X" , image.height +" </p>";
  console.log(image.width * image.height)
}
function UploadImage(){

  console.log('function called')
  Url = document.getElementById("fileImgUrl").value
  console.log(Url)
  document.getElementById("imageContainer").innerHTML = "<img id='Image' src='" + Url + "' alt='The Image' width='1000' height='1000'/>";
  var image = document.getElementById("Image");
  image.addEventListener('load',ShowSize())
  const settingPanel = document.getElementById("setting");
  console.log(settingPanel)
  settingPanel.statue = "enable";
}

function MakeEffect(el){
  let brightnessStyle = ""
  let sepiaStyle = ""
  let blurStyle = ""
  let grayStyle = "";
  let hueStyle = "";
  var image = document.getElementById("Image");


  console.log(image)
  const id = el.id;
  let newStyle;
  switch(id){
    case 'blur':
      console.log("je suis dans blur")
      blurStyle = `blur(${el.value * (image.width + image.height)/2000}px)`;
      break;

    case "brightness":
      console.log("je suis dans brightness")
      brightnessStyle = `brightness(${el.value*10}%)`;

        break;
    case "sepia":
      console.log("je suis dans sepia")
      sepiaStyle = `sepia(${el.value}%)`
      break;
    case "gray":
      grayStyle += `grayscale( ${(el.value)/100})`
      console.log("je suis dans gray")
      break;
    case "hue":
      console.log("je suis dans hue")
      hueStyle = `hue-rotate(${el.value}deg)`
      break;
    case "contrast":
      console.log("je suis dans hue")
      hueStyle = `contrast(${el.value/10})`
      if(el.value = 0){
        hueStyle = `contrast(1)`

      }
      break;

    default:
      console.log(`Sorry, we are out of all id.`);
  }
  console.log(blurStyle + "\n" + sepiaStyle+ "\n" +  brightnessStyle+ "\n" +  grayStyle + "\n" +  hueStyle)
  image.style.filter = blurStyle + sepiaStyle + brightnessStyle + grayStyle + hueStyle;
  // image.style.filter = newStyle;
}
function Change(event){
  var setting = document.getElementById("setting")
  if(setting.statue == "enable"){
    const el = event.target;
    MakeEffect(el)
  } else {
    const el = event.target;
    el.value = 0
  }
}

window.addEventListener('load',
  function() {
    const uploadButton = document.getElementById("LoadImage");
    uploadButton.addEventListener('click', UploadImage);
    var slider = document.getElementsByClassName("setting");
    len = slider.length;
    for (var i = 0; i < len; i++) {
      slider[i].addEventListener("change", Change);
    }
  }, false);


/*
#image{
  blur

}

*/
