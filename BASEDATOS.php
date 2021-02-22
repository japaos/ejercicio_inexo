
<?PHP
    $gobo=0;
    
    $conexion=  mysqli_connect("127.0.0.1:3306", "usuario", "usuario", "inexoo");//mysqli_connect("localhost:8080","usuario","usuario","inexoo");
    if(mysqli_connect_errno()){
      echo("Falla en la conexion mysql"+mysqli_connect_errno());
    }


    
//    $conexion=mysqli_connect("localhost","root",""); 
//  codigo conexion               $db=mysqli_select_db($server,"ejemplo");

// if(!empty ($var)){
//   $query="SELECT * FROM paciente WHERE id = 0";
//   $result=mysqli_query($conexion,$query);
//   if(!$result){
//       die("error de consulta". mysqli_error($conexion));
//   }
//   $json=array();
//   while($filas=mysqli_fetch_array($result)){
//       $json[]=array(
//           "nombre"=>$filas["ID"],
//           "descripcion"=>$filas["ID_PACIENTE"],
//           "id"=>$filas["ID_CONSULTA"]
//       );
//   }
//   $cadenajson=json_encode($json,JSON_UNESCAPED_UNICODE);
//   print_r($cadenajson);

?>
