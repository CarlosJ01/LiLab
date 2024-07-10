function validarFormularioPaciente() {
  //Informacion del Paciente
  nom = document.getElementById("nom").value.trim();
  apePat = document.getElementById("apePat").value.trim();
  apeMat = document.getElementById("apeMat").value.trim();
  tel = document.getElementById("tel").value.trim();

  //Requerido no vacios
  if (nom.length == 0) {
    alert("Por favor ingrese el nombre del paciente");
    document.getElementById("nom").value = "";
    return false;
  }
  if (apePat.length == 0) {
    alert("Por favor ingrese el apellido paterno del paciente");
    document.getElementById("apePat").value = "";
    return false;
  }
  if (tel.length == 0) {
    alert("Por favor ingrese el numero de telefono del paciente");
    document.getElementById("tel").value = "";
    return false;
  }
  if (apeMat.length == 0)
    apeMat = " ";

  //Longitud de cadena
  if (nom.length > 100){
    alert("El nombre no puede tener mas de 100 caracteres");
    return false;
  }
  if (apePat.length > 100){
    alert("El apellido paterno no puede tener mas de 100 caracteres");
    return false;
  }
  if (apeMat.length > 100){
    alert("El apellido materno no puede tener mas de 100 caracteres");
    return false;
  }
  if (tel.length > 20){
    alert("El numero de telefono no puede tener mas de 20 numeros o espacios");
    return false;
  }

  //Solo letras en el nombre
  if(!(soloLetras(nom, "nombre") && soloLetras(apePat, "apellido paterno") && soloLetras(apeMat, "apellido materno")))
    return false;

  //Numero de telefono
  if (!telefono(tel))
    return false;

  //Si todo sale bien
  document.getElementById("nom").value = nom;
  document.getElementById("apePat").value = apePat;
  document.getElementById("apeMat").value = apeMat;
  document.getElementById("tel").value = tel;
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
