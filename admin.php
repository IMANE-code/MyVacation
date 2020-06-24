<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="img/logo2.png" rel="shortout icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">MY VACATION</a>
                </li>
            </ul>
            <div class="btn-nav"><span class="group-btn">
                    <a href="afficher.php" class="btn btn-primary btn-md"> Employee consultation<i class="fa fa-sign-in"></i></a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md" Onclick="document.getElementById('fmr').style.display='block'"> Notifications&#128276;
                    </a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="index.php" class="btn btn-primary btn-md">Log out<i class="fa fa-sign-in"></i></a>
                </span>
            </div>
        </div>
    </nav>

    <div id="fmr">
        <form class="form" action="#" method="POST"></br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" Onclick="document.getElementById('fmr').style.display='none'">&times;</span>
            </button>
            <h4>Message Recut</h4>
            </br>
            <?php
            require("connexion.php");
            $query = "select * from demmande";
            $stat = $connexion->query($query);
            $tab = $stat->fetchAll();
            foreach ($tab as $tab) {
                echo "<p>le salarie  " . $tab['employé'] . " a envoyé un demmande de congé  de type "
                    . $tab['type'] . "," . $tab['nbjour'] . "à partir de" . $tab['dateDebut'] . "à" . $tab['dateFin'] . "</p>";
                echo "<div class='wrapper'>
                    <input type='submit' class='btn btn-primary btn-md' name='accept' value='accepter'>
                    <input type='submit' class='btn btn-primary btn-md' name='refus' value='refuser'>
                    </div>";
            }
            ?>
        </form>
    </div>
</body>
<?php
require("connexion.php");

if (isset($_POST['accept'])) {
    $connexion->query("UPDATE `demmande` SET `decision`='accepter ");
}

if (isset($_POST['refus'])) {
    $connexion->query("UPDATE `demmande` SET `decision`='accepter ");
}
?>

</html>