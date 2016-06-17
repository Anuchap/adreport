<?php
   session_start();  
   $login_session = '';
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   } else {
       $login_session = $_SESSION['login_user'];
   }
?>