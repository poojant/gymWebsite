function openpop(){
	var modaldocument.getElementById('modal-wrapper').style.display='block'style="width:200px;margin-top:200px;margin-left:160px;"
}
function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
