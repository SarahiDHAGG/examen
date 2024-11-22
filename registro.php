
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php
$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$id = $_POST["id"] ;
$id_materia = $_POST["id_materia"] ;
$nombre = $_POST["nombre"] ;
$ape_p = $_POST["ape_p"] ;
$ape_m = $_POST["ape_m"] ;
$edad = $_POST["edad"] ;
$grado = $_POST["grado"] ;
$fecha_registro = $_POST["fecha_registro"] ;

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        
        $datab = "secundaria";
        
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        $instruccion_SQL = "INSERT INTO alumnos (id, id_materia, nombre, ape_p, ape_m, edad, grado,fecha_registro)
                             VALUES ('$id','$id_materia','$nombre','$ape_p','$ape_m','$edad','$grado','$fecha_registro',)";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        
        $consulta = "SELECT * FROM alumnos";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>id Materia </th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Apellido Paterno</th></h1>";
echo "<th><h1>Apellido Materno</th></h1>";
echo "<th><h1>Edad</th></h1>";
echo "<th><h1>Grado</th></h1>";
echo "<th><h1>Fecha de registro</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['id_materia']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre'] . "</td></h2>";
    echo "<td><h2>" . $colum['ape_p'] . "</td></h2>";
    echo "<td><h2>" . $colum['ape_m']. "</td></h2>";
    echo "<td><h2>" . $colum['edad']. "</td></h2>";
    echo "<td><h2>" . $colum['grado'] . "</td></h2>";
    echo "<td><h2>" . $colum['fecha_registro'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';


?>