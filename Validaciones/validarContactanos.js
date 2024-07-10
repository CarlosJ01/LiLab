function validarContactanos(){
  //Datos del formulario
  nom =  document.getElementById("nom").value.trim();
  tel = document.getElementById("tel").value.trim();
  email = document.getElementById("email").value.trim();
  sms = document.getElementById("sms").value.trim();

  //Nombre solo letras
  if (nom.length <= 45){
    if (nom.length == 0){
      alert("Por favor ingrese un nombre");
      document.getElementById("nom").value = "";
      return false;
    }
    if (!soloLetras(nom,"nombre"))
      return false;
  }
  else {
    alert("Tu nombre no puede tener mas de 45 caracteres o espacios");
    return false;
  }

  //Telefono solo numeros + y -
  if (tel.length <= 20) {
    if (tel.length == 0){
      alert("Por favor ingrese un numero de telefono");
      document.getElementById("tel").value = "";
      return false;
    }
    if (!telefono(tel))
      return false;
  } else {
    alert("Tu numero de telefono no puede tener mas de 20 numeros o espacios");
    return false;
  }

  //email no supera los 100 caracteres y termina en .com o .mx o .edu
  if (email.length <= 100) {
    if (email.length != 0)
      if (!correo(email))
        return false;
  }else {
    alert("Tu correo electronico no puede tener mas de 100 caracteres");
    return false;
  }

  //El comentario no puede estar vacio
  if (sms.length <= 0) {
    alert("Por favor escribe un mensaje");
    document.getElementById("sms").value = "";
    return false;
  }

  //Si todo salio bien quitamos los espacios al principio y al final
  document.getElementById("nom").value = nom;
  document.getElementById("tel").value = tel;
  document.getElementById("email").value = email;
  document.getElementById("sms").value = sms;
  return true;
}

function soloLetras(cad, camp){
  exp = /^[a-zA-ZñÑáéíóú\s]+$/;
  if (!exp.exec(cad)){
    alert("El campo "+camp+" solo puede contener letras y espacios");
    return false;
  }
  return true;
}

function telefono(tel){
  exp = /^[0-9+-\s]+$/;
  if (!exp.exec(tel)){
    alert("El numero telefonico solo puede contener numeros, espacios y los simbolos de + y -");
    return false;
  }
  return true;
}

function correo(email){
  exp = /(.com|.mx|.edu)$/i;
  if (!exp.exec(email)){
    alert("El correo electronico debe de terminar en .com o .mx o .edu");
    return false;
  }
  return true;
}
