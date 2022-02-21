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
    $animaux = $userClass->addAnimals($dataAnimals);
    if($user){
        $_SESSION['animaux']['id']= $animaux['id_an'];
        $_SESSION['animaux']['nom']= $animaux['nom'];
        $_SESSION['animaux']['date_naissance']= $animaux['date_naissance'];
        $_SESSION['animaux']['genre'] = $animaux['genre'];
        $_SESSION['animaux']['lieu'] = $animaux['lieu'];
        $_SESSION['animaux']['is_adopt'] = $animaux['is_adopt'];
        echo json_encode($_SESSION);
    }
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