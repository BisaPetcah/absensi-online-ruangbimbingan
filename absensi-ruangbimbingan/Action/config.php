<?php 
     //LocalHost
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db =  "ruang_bimbingan";
     $port = "3306";

     $conn = mysqli_connect($host, $user, $pass, $db, $port);

     if(!$conn){
          die("Conncetion failed: ".mysqli_connect_error());
     }
?>