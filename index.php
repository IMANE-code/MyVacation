<?php
require("connexion.php");
if (isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = $connexion->prepare("SELECT * FROM user WHERE login='" . $login . "' && password='" . $password . "' LIMIT 1");
    $query->execute();
    $fetch = $query->fetch();
    if (isset($fetch['login'])) {
        session_start();
        header('location:salarie.php');
        exit();
    } else {
        echo "<script>alert('LOGIN or PASSWORD incorrect !!!!!');</script>";
    }
}

//Admin
if (isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = $connexion->prepare("SELECT * FROM `admin` WHERE login='" . $login . "' && password='" . $password . "' LIMIT 1");
    $query->execute();
    $fetch = $query->fetch();
    if (isset($fetch['login'])) {
        session_start();
        header('location:admin.php');
        exit();
    } else {
        echo "<script>alert('LOGIN or PASSWORD incorrect !!!!!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="img/logo2.png" rel="shortout icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MY VACATION</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="group-btn">
                <a href="#" class="btn btn-primary btn-md">Log in <i class="fa fa-sign-in"></i></a>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">MY VACATION <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="group-btn">
                <a class="btn btn-primary btn-md" Onclick="document.getElementById('fmr').style.display='block'">
                    Login </a>
            </span>
        </div>
    </nav>
    <div id="h1-welcome">
        <span> WELCOME TO MY VACATION</span>
    </div>
    <div id="fmr">
        <form class="form" action="#" method="POST"></br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" Onclick="document.getElementById('fmr').style.display='none'">&times;</span>
            </button>
            <h4>Login</h4>
            </br>
            <input type="text" name="login" class="form-control input-sm chat-input" placeholder="login" required />
            </br></br>
            <input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" required />
            </br></br>
            <div class="wrapper">
                <input type="submit" class="btn btn-primary btn-md" name="entrer" value="log in">
            </div>
        </form>
    </div>
</body>

</html>