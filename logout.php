<?php
session_start();
session_destroy();
header('Location:index.php');
//let user logout by delete session
?>