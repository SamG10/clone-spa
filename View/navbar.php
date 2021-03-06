<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="../media/pet.png" alt="logo" style="width: 70px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Controller/NavigationController.php?adopt">Adopter</a>
                </li>
            </ul>
                <div>
                    <?php if(!isset($_SESSION['user'])) : ?>
                        <a class="btn btn-primary" href="../Controller/NavigationController.php?login">Se Connecter</a>
                        <a class="btn btn-success" href="../Controller/NavigationController.php?register">S'inscrire</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if($_SESSION['user']['role'] === "admin") : ?>
                            <a class="btn btn-warning" href="../Controller/NavigationController.php?admin">administrateur</a>
                        <?php endif; ?>
                        <a class="btn btn-danger" href="../Controller/UserController.php?disconnect">Se Déconnecter</a>
                    <?php endif; ?>
                </div>
        </div>
    </div>
</nav>