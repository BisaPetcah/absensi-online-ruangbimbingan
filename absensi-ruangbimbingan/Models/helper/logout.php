<?php
     include "function.php";
     session_start();

     $_SESSION = [];
     session_unset();
     session_destroy();

     setcookie("login", "", time()-3600);
     header('Location: '.baseURL.'Views/login.php');