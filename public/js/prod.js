

function myFunction() {
  var txt;
  if (confirm("Press a button!")) {
    txt = "Silahkan Cetak No Antrian";
  } else {
    txt = "Terima kasih! kami harap anda puas";
  }
  document.getElementById("demo").innerHTML = txt;
}



