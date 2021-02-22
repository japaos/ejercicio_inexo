
<?php


require_once ("BASEDATOS.php");

    if(!$conexion){
      echo( "error de conexion a BD inexoo");
    }
    else{
        $bar=$_POST;
        if(!empty($bar["proceso"])){
            if($bar["proceso"]=="guardar")
                {
                    $var=array();
                    foreach($bar as $v){
                        array_push($var,$v);
                    }

                    $query="SELECT historia FROM PACIENTES WHERE historia='$var[2]'";
                    $result=mysqli_query($conexion,$query);
                    print_r($result);
                    if(1==mysqli_num_rows($result)){
                        echo("ya existe el paciente");
                    }
                    else{
                        $asignacion='urgencia';
                        if($var[3]>4){
                            $asignacion='urgencia';
                        }
                        else if($var[3]<=4 && $var[1]<16){
                            $asignacion='pediatria';
                        }
                        else{
                            $asignacion='cgi';
                        }
                        $query="INSERT INTO `pacientes` (`id`,`nombre`, `historia`, `edad`,prioridad,riesgo,asignacion) VALUES (NULL,'$var[0]', '$var[2]', '$var[1]', '$var[3]', '$var[4]','$asignacion')";
                        $result=mysqli_query($conexion,$query);
                        if($bar['edad']<16){
                            $query="INSERT INTO `p_ninno` (`id`,`peso_e`) VALUES ('$var[2]','$var[5]')";
                            $result=mysqli_query($conexion,$query);
                        }
                        elseif($bar['edad']<41){
                            $query="INSERT INTO `p_joven` (`id`,`fumador`) VALUES ('$var[2]','$var[5]')";
                            $result=mysqli_query($conexion,$query);
                        }
                        else{
                            $query="INSERT INTO `p_anciano` (`id`,`dieta`) VALUES ('$var[2]','$var[5]')";
                            $result=mysqli_query($conexion,$query);
                        }    

                        echo("Paciente almacenado con exito");
                    }

                    $msg=array();
                    
                }
            else
                {
                    $var=array();
                    foreach($bar as $v){
                        array_push($var,$v);
                    }

                    $query="SELECT id FROM consulta WHERE id='$var[1]'";
                    $result=mysqli_query($conexion,$query);
                    if(1==mysqli_num_rows($result)){
                        echo("ya existe el consulta");
                    }
                    else{
                        $query="INSERT INTO `consulta` (`id`,`nombreEspecialista`, `CantPacientes`, `tipoconsulta`,estado,atendidos) VALUES ('$var[1]','$var[0]', '$var[2]', '$var[4]', '$var[3]', 0)";
                        $result=mysqli_query($conexion,$query);    
                        echo($result);

                        echo("Consulta almacenada con exito");
                    }

                    $msg=array();
                    
                }
            }
         else{
            echo("no encontro ajax proceso");
            }
    }        
?>
