<?php if (!isset($_SESSION['user'])) {
    die(header("location:../404.php"));
}
require_once "head.php" ?>

<h1 class="text-center">Adopter un animal</h1>
<div id="animaux" class="d-flex justify-content-around flex-wrap">

</div>
<script>
        fetch("../Controller/UserController.php?adopt").then((response) => {
            if(response.ok){
                return response.json();
            }
        }).then((data) => {
            data.forEach(d => {
                createCard(d.id_an, d.nom, d.date_naissance, d.genre, d.photo, d.lieu, d.is_adopt);
            })
        })

        function createCard(id_an,nom,date_naissance,genre,photo,lieu,is_adopt){
            let card = '<div class="card mt-3" style="width: 20rem;">'+
                          '<div class="card-body">'+
                          '<img src='+photo+' class="w-100">'+
                            '<h5 class="card-title text-center">'+nom +'</h5>'+
                            '<p class="card-title text-center">'+date_naissance+'</p>'+
                            '<p class="card-title text-center">'+genre +'</p>'+
                            '<p class="card-title text-center">'+lieu +'</p>'+
                            '<div class="d-flex justify-content-around mt-3">'+
                            '<a href="../Controller/NavigationController.php?adopt&id='+id_an+'" class="btn btn-primary">Adopter</a>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
            document.querySelector("#animaux").insertAdjacentHTML("beforeend",card);
        };
    </script>
<?php require_once "foot.php" ?>