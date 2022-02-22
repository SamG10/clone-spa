<?php require_once "head.php" ?>

<h1 class="text-center">Détail de l'animal</h1>
<div>
    <h3 class="text-center mt-5"><?= $users['nom']; ?></h3>
    <div style="width: 100%; display: flex; justify-content: center; margin-top: 50px;">
        <img src="<?= $users['photo'] ?>" style="width: 300px;" alt="" srcset="">
    </div>
    <div>
        <p class="text-center mt-5"><?= $users['date_naissance'] ?></p>
        <p class="text-center"><?= $users['genre'] ?></p>
        <p class="text-center"><?= $users['lieu'] ?></p>
        <p class="text-center"><?= $users['is_adopt'] ?></p>
    </div>
    <div class="w-100 d-flex justify-content-center">
        <?php if($_SESSION['user']['role'] === "admin") : ?>
        <a class="btn btn-warning w-50" href="../Controller/UserController.php?edit&id=<?= $users['id_an'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
    <?php endif; ?>
    <?php if($_SESSION['user']['role'] === "user") : ?>
        <a class="btn btn-primary" href="../Controller/NavigationController.php?profil&id='+id_an+'">Adopter</a>
    <?php endif; ?>
    </div>
    
</div>
<?php require_once "foot.php" ?>