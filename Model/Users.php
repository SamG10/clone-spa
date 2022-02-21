<?php
include_once "Bdd.php";
class Users
{
    private PDO $bdd;

    public function __construct(){
        $bddClass = new Bdd();
        $this->bdd = $bddClass->getBdd();
    }

    public function insertUser($data)
    {
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $request = $this->bdd->prepare("INSERT INTO user(nom, prenom, email, password, role) VALUES (:nom,:prenom,:email,:password,:role)");
        $request->execute([
            ':nom'=>$data['nom'],
            ':prenom'=>$data['prenom'],
            ':email'=>$data['email'],
            ':password'=>$password,
            ':role'=>$data['role']
        ]);
    }

    public function verifyUser($data)
    {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? $data['email'] : null;

        $request = $this->bdd->prepare("SELECT * FROM user WHERE email = :email");
        $request->execute([
            ':email' => $email
        ]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
?>