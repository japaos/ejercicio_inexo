<?php
require_once ("BASEDATOS.php");

    if(!$conexion){
      echo( "error de conexion a inexoo");
    }
    else
    {   
        $query = "SELECT nombre,historia,edad,prioridad FROM pacientes where estado='zespera' and edad>40 order by edad desc";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
          die('Query Failed'. mysqli_error($conexion));
        }
        $tabla='';
        while($row = mysqli_fetch_array($result)) {
            $tabla.='<tr>
                        <td>'.$row['nombre'].'</td>
                        <td>'.$row['edad'].'</td>
                        <td>'.$row['historia'].'</td>
                        <td>'.$row['prioridad'].'</td>
                    </tr>';
                    break;
        }
        echo $tabla;
        // $jsonstring = json_encode($json);
        // echo $jsonstring;

    }

/*     "nombre"=>$filas["NOMBRE"],
    "descripcion"=>$filas["DESCRIPCION"],
    "id"=>$filas["ID"] */


?>

