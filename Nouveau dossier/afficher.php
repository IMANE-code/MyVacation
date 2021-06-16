<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAfficher.css" />
    <link href="img/logo2.png" rel="shortout icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MY VACATION</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">MY VACATION </a>
                </li>
            </ul>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md" Onclick="document.getElementById('fmr').style.display='block'">MAJ </a>
                </span>
            </div>
            <a href="index.php" class="btn btn-primary btn-md">Log Out</a>
        </div>
    </nav>
    <?php
    require("connexion.php");
    $query = "select * from user";
    $stat = $connexion->query($query);
    $tab = $stat->fetchAll();
    echo "
    <div class='container'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Login</th>
                <th>Id</th>
                <th>Password</th>
                <th>CIN</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Grade</th>
                <th>Service</th>
            </tr>
        </thead>
        <tbody>";
    foreach ($tab as $tab) {
        echo "<tr>
            <td>" . $tab['login'] . "</td>
            <td>" . $tab['id'] . "</td>
            <td>" . $tab['password'] . "</td>
            <td>" . $tab['cin'] . "</td>
            <td>" . $tab['tel'] . "</td>
            <td>" . $tab['email'] . "</td>
            <td>" . $tab['grade'] . "</td>
            <td>" . $tab['service'] . "</td>
          </tr>";
    }
    echo "</tbody>
            </table>
            </div>";
    ?>

    <div id="fmr">
        <form class="form" action="#" method="POST"></br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" Onclick="document.getElementById('fmr').style.display='none'">&times;</button>
            </button>
            <h4>UPDATE USER</h4>
            </br>
            <input type="text" name="login" id="login" class="form-control input-sm chat-input" placeholder="Login" />
            </br></br>
            <input type="text" name="id" id="id" class="form-control input-sm chat-input" placeholder="Id" required />
            </br></br>
            <input type="password" name="password" id="Password" class="form-control input-sm chat-input" placeholder="password" />
            </br></br>
            <input type="text" name="cin" id="cin" class="form-control input-sm chat-input" placeholder="CIN" />
            </br></br>
            <input type="text" name="tel" id="tel" class="form-control input-sm chat-input" placeholder="Téléphone" />
            </br></br>
            <input type="email" name="email" id="email" class="form-control input-sm chat-input" placeholder="Email" />
            </br></br>
            <select name="grade" class="form-control input-sm chat-input">
                <option>grade1</option>
                <option>grade2</option>
                <option>grade3</option>
            </select>
            </br></br>
            <select name="service" class="form-control input-sm chat-input">
                <option>informatique</option>
                <option>indestruel</option>
                <option>marketing</option>
                <option>commercial</option>
            </select>
            </br></br>
            <div class="wrapper">
                <input type="submit" class="btn btn-primary btn-md" name="add" value="Add">
                <input type="submit" class="btn btn-primary btn-md" name="delite" value="Delite">
                <input type="submit" class="btn btn-primary btn-md" name="edit" value="Edite">
            </div>
        </form>
    </div>
</body>

</html>
<?php
require("connexion.php");

//ajouter
if (isset($_POST['add'])) {
    $login = $_POST['login'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];
    $service = $_POST['service'];
    if (empty($login) || empty($id) || empty($password) || empty($cin) || empty($tel) || empty($email)) {
        echo "<script> alert('Champ Empty')</script>";
    } else {
        $connexion->query("INSERT INTO `user`(login,id,password,cin ,tel, email, grade,service)VALUES('$login',$id,'$password','$cin','$tel','$email','$grade','$service')");
        echo "<script> alert('valeur ajouté avec succeé :)')</script>";
    }
}
//supprimer
if (isset($_POST['delite'])) {
    $id = $_POST['id'];
    $connexion->query("DELETE FROM `user` WHERE id = '$id'");
}
//modifier

if (isset($_POST['edit'])) {
    $login = $_POST['login'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];
    $service = $_POST['service'];
    if (empty($login) || empty($id) || empty($password) || empty($cin) || empty($tel) || empty($email)) {
        echo "<script> alert('Champ Empty')</script>";
    } else {
        $connexion->query("UPDATE `user` SET `login`='$login',`id`='$id',`password`='$password',`cin`='$cin',
  `tel`='$tel',`email`='$email',`grade`='$grade',`service`='$service' WHERE `id`='$id'");
    }
}

?>