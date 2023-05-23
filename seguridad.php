<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: login/Login.php");
}else {
    header("location: usuario/dashboard.php");
}
