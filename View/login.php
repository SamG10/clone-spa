<?php require_once "head.php" ?>
<h1 class="text-center"> Connectez-vous! </h1>
<form method="post">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" class="form-control">
    <label for="password">Mot de Passe :</label>
    <input type="password" name="password" id="password" class="form-control">
    <button class="btn btn-primary">Valider</button>
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
        fetch("../Controller/UserController.php?login",
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
<?php require_once "foot.php"?>