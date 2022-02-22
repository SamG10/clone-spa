<?php require_once "head.php" ?>

<h1 class="text-center">Ajouter un animal</h1>

<form action="../Controller/UserController.php?admin" method="post" class="container col-6 mt-5">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" class="form-control">
    <label for="date_naissance">Date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance" class="form-control">
    <label for="genre">Genre :</label>
    <select name="genre" id="genre" class="form-control">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <label for="lieu">Lieu :</label>
    <input type="text" name="lieu" id="lieu" class="form-control">
    <label for="is_adopt">Est adopté :</label>
    <select name="is_adopt" id="is_adopt" class="form-control">
        <option value="0">0</option>
    </select>
    <label for="photo">Photo de l'animal (mettre l'url):</label>
    <input type="text" name="photo" id="photo" class="form-control">
    <button class="btn btn-primary mt-3">Valider</button>
</form>
<script>
    let form = document.querySelector("form");
    let data = {};
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        Array.from(form.elements).forEach((i) => {
            if(i.name !== "" && i.value !== ""){
                data[i.name] = i.value;
            }
        });
        fetch("../Controller/UserController.php?admin",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then((response) => {
            if(!response.ok){
                document.querySelector(".alert-danger").style.display = "block";
                document.querySelector(".alert-danger").textContent = "Il y a eu un soucis";
            }else{
                window.location = "/";
            }
        })
    })
</script>
<?php require_once "foot.php" ?>