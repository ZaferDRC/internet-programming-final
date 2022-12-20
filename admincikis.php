<?php

session_start();

$_SESSION = array(); // Session'ın içi boşaltıldı.

session_destroy(); // Session yok edildi.
header("location:index.php"); 
?>