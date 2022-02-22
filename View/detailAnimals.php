<?php require_once "head.php" ?>

<h1 class="text-center">Détail de l'animal</h1>
<div id="animaux" class="d-flex justify-content-around flex-wrap">

</div>
<script>
        fetch("../Controller/UserController.php?adopt").then((response) => {
            if(response.ok){
                return response.json();
            }
        }).then((data) => {
            data.forEach(d => {
                createCard(d.id_an, d.nom, d.photo, d.genre, d.date_naissance, d.is_adopt, d.lieu);
            })
        })

        function createCard(id_an,nom,photo,genre,date_naissance,lieu,is_adopt){
            let card = '<div class="card mt-3" style="width: 20rem;">'+
                          '<div class="card-body">'+
                          '<h5 class="card-title text-center">'+nom +'</h5>'+
                          '<img src='+photo+' class="w-100">'+
                          '<p class="card-title text-center">'+date_naissance +'</p>'+
                          '<p class="card-title text-center">'+genre +'</p>'+
                          '<p class="card-title text-center">'+lieu +'</p>'+
                          '<p class="card-title text-center">'+is_adopt +'</p>'+
                          
                            '<div class="d-flex justify-content-around mt-3">'+
                            <?php if($_SESSION['user']['role'] === "admin") : ?>
                            '<a class="btn btn-warning w-100" href="../Controller/NavigationController.php?detail&id='+id_an+'"><i class="fa-solid fa-pen-to-square"></i></a>'+
                            <?php endif; ?>
                            <?php if($_SESSION['user']['role'] === "user") : ?>
                            '<a class="btn btn-primary" href="../Controller/NavigationController.php?detail&id='+id_an+'">Adopter</a>'+
                            <?php endif; ?>
                            '</div>'+
                          '</div>'+
                        '</div>';
            document.querySelector("#animaux").insertAdjacentHTML("beforeend",card);
        };
    </script>
<?php require_once "foot.php" ?>