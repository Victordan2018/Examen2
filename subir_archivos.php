<?php
//controlador de transferencias de archivos

$servername="localhost";
$username="root";
$password="1234";
$database="examen_2";
$conexion=mysqli_connect($servername,$username,$password,$database);
//INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL, 'Nia', 'nina_pack.jpg');
//preguntar si fue presinado el boto de submit
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$salario=$_POST['salario'];
if(ISSET ($_POST["SUBMIT"])){
	//identificar el archivo el archivo local
	$archivoOrigen=$_FILES["fileToUpload"]["tmp_name"];//[local][posicion del buffer, temporal del servidor]
	$archivoDestino="imagenes/".$_FILES["fileToUpload"]["name"];
	echo "El archivo a subir es: ".$archivoDestino;
	echo "</BR>";
	//Parte 2
	//variabel que extraiga la extension del archivo
	$imageFileType=pathinfo($archivoDestino,PATHINFO_EXTENSION);
	//variable que valida que el archivo sea de tipo img
	//$check=getimagesize($archivoOrigen);
	echo "Extension del archivo: ".$imageFileType."<br>"; 
}

if((exif_imagetype($archivoOrigen) == IMAGETYPE_PNG)){
	//si encontro algo, un archivo de tipo img
	echo "El archivo es una img</BR>";
	//Transfiriendo el archivo
	move_uploaded_file($archivoOrigen, $archivoDestino);
	////Transfiriendo la url a la bd
	$query="INSERT INTO empleados (id_empleado, nombre_empleado, salario_empleado, url_foto_empleado
) values ('$id','$nombre','$salario','$archivoDestino')";
	echo "Query a ejecutar".$query."</br>";
    //ejecutando query de insercion
    if ($query_a_ejecutar=mysqli_query($conexion,$query)) {
    	echo "Query ejecutando </br>";
    	header("Refresh:10; url=mostrar.php ");
    	# code...
    }else{
    	echo "No se ejecuto el query </br>";
    }

}else{
	echo "El programa solo admite PNG </br>"; 
    header("Refresh:10; url=examen.html ");
}


?>