<?php
require_once ("BASEDATOS.php");
$tabla='';
    if(!$conexion){
      echo( "error de conexion a inexoo");
    }
    else
    {  
        if($_POST['proceso']=='atender1'){
            $query="SELECT id,estado,tipoconsulta FROM consulta WHERE estado='libre'";
            $consultas=mysqli_query($conexion,$query);
            $libre=[0,0,0];
            $hcgi=array();$hur=array();$hped=array();
            if(mysqli_num_rows($consultas)>0){

                while($filas=mysqli_fetch_array($consultas)){
                    $libre[0]=($filas["tipoconsulta"]=='cgi')+$libre[0];
                    $libre[1]=($filas["tipoconsulta"]=='urgencia')+$libre[1];
                    $libre[2]=($filas["tipoconsulta"]=='pediatria')+$libre[2];
                    if($filas["tipoconsulta"]=='cgi'){array_push($hcgi,$filas["id"]);}
                    if($filas["tipoconsulta"]=='urgencia'){array_push($hur,$filas["id"]);}
                    if($filas["tipoconsulta"]=='pediatria'){array_push($hped,$filas["id"]);}
                }
                if($libre[0]>0){
                    $query = "SELECT historia,id from pacientes where (edad>15 and edad<41) and prioridad<=4 and (estado='zespera'or estado='pendiente') order by prioridad DESC, estado desc ";
                    $result = mysqli_query($conexion, $query);
                    $n=0;
                    if(mysqli_num_rows($result)>0){
                        while($r=mysqli_fetch_array($result)){
                            if($n<$libre[0]){
                                $query = "UPDATE `pacientes` SET `estado` = 'atendido' WHERE `pacientes`.`historia` = '$r[historia]'";
                                $uno = mysqli_query($conexion, $query);
                            }
                            $n=$n+1;
                            
                       } 
                       for($i=0;$i<=$n;$i++){
                        $g=$hcgi[$i];   
                        $query = "UPDATE `consulta` SET `estado` = 'ocupado' WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                        $query = "UPDATE `consulta` SET `atendidos` = ('atendidos'+1) WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                       }
                    }
                    else{
                        echo("No hay pacientes en espera");
                    }                  
                }
                if($libre[1]>0){
                    $query = "SELECT historia,id from pacientes where prioridad>4 and (estado='zespera'or estado='pendiente') order by prioridad DESC, estado desc ";
                    $result = mysqli_query($conexion, $query);
                    $n=0;
                    if(mysqli_num_rows($result)>0){
                        while($r=mysqli_fetch_array($result)){
                            if($n<$libre[1]){
                                $query = "UPDATE `pacientes` SET `estado` = 'atendido' WHERE `pacientes`.`historia` = '$r[historia]'";
                                $uno = mysqli_query($conexion, $query);
                            }
                            $n=$n+1;
                            
                       } 
                       for($i=0;$i<=$n;$i++){
                        $g=$hur[$i];   
                        $query = "UPDATE `consulta` SET `estado` = 'ocupado' WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                        $query = "UPDATE `consulta` SET `atendidos` = ('atendidos'+1) WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                       }
                    }
                    else{
                        echo("No hay pacientes urgencias en espera");
                    }                  
                }
                if($libre[2]>0){
                    $query = "SELECT historia,id from pacientes where edad<16 and prioridad<=4 and (estado='zespera'or estado='pendiente') order by prioridad DESC, estado desc ";
                    $result = mysqli_query($conexion, $query);
                    $n=0;
                    if(mysqli_num_rows($result)>0){
                        while($r=mysqli_fetch_array($result)){
                            if($n<$libre[2]){
                                $query = "UPDATE `pacientes` SET `estado` = 'atendido' WHERE `pacientes`.`historia` = '$r[historia]'";
                                $uno = mysqli_query($conexion, $query);
                            }
                            $n=$n+1;
                            
                       } $i=0;
                       //for($i=0;$i<=$n;$i++){
                       while($i<=$n){    
                        $g=$hped[$i];$i=$i+1;
                        $query = "UPDATE `consulta` SET `estado` = 'ocupado' WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                        $query = "UPDATE `consulta` SET `atendidos` = ('atendidos'+1) WHERE `id` = '$g'";
                        $uno = mysqli_query($conexion, $query);
                       }
                    }
                    else{
                        echo("No hay pacientes urgencias en espera");
                    }                  
                }

                //Asignar a los pacientes que no pudieron ser atendidos como Espera
                $query = "UPDATE `pacientes` SET `estado` = 'zespera' WHERE `estado` = 'pendiente'";
                mysqli_query($conexion, $query);


            }
            else{
                echo "lleno";
            }
        }
    }


?>


