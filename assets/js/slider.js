"use strict";

function preview_image(event) {
  document.getElementById("row-display").style.display = "block";
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById("output_image");
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}
