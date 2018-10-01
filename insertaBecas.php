<?php
include('../conectar.php');
$becas=$_POST['becacolaboracion'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$rut=$_POST['rut'];
//echo $becas;
//echo $rut;
var_dump($_POST);


//Inserta datos del alumno
//$guardabeca="UPDATE alumnos SET postula_beca_alum ='$becas', correo_alum = '$correo', telefono_alum = '$telefono', fecha_postula = now() WHERE rut_alum = '$rut'";
/*if (!mysqli_query($con,$guardabeca))
  {
  die('Error: ' . mysqli_error($con));
  }*/

/*mysqli_close($con); */
echo"<script>alert('Beca Insertada.');window.location.href=\"http://beneficios.umce.cl/becacolaboracion/res.php?var=$rut&var2=$becas\"</script>";
?>