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
    <script src="js/funcionesalbeca.js"></script>
    <style type="text/css">
      #logopostula{
        display: none;
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
          <h4>Beca de Colaboración</h4>
          <p style="text-align:justify;">Consiste en un estímulo en dinero mensual para los estudiantes que presentan el interés de contribuir a su casa de estudios, a través de la realización de tareas, que permitan afianzar su identidad y favorecer a la formación de cada uno de ellos, además de apoyarlos económicamente.<br><br>
            Para el año 2018, existen 15 becas disponibles en los distintos departamentos o unidades que requieran de estudiantes para desempeñar labores al interior de la institución.<br><br>
            Tendrán prioridad cuando corresponda, los estudiantes que hayan obtenido el beneficio en el año anterior y que cumplan con los requisitos establecidos para cada tipo de beca.<br><br>
            Revise los requisitos de postulación en el
            <a href="reglamento/2017_N_101342_Res_Ex_aprueba_Reglamento_General_de_Becas_que_indican_para_alumnos_de_pregrado.pdf">Reglamento de Becas Internas</a>
          </p>
        </div>
      </div>
      <br>
      <!-- Comienzo del formulario UMCE por Luis García Manzo -->
      <form  role="form" name="formulariopostulacon" id="formulariopostulacon" method="post">
        <input type="hidden" name="rut" id ="rut" value="<?php echo $rut; ?>">
        <input type="hidden" name="id" id ="id" value="<?php echo $id; ?>">
        <input type="hidden" name="Accion" id ="Accion" value="">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <!-- <h5><strong>Seleccione una alternativa</strong></h5> -->
          </div>
        </div>                
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <div class="form-group">
              <select name='becacolaboracion' id='becacolaboracion' class="form-control">
<!--                 <option value='No postula'>No deseo postular</option> -->
                <option value='Beca Colaboracion'>Beca Colaboración</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3" style="text-align:center;">
            <h5><strong>Ingresa tu correo y teléfono.</strong><br>
            Si no tienes el correo de la UMCE, puedes solicitar activación <a href="http://146.83.132.24/correos/">aquí</a> </h5>
          </div>
        </div>        
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 form-inline" style="text-align:center;">
            <input type="text" class="form-control" name="correo" id="correo" placeholder="correo@mimail.com" required />
            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="12" value="+569" required />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <br>
            <button type="button" id="enviar" name="enviar" class="btn btn-primary">Continuar con la Postulación</button>
            <button type="button" id="modificar" name="modificar" class="btn btn-warning">Modificar Postulación</button>
            <button type="button" id="reenviar" name="reenviar" class="btn btn-primary">Reingresar Postulación</button>
          </div>
        </div> <br>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
            <p class="salir" id="salir"></p>
          </div>
        </div>
      </form>
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
            <button type="button" id="cerrarModalLittle" class="btn btn-default" data-dismiss="modal">Continuar</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
