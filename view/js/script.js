// Disable form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
})();

function loadInfo(travlerId){
  let request = new XMLHttpRequest();
  request.onload = function () {
    if (this.status == 200) {
      let details = JSON.parse(this.responseText);
      //fullName, dateR, line, dateD, planName, price
      document.getElementById("fullName").innerHTML = details["travler"]["first_name"]+" "+details["travler"]["last_name"];
      document.getElementById("dateR").innerHTML = details["reserve"]["date_resevation"];
      document.getElementById("line").innerHTML = "<b>"+ details["flight"]["depart"]+ "</b> To <b>"+details["flight"]["distination"]+"</b>";
      document.getElementById("dateD").innerHTML = details["flight"]["date_flight"];
      document.getElementById("planName").innerHTML = details["flight"]["plane_name"];
      document.getElementById("price").innerHTML = details["flight"]["price"]+"DH";
    }
  }
  request.open("GET", "../controller/reserve_details.php?id="+travlerId, true);
  request.send();
}