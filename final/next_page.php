<?php
  session_start();
  $_SESSION['session']=$_GET['id'];
  if (isset($_SESSION['session'])) {
  	   header('Location:showall.php');
  }
?>