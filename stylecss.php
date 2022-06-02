<?php
if(isset($_POST['theme'])){
  $theme = $_POST['theme'];
}
session_start();
$_SESSION['style']=$theme;
header("location:index.php");

?>