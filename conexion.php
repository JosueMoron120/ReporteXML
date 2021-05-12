<?php
    $conex = new mysqli("localhost", "root", "", "bdventas");
    if($conex->connect_errno){
        die("Error");
    }else{
      echo "<script>console.log('conexion exitosa')</script>";
    }
?>