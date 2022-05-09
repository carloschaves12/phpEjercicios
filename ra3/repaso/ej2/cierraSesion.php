<?php
session_start();
unset($_SESSION['puzlesResueltos']);
session_destroy();
header('Location: ej2.php')
?>