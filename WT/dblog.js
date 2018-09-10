function abtme(){
    window.open("aboutme.html");
}
function schedme(){
    window.open("sched.html");
}
function progme(){
    window.open("prog.html");
}
function contactme(){
    window.open("contactme.html");
}
function carme(){
    window.open("carcollection.html");
}
function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
function validateemail()  
{  
var x=document.myForm.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }  
} 