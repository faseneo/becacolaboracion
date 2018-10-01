<?php
include('../conectar.php');
include('../seguridad3.php');
$becas=$_GET['var2'];
$rut=$_GET['var'];

$pregunta = $con->query("SELECT ap_pat_alum,ap_mat_alum,nombres_alum,sexo_alum,otras_becas_alum,correo_alum,telefono_alum,fecha_postula,nombre_car 
  FROM alumnos, carreras WHERE rut_alum ='$rut' and cod_carrera_alum = codigo_car");
$fil = $pregunta->fetch_array(MYSQLI_ASSOC);
$ap_pat_alum = $fil['ap_pat_alum'];
$ap_mat_alum = $fil['ap_mat_alum'];
$nombres = $fil['nombres_alum'];
$sexo = $fil['sexo_alum'];
$nombre = $nombres." ".$ap_pat_alum." ".$ap_mat_alum;
$postula = $fil['otras_becas_alum'];
$correo = $fil['correo_alum'];
$telefono = $fil['telefono_alum'];
$fecha = $fil['fecha_postula'];
$carrera = $fil['nombre_car'];
$newDate = date("d/m/Y", strtotime($fecha));
//$fecha2=date_fomat('d-m-Y', $fecha);
//echo 'Has escogido la beca:"'.$becas.'" ';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Impresión de formulario</title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet"><link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  <!-- Javascript para agregar campos en forma dinámica Luis García 2013 -->
  <link rel="shortcut icon" href="../img/templates/favicon.ico">

  <script type="text/javascript">
    function printDiv(imprimir) {
     var contenido= document.getElementById(imprimir).innerHTML;
     var contenidoOriginal= document.body.innerHTML;
     document.body.innerHTML = contenido;
     window.print();
     document.body.innerHTML = contenidoOriginal;

     $("#my-file-selector").change(function() {
            var archivos = document.getElementById("my-file-selector");//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
            var archivo = archivos.files; //Obtenemos los archivos seleccionados en el imput
            if(archivo.length===0){
                $("#upload-file-info").append("No ha seleccionado archivos para subir");
            }else{
                
                for(i=0; i<archivo.length; i++){
                    var lista="<tr>";
                    lista += "<td>"+archivo[i].name+"</td>";
                    lista += "<td>"+returnFileSize(archivo[i].size)+"</td>";
                    /*lista += "<td><button type='button' id='quitarfile' class='close' onclick='quitafile(\'"+i+"\')'>&times;</button></td>";*/
                    lista += "</tr>";
                    $("#listaArchivosMemo").append(lista);                    
                }
            }
        });
   }
 </script>
 <style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  h4.page-header{
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: 40px;
    color: #333;
    border: 0;
    border-bottom: 1px solid #E5E5E5;
    font-weight: normal;
  }
</style> 
</head>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Beneficios</a>
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
  <div class="container" id="container">
    <!-- Cabecera del formulario -->
    <div id="form">
      <div class="row-fluid">
        </br></br>
        <div class="span2">&nbsp;</div>
        <div class="span8" style="text-align:center"><h3>Postulación a Beca Colaboración 2018</h3></div>
        <div class="span2">&nbsp;</div>
      </div>
      <div class="row-fluid">
        <div class="span2">&nbsp;</div>
        <div class="span8" style="text-align:center"><img src="bootstrap/img/Logo_umce.jpg" class="img-rounded"></div>
        <div class="span2">&nbsp;</div>
      </div>
      </br></br>
      <div class="row-fluid">
        </br></br>
        <div span style="color:red"><center><h7><strong>Tu postulación NO HA CONCLUIDO.</strong></h7></center></div>
        <br><br>
          <table class="table table-striped table-bordered">
            <tr>
              <td>Rut: <?php echo $rut; ?></td>
              <td>Nombre: <?php echo $nombre; ?></td> 
              <td>Fecha de postulación: <?php echo $newDate; ?></td> 
            </tr>
            <tr>
              <td colspan="2">Correo: <?php echo $correo; ?></td> 
              <td>Teléfono: <?php echo $telefono; ?></td> 
            </tr>
            <tr>
              <td colspan="3"><?php echo $carrera; ?></td> 
            </tr>
            <tr>
              <td colspan="3">Beca a la que postula: <strong><?php echo $becas; ?></strong></td>
            </tr>
          </table>
        </br>
        <div>
          <p>Debes subir los siguientes archivo en formato PDF :</p>
          <ul>
            <li>Fotocopia de tu cédula de identidad vigente:
            <label class="btn btn-primary" for="my-file-selector"><span id="nombrefile8" tabindex="4"></span>
                <input id="my-file-selector" name="my-file-selector" type="file" accept=".pdf, .doc" multiple style="display:none">Agregar archivo
            </label>
            </li>
            <li>Cartola de Registro Social de Hogares: 
            <div id="div_FILE" class="tooltip_FILE">
              </div>
              <input type="file" name="file8" id="file8" class="inputfile inputfile-verde" data-multiple-caption="{count} files selected" onchange=" llamaimput(this, 'nombrefile8', 'peso8'); ">
              <label for="file8">
                <span id="nombrefile8" tabindex="4"></span>
                <strong>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                  <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                  </svg>
                  Examinar
                </strong>
              </label>
              </div></li>
          </ul>
        </div>
      </div>
    </div>
    <center><button type='submit' class='btn btn-primary'>Subir Archivos</button></center>
  </div>
</body>
</html>