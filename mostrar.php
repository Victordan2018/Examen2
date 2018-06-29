<!DOCTYPE html>
<html>
<head>
  
  <title></title>

  <script src="js/jquery-3.2.1.js"></script>
  <script>
    $(document).ready(function(){
        $("body").hide().fadeIn(5000);
    });
    </script>
</head>
<body>


 <h1>BUSQUEDA DE EMPLEADOS</h1>
                            
                    <form action="mostrar.php" method="post" name="busca">
                              <p>
                    <input name="buscar" type="text" />
                              </p>
                              <p>
                   <input type="submit" name="btn" id="1" value="Enviar" />
                              </p>
                            </form>
                            
                           <?php
               $servername="localhost";
$username="root";
$password="1234";
$database="examen_2";
$conexion=mysqli_connect($servername,$username,$password,$database);
               if(isset ($_POST['buscar'])){
                           $buscar=$_POST['buscar'];
   
    $bsql="SELECT * FROM empleados WHERE nombre_empleado='$buscar'";
    $resultado=mysqli_query($conexion,$bsql);
    if($row=mysqli_fetch_array($resultado)){
      ?>
     <table width="568" height="102" border='3'>
     
      <tr>
        <td width="20" height="37">ID</td>
        <td width="500">Nombre</td>
        <td width="100">Salario</td>
        <td width="59">Url</td>
       </tr>
     
      <?php
      mysqli_field_seek($resultado,0);

      while($field = mysqli_fetch_field($resultado)){
        }      
     
      do{
      ?>
       <?php
               
                
                $resultado=mysqli_query($conexion,"select * from empleados WHERE nombre_empleado='$buscar'")or die(mysqli_error());
                while($fi=mysqli_fetch_array($resultado)){
              
              ?>
            <td height="53"><?php echo $row['id_empleado']; ?>    </td>
            <td><?php echo $row['nombre_empleado']; ?> </td>
            <td><?php echo $row['salario_empleado'];    ?></td>
            <td><img src="<?php echo $fi['url_foto_empleado']; ?>" width="100px" heighth="50px" ref></td>
              <?php
                              }       
                            ?>
                            
              <?php       
                            ?></td>
            
             
            <?php

      }while ($row= mysqli_fetch_array($resultado));
            ?>
       </table>
       <?php
       
    }else{
         echo "<p>no se encontro ningún registro!</p>\n";
      }


}

?>

                            
                            
  <h3><a href="examen.html">Ingresa un nuevo usuario</a></h3>                  
  <h1>TODOS LOS EMPLEADOS</h1></center>
  
        
                            <?php
                
                
                $resultado=mysqli_query($conexion,"select * from empleados")or die(mysqli_error());
                while($f=mysqli_fetch_array($resultado)){
              
              ?>
              <div class="producto">
                              <center>
    <table width="568" height="102" border='3'>
     
      <tr>
        <td width="20" height="37">ID</td>
        <td width="500">Nombre</td>
        <td width="100">Salario</td>
        <td width="59">Url</td>
       </tr>
                            
                            
                              <!--<img src="<?php// echo $f['url_foto_empleado']; ?>" width="100px" heighth="50px" ref><br>
                              <span><?php //echo $f['nombre_empleado']; ?></span><br>-->

                             
      <tr>
       <td height="53"><?php echo $f['id_empleado']; ?>    </td>
            <td><?php echo $f['nombre_empleado']; ?> </td>
            <td><?php echo $f['salario_empleado'];    ?></td>
            <td><img src="<?php echo $f['url_foto_empleado']; ?>" width="100px" heighth="50px" ref></td>
            </tr>

     </table>  
     <script type="text/javascript">
    $(document).ready(function(){
     $("tr:even").css("background-color","yellow");
        $("tr:odd").css("background-color","red");
    });      
    </script>       
                             
                              </center>
                            </div>
                            
                            <?php
                              }       
                            ?>

</body>
</html>