<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_GET['register'])){
    include_once "../View/register.php";
}else if(isset($_GET['login'])){
    include_once "../View/login.php";
}else if(isset($_GET['admin'])){
    include_once "../View/admin.php";
}else if(isset($_GET['adopt'])){
    include_once "../View/adopt.php";
}