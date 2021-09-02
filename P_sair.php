<?php

session_start();
unset($_SESSION ['id_usuario'], $_SESSION ['nome'], $_SESSION ['email'], $_SESSION ['usuario'], $_SESSION ['nivel']);

header("Location: login.php");
?>