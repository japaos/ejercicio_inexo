<?php
require_once ("BASEDATOS.php");

    if(!$conexion){
      echo( "error de conexion a inexoo");
    }
    else
    {   
        $query = "SELECT nombreespecialista,tipoconsulta,estado,atendidos FROM consulta order by atendidos desc";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
          die('Query Failed'. mysqli_error($conexion));
        }
        $tabla='';
        while($row = mysqli_fetch_array($result)) {
            // $tabla.='<tr>
            //             <td>'.$row['nombre_especialista'].'</td>
            //             <td>'.$row['tipoconsulta'].'</td>
            //             <td>'.$row['estado'].'</td>
            //             <td>'.$row['atendidos'].'</td>
            //         </tr>';
            $tabla.='El medico: '.$row['nombreespecialista'].' Con un total de :'.$row['atendidos'].' de pacientes atendidos';
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

