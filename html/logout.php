<?php 
    setcookie("session", "", date() + 60 * 60 * 24 * 365);
    header("location: /index.php");
?>