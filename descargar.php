<?php
  $cod = $_POST["cod"];
  include("bd.php");
  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
  $rsl = bd_consulta($qry);
  if (mysqli_fetch_assoc($rsl)["existe"] == 1) {
    $qry = 'SELECT CONCAT(nombre, " ", apellidoP, " ", apellidoM) AS nombreC
            FROM paciente WHERE codigoPaciente = "'.$cod.'"';
    $res = bd_consulta($qry);
    $nom = mysqli_fetch_assoc($res)["nombreC"];
    ?>
    <!--Tabla de resultados -->
    <div style="text-align: center;">
      <h4>Bienvenido <?php echo $nom ?></h4>
      <h5>aquí tienes tus análisis clínicos</h5>
    </div>

      <table class="table table-md table-light table-hover shadow my-5" style="color:white;background-color:#52575C; border-radius:20px;">
      <thead>
        <tr style="background-color:#3185E1 ;color:white;">
          <th scope="col">Tipo de Análisis</th>
          <th scope="col">Disponible hasta</th>
          <th scope="col">Descarga</th>
        </tr>
      </thead>
      <tbody style="background-color:#15487F;color:white;">

      <?php
        $qry = 'SELECT * FROM analisis WHERE codigoPaciente = "'.$cod.'" ORDER BY caduca DESC';
        $res = bd_consulta($qry);
        $vacio = true;
        while ($row = mysqli_fetch_assoc($res)) {
          $row["caduca"] = substr($row["caduca"],8,2)."/".substr($row["caduca"],5,2)."/".substr($row["caduca"],0,4);
          $vacio = false;
        ?>

          <tr class="bg-white text-dark">
            <td style="font: bold;"><?php echo $row["tipoAnalisis"]; ?></td>
            <td><?php echo $row["caduca"]; ?></td>
            <td><a href="<?php echo $row["rutaPDF"]; ?>" target="_blank">Descargar</a></td>
          </tr>

        <?php
        }
      ?>

      </tbody>
    </table>
    <?php
    if ($vacio) {
      ?>
        <h6 style="text-align: center; color: #ec1c24;">No tiene análisis disponibles</h6>
      <?php
    }
  }else {
    ?>
      <h6 style="text-align: center; color: #ec1c24;">Código incorrecto, intente con otro o comuníquese con el laboratorio.</h6>
    <?php
  }
?>
