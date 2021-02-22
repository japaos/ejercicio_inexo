
<?php
require_once ("BASEDATOS.php");
$tabla='';
    if(!$conexion){
      echo( "error de conexion a inexoo");
    }
    else
    {   $historia=$_POST['proceso'];
        $query = "SELECT riesgo from pacientes where historia=$historia";
        $result = mysqli_query($conexion, $query);

        if(1==mysqli_num_rows($result)){
          $riesgo=mysqli_fetch_array($result)['riesgo'];
          $query = "SELECT nombre,edad,historia,riesgo from pacientes where riesgo>$riesgo ORDER BY  riesgo ASC";
          $result = mysqli_query($conexion, $query);
          if(!$result) {
            die('Query Failed'. mysqli_error($conexion));
          }
      
          $json = array();
  
          while($row = mysqli_fetch_array($result)) {
              $tabla.='<tr>
                          <td>'.$row['nombre'].'</td>
                          <td>'.$row['edad'].'</td>
                          <td>'.$row['historia'].'</td>
                          <td>'.$row['riesgo'].'</td>
                      </tr>';
          }
        }
        else{
          $tabla.='<tr>
                          <td>No encontrado</td>
                          <td>No encontrado</td>
                          <td>No encontrado</td>
                          <td>No encontrado</td>
                      </tr>';
        }

        echo $tabla;

    }


?>

