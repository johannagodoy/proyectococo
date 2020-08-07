<?php
if ($conexion = mysqli_connect ("127.0.0.1", "root",''));
mysqli_select_db($conexion, "proyectococo");

$dni= $_POST ['Dni'];
$nombre= $_POST ['nombre'];
$apellido = $_POST ['apellido'];
$correo = $_POST ['correo'];
$telefono = $_POST ['telefono'];
$contraseña = $_POST ['contraseña'];

if ($q= "SELECT dni FROM registrocl WHERE dni=$dni") {
$reg = mysqli_query ($conexion, $q);
  $dni_reg= mysqli_fetch_array($reg);

  if ($dni_reg ['dni']==$dni) {
    echo "ya se encuentra registrado";
  } else {

    $consulta= "INSERT INTO registrocl (id,dni,nombre,apellido,correo,telefono,contraseña) VALUES ('', '$dni', '$nombre', '$apellido', '$correo', '$telefono','$contraseña')";

    if (mysqli_query ($conexion, $consulta)) {
      echo "registro agregado";
  }else {
      echo "no se agrego";
    }
  }
}else {
  echo "mysql no reconoce el usuario";
}
 ?>
