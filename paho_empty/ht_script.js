function panel(np) {
  document.getElementById('ht_press').style.display = "none";
  document.getElementById('ht_photos').style.display = "none";
  document.getElementById('ht_video').style.display = "none";
  document.getElementById('ht_tech').style.display = "none";
  var imagem = document.getElementById("ht_panel");
  imagem.setAttribute("src", "http://new.paho.org/hq/images/panel_"+np+".png");
  document.getElementById(np).style.display = "block";
}
