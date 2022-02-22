<?php require_once "head.php" ?>
<h1 class="text-center">Enregistrez vous !</h1>
<form method="post" class="container col-6 mt-5">
    <label for="email">Email :</label>
    <input type="email" class="form-control" name="email" id="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" class="form-control" name="password" id="password" required>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" class="form-control" required>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" class="form-control" required>
    <label for="role">Role :</label>
      <select name="role" id="role" class="form-control" required>
      <option value="admin">admin</option>
      <option value="user">user</option>
      </select>
    <button class="btn btn-primary mt-3">S'inscrire</button>
</form>
<div class="alert alert-danger" style="display: none"></div>

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
        fetch("../Controller/UserController.php?register",
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
                window.location = "../Controller/NavigationController.php?login";
            }
        })
    })
</script>
<?php require_once "foot.php" ?>