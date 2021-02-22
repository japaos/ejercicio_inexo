
<?php
require_once ("BASEDATOS.php");

    if(!$conexion){
      echo( "error de conexion a inexoo");
    }
    else
    {   $query='';
        //Extraccion de tabla con pacientes pendientes
        if($_POST['proceso']=='pendiente'){
            $query = "SELECT nombre,historia,edad,prioridad FROM pacientes where estado='pendiente'";
        }
        //Extraccion de tabla con pacientes espera
        if($_POST['proceso']=='espera'){
            $query = "SELECT nombre,historia,edad,prioridad FROM pacientes where estado='zespera'";
        }
        //ejecucion de la consulta sql
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
        }
        echo $tabla;    //string con informacion de salida para la tabla en html


    }




?>