<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "../Model/Users.php";
$userClass = new Users();

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

if(isset($_GET['register'])){
    $userClass->insertUser($data);
    echo json_encode($data);
}else if(isset($_GET['login'])){
    $user = $userClass->verifyUser($data);
    $password = $data['password'];
    $verif = password_verify($password, $user['password']);
    if($verif){
        $_SESSION['user']['id']= $user['id_us'];
        $_SESSION['user']['nom']= $user['prenom']." ".$user['nom'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['role'] = $user['role'];
        echo json_encode($_SESSION);
    }
}else if(isset($_GET['admin'])){
    $userClass->addAnimals($data);
    echo json_encode($data);
}else if(isset($_GET['adopt'])){
    $users = $userClass->getAllAnimals($_SESSION['user']['id']);
        echo json_encode($users);
}else if(isset($_GET['edit']) && isset($_GET['id'])){
    $users = $userClass->profilAnimal($_GET['id']);
    include_once "../View/editAnimals.php";
}else if(isset($_GET['edit']) && isset($_GET['id'])){
    $users = $userClass->editAnimal($_GET['id'], $data);
    include_once "../View/editAnimals.php";
    echo json_encode($data);
}else if(isset($_GET['profil']) && isset($_GET['id'])){
    $users = $userClass->profilAnimal($_GET['id']);
    include_once "../View/profil.php";
}else if(isset($_GET['disconnect'])){
// Réinitialisation du tableau de session
// On le vide intégralement
    $_SESSION = array();
// Destruction de la session
    session_destroy();
// Destruction du tableau de session
    unset($_SESSION);
    header('Location:/');
}