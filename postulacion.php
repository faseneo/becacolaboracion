<?php
include ('seguridad3.php');
// Se crea formulario para postular a beca colaboracion 2018, basado en el formulario becas.php, fsegovia : 19122017
//$rut="18486804-0";
  $id=$_SESSION["id"];
  $rut=$_SESSION["rut"];
  $nombre = $_SESSION["nom"]." ".$_SESSION["apepat"]." ".$_SESSION["apemat"];
  $sexo=$_SESSION["sex"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Beneficios 2018 - Universidad Metropolitana de Ciencias de la Educación</title>
  <meta name="description" content="umce beneficios">
  <meta name="author" content="umce">
  <meta name="robots" content="noindex"/>
  <meta name="robots" content="nofollow">  

  <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> -->
    <link href="../img/templates/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script type="text/javascript">
        var rut0='<?php echo $_SESSION["rut"]; ?>';
    </script>
    <script src="js/funcionesfiles.js"></script>
    <style type="text/css">
      .loader {
        border: 6px solid #f3f3f3; /* Light grey */
        border-top: 6px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 2s linear infinite;
        /*display: none;*/
      }

      @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
      }
      .logos{
        display: none;
      }
      #logopostula{
        display: block;
      }
      #importante{
        text-align:center;
        color:red !important;
        font-weight:bold;
      }
      
      @media print{
        @page {
          margin: 0;
        }
        body {
          margin: 2cm; 
        }
        #importante{
          text-align:center;
          color:red !important;
          font-weight:bold;
        }

      }
    </style>
  </head>
  <body>
  <div id="imprimible">
    <?php include "cabecera.php"; ?>
    <div class="container">
      <div class="row" id="descripcion">
        <div class="col-sm-12">
            <h5 id="importante">Tu postulación NO HA CONCLUIDO.</h5>
            <hr>
            <p>Debes imprimir este formulario y presentarlo en Bienestar Estudiantil, junto a:</p>
            <ul>
              <li>Fotocopia de tu cédula de identidad vigente</li>
              <li>Cartola de Registro Social de Hogares.</li>
            </ul>
            <br>
            <table class="table table-striped table-bordered">
              <tbody id="datosalumno">
              </tbody>
            </table>
            <h5>LOS DEPÓSITOS DE ESTA BECA SE REALIZAN EN TU CUENTA RUT DEL BANCO ESTADO;  RECUERDA ACTIVARLA.</h5>
        </div>
      </div>
      <div class="row" id="mensajefinal">
        <div class="col-sm-12">
          <h5 style="text-align:center;color:blue;"><strong>Tu postulación ha concluido exitosamente.</strong></h5>
          <table class="table table-striped table-bordered">
            <tbody id="datosalumno">
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- /container -->
  </div>
  <div class="container">
    <br><br>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <center><button type='submit' class='btn btn-primary' onclick="printDiv()">Imprimir</button></center>
          </div>
        </div>
        <br>
        <div class="row" id="linksalir">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <p class="salir" id="salir"></p>
          </div>
        </div>
  </div>
  
  </body>
</html>
