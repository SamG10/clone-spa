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

    public function addAnimals($data){
        $request = $this->bdd->prepare("INSERT INTO animaux(nom, date_naissance, genre, photo, lieu, is_adopt) VALUES (:nom, :date_naissance, :genre, :photo, :lieu, :is_adopt)");
        $request->execute([
            ':nom' => $data['nom'],
            ':date_naissance' => $data['date_naissance'],
            ':genre' => $data['genre'],
            ':photo' => $data['photo'],
            ':lieu' => $data['lieu'],
            ':is_adopt' => $data['is_adopt']
        ]);
        // return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAnimals($data)
    {
        $request = $this->bdd->prepare("SELECT * FROM animaux ORDER BY id_an DESC");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editAnimal($id, $data)
    {
        $request = $this->bdd->prepare("UPDATE animaux set nom = :nom, date_naissance = :date_naissance, genre = :genre, photo = :photo, lieu = :lieu, is_adopt = :is_adopt WHERE id_an = :id");
        $request->execute([
            ":id" => $id,
            ":nom" => $data['nom'],
            ":date_naissance" => $data['date_naissance'],
            ":genre" => $data['genre'],
            ":photo" => $data['photo'],
            ":lieu" => $data['lieu'],
            ":is_adopt" => $data['is_adopt']
        ]);
        // return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function profilAnimal($id)
    {
        $request = $this->bdd->prepare("SELECT * FROM animaux WHERE id_an = :id");
        $request->execute([":id" => $id]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}