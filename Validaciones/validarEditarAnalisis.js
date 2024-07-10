function validarEditarAnalisis() {
  fch = new Date(document.getElementById("fchE").value);
  tpoAna = document.getElementById("tpoAnaE").value.trim();
  fchAct = new Date(document.getElementById("fchActE").value);

  //Validamos que no sobrepase la fecha actual
  if ((fch.getTime()/1000/60/60/24) - (fchAct.getTime()/1000/60/60/24) > 0) {
    alert("La Fecha debe de ser menor o igual a la fecha actual: " + (fchAct.getDate()+1)+"/"+(fchAct.getMonth()+1)+"/"+fchAct.getFullYear());
    return false;
  }

  //Tipo de analisis no vacio
  if (tpoAna.length == 0) {
    alert("Por favor ingrese el tipo de analisis");
    document.getElementById("tpoAnaE").value = "";
    return false;
  }

  //Parte del PDF
  var doc = document.getElementById("docE").value;
  if (doc != "") {
    if (!extencionPDF(doc))
      return false;
  }
  //Si todo salio bien
  document.getElementById("tpoAnaE").value = tpoAna;
  return true;
}

function extencionPDF(doc){
  var expExt = /(.pdf)$/i;
  if (doc != "") {
    if (!expExt.exec(doc)){
      alert("El documento a subir debe de ser PDF, por favor vuelva a subir el documento");
      document.getElementById("docE").value = "";
      return false;
    }
  }
  return true;
}
