function indigo() {
  document.getElementById("prawy").style.backgroundColor = "indigo";
}
function steelblue() {
  document.getElementById("prawy").style.backgroundColor = "steelblue";
}
function olive() {
  document.getElementById("prawy").style.backgroundColor = "olive";
}
function changecolor() {
  let a = document.getElementById("lista").value;
  document.getElementById("prawy").style.color = a;
}
function changesize() {
  let a = document.getElementById("czcionka").value;
  document.getElementById("prawy").style.fontSize = a;
}
function changeborder() {
  if (document.getElementById("box").checked) {
    document.getElementById("zdjecie").style.border = "1px solid white";
  } else {
    document.getElementById("zdjecie").style.border = "none";
  }
}
function radio(arg) {
  let lista = document.getElementById("lista2");
  switch (arg) {
    case 1:
      lista.style.listStyle = "disc";
      break;
    case 2:
      lista.style.listStyle = "square";
      break;
    case 3:
      lista.style.listStyle = "circle";
      break;
  }
}
