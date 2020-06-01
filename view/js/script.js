function loadInfo(P_ID) {
    let request = new XMLHttpRequest();
    request.onload = function() {
        if (this.status == 200) {
            let details = JSON.parse(this.responseText);
            //fullName, dateR, line, dateD, planName, price
            document.getElementById("fullName").innerHTML = details["travler"]["first_name"] + " " + details["travler"]["last_name"];
            document.getElementById("dateR").innerHTML = details["reserve"]["date_resevation"];
            document.getElementById("line").innerHTML = "<b>" + details["flight"]["depart"] + "</b> To <b>" + details["flight"]["distination"] + "</b>";
            document.getElementById("dateD").innerHTML = details["flight"]["date_flight"];
            document.getElementById("planName").innerHTML = details["flight"]["plane_name"];
            document.getElementById("price").innerHTML = details["flight"]["price"] + "DH";
        }
    }
    request.open("GET", "../controller/details_reservation.php?id=" + P_ID, true);
    request.send();
}