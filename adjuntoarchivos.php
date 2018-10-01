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
    </style>
  </head>
  <body>
    <?php include "cabecera.php"; ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h3 style="text-align:center"><?php if($sexo=='M'){echo "Bienvenido:";}else{echo "Bienvenida:";}?> <?php echo utf8_encode($nombre); ?></h3>
          <hr>
        </div>
      </div>  
      <div class="row" id="descripcion">
        <div class="col-sm-12">
          <h5 style="text-align:center;color:red;"><strong>Tu postulación NO HA CONCLUIDO.</strong></h5>
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
      <!-- Comienzo del formulario UMCE por Luis García Manzo -->
        <div class="row" id="subearchivos">
          <form  role="form" name="formularioarchivos" id="formularioarchivos" enctype="multipart/form-data" method="post">
            <input type="hidden" name="rut" id ="rut" value="<?php echo $rut; ?>">
            <input type="hidden" name="id" id ="id" value="<?php echo $id; ?>">
            <input type="hidden" name="Accion" id ="Accion" value="">
            <input type="hidden" name="email" id ="email" value="">
            <div class="col-sm-12">
              <h5><strong>Subir archivos</strong></h5>
              <p>Debes subir los siguientes archivos en formato <strong>PDF</strong> para concluir con tu postulación:</p>
               <table class="table table-striped table-bordered">
                  <tbody id="datosarchivos">
                    <tr>
                      <td><li>Fotocopia de tu cédula de identidad vigente:</li></td>
                      <td><input type="file" name="cedula" id="cedula" accept=".pdf" requerid></td>
                    </tr>
                    <tr>
                      <td><li>Cartola de Registro Social de Hogares :  </li></td>
                      <td><input type="file" name="registrosocial" id="registrosocial" accept=".pdf" requerid></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </form>
        </div>
        <div class="row" id="botonenviar" style="text-align:center;">
          <div class="col-sm-4 col-sm-offset-4" >
            <br>
            <button type="button" id="enviar" name="enviar" class="btn btn-primary">Subir Archivos</button>
          </div>
        </div> <br><br><br>
        <div class="row" id="linksalir">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <p class="salir" id="salir"></p>
          </div>
        </div>
    </div> <!-- /container -->
    <!-- Modal mensajes cortos-->
    <div class="modal fade" id="myModalLittle" tabindex="-1" role="dialog" aria-labelledby="myModalLittleLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Mensaje</h4>
          </div>
          <div class="modal-body">
            <p id="msg" class="msg"></p>
          </div>
          <div class="modal-footer">
            <button type="button" id="cerrarModalLittle" class="btn btn-default" data-dismiss="modal">Terminar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalCargando" tabindex="-1" role="dialog" aria-labelledby="ModalCargandoLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cargando Archivos</h4>
          </div>
          <div class="modal-body">
            <div class="loader"></div>
            <!-- <p id="msg" class="msg"></p> -->
          </div>
          <div class="modal-footer">
           <!--  <button type="button" id="cerrarModalCargando" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
          </div>
        </div>
      </div>
    </div>    
  </body>
</html>
