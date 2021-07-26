function onClickHandle() {
  var qrcode = new QRCode("qrcode");
  qrcode.clear();

  function makeCode() {
    // var elText = document.getElementById("text");
    // var elText = "http://virtual.ajaramuseums.ge/";
    var elText = "ტესტ";

    console.log(elText.value);
    // if (!elText.value) {
    //   alert("Input a text");
    //   elText.focus();
    //   return;
    // }

    qrcode.makeCode(elText);
  }

  makeCode();

  $("#text")
    .on("blur", function () {
      makeCode();
    })
    .on("keydown", function (e) {
      if (e.keyCode == 13) {
        makeCode();
      }
    });
}
