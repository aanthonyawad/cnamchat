<?php 
session_start();
session_unset();
session_destroy();
header('Location: ../html/page1.php');
exit;
?>