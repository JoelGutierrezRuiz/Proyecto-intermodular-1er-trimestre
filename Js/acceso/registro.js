const email = document.getElementById("email-cliente");
const userName = document.getElementById("nombre-cliente");
const dir = document.getElementById("direccion-cliente");
const pwd = document.getElementById("pwd-cliente");



let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioCliente/controlador/index.php";
var user = null;
const errorMsg = document.getElementById("login-error");




async function register(event) {

    event.preventDefault();

    validateForm();

    let cliente = {
        "email": email.value,
        "pwd": pwd.value,
        "direccion": dir.value,
        "nombre": userName.value
    }
    let header = {
        "method": "POST",
        "headers": { "Content-Type": "aplication/json" },
        "body": JSON.stringify(cliente)
    };

    const res = await fetch(url, header);
    user = await res.json();
    if (user) {
        event.target.submit();
    }
    else {
        if(email.value && pwd.value){
            errorMsg.innerHTML="El usuario ya existe!";
        }
        else{
            errorMsg.innerHTML="Rellena los campos en rojo!"      
        }
        errorMsg.style.display = "flex";
    }

}


function validateForm(){
    if(!email.value){
        email.style.border="2px solid red";
    }
    else{
        email.style.border="2px solid gray";  
    }
    if(!userName.value){
        userName.style.border="2px solid red";
    }
    else{
        userName.style.border="2px solid gray";  
    }
    if(!dir.value){
        dir.style.border="2px solid red";
    }
    else{
        dir.style.border="2px solid gray";  
    }
    if(!pwd.value){
        pwd.style.border="2px solid red";
    }
    else{
        pwd.style.border="2px solid gray";  
    }
}