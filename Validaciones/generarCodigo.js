function generarCodigo(arrCodigos){
  var nvoCodigo = "";

  var next = val = true;
  while (next) {
    nvoCodigo = codigoRAM();
    if (nvoCodigo.charAt(0) != '0'){
      for (var i = 0; i < arrCodigos.length; i++)
        if (arrCodigos[i] == nvoCodigo) {
          val = false;
          break;
        }
      if (val)
        next = false;
      else
        val = true;
    }
  }

  document.getElementById("cod").innerText = nvoCodigo;
  document.getElementById("codEnv").value = nvoCodigo;
}

function codigoRAM(){
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  var nvoCod = "";

  for (var i = 0; i < 5; i++)
    nvoCod += chars.charAt(Math.floor(Math.random() * chars.length));

  return nvoCod;
}
