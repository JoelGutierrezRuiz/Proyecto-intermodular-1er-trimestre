let serverIp = "localhost"
let url = "http://" + serverIp + "/Api/ServicioCliente/controlador/index.php";
let email = document.getElementById("email-cliente");
let pwd = document.getElementById("pwd");
let pwdOn = document.getElementById("pwd-on");
const pwdOff = document.getElementById("pwd-off");
var user = null;
const errorMsg = document.getElementById("login-error");


async function login(event) {

  event.preventDefault();

  let cliente = { "email": email.value, "pwd": pwd.value }
  let header = {
    "method": "POST",
    "headers": { "Content-Type": "aplication/json" },
    "body": JSON.stringify(cliente)
  };


  const res = await fetch(url, header);
  user = await res.json();

  console.log(event.target)

  if (user) {
    event.target.submit();
  }
  else {
    errorMsg.style.display="flex";
  }

}


pwdOn.addEventListener("click",()=>{
  pwdOn.style.display="none";
  pwdOff.style.display="inline";
  pwd.type="password";

});

pwdOff.addEventListener("click",()=>{
  pwdOff.style.display="none";
  pwdOn.style.display="inline";
  pwd.type="text";
});