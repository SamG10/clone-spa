<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_GET['register'])){
    include_once "../View/register.php";
}else if(isset($_GET['login'])){
    include_once "../View/login.php";
}