<?php require_once "head.php" ?>

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
                createCard(d.id_an, d.nom, d.photo);
            })
        })

        function createCard(id_an,nom,photo){
            let card = '<div class="card mt-3" style="width: 20rem;">'+
                          '<div class="card-body">'+
                          '<h5 class="card-title text-center">'+nom +'</h5>'+
                          '<img src='+photo+' class="w-100">'+
                            '<div class="d-flex justify-content-around mt-3">'+
                            '<a href="../Controller/NavigationController.php?detail&id='+id_an+'" class="btn btn-primary">Voir les détails</a>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
            document.querySelector("#animaux").insertAdjacentHTML("beforeend",card);
        };
    </script>
<?php require_once "foot.php" ?>