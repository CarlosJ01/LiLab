function validarModificarUsuario(usuarios){
  //Datos Personales
  var nom = document.getElementById("nomU").value,
      apePat = document.getElementById("apePatU").value,
      apeMat = document.getElementById("apeMatU").value;

  if (apeMat==""){
    document.getElementById("apeMatU").value = " ";
    apeMat = " ";
  }

  if (!(soloLetras(nom,"Nombre") && soloLetras(apePat,"Apellido Paterno") && soloLetras(apeMat,"Apellido Materno")))
    return false;

  //Datos Usuario
  var nick = document.getElementById("nick").value,
      usrAct = document.getElementById("nickAct").value,
      pass = document.getElementById("pass").value,
      passRep =  document.getElementById("passRep").value;

  if (!usuarioRepetido(nick,usuarios,usrAct))
    return false;

  if (!passwordIgual(pass,passRep))
      return false;
  //Si todo salio bien
  return true;
}

function soloLetras(cad, camp){
  var exp = /^[a-zA-Zñáéíóú\s]+$/;
  if (!exp.exec(cad)){
    alert("El campo "+camp+" solo puede contener letras y espacios");
    return false;
  }
  return true;
}

function usuarioRepetido(usr, usrs, usrAct){
    for (var i = 0; i < usrs.length; i++) {
      if (usr == usrs[i] && usr != usrAct) {
        alert("Nickname seleccionado ya existe, ingrese otro");
        document.getElementById("nick").value = "";
        return false;
      }
    }
    return true;
}

function passwordIgual(pass01, pass02){
  if (pass01 != pass02){
    alert("Las contraeñas no coinciden, vuelve a ingresarlas");
    document.getElementById("pass").value = "";
    document.getElementById("passRep").value = "";
    return false;
  }
  return true;
}
