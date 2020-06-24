<?php
require("connexion.php");
//envoyer
if (isset($_POST['envoye'])) {
    $id = $_POST['id'];
    $datedemmande = $_POST['datedemmande'];
    $type = $_POST['type'];
    $datedebut = $_POST['datedebut'];
    $datefin = $_POST['datefin'];
    $nbjour = $_POST['nbjour'];
    $employe = $_POST['employe'];
    if (empty($id) || empty($datedemmande) || empty($datedebut) || empty($datefin) || empty($nbjour) || empty($employe)) {
        echo "<script> alert('Champ Empty')</script>";
    } else {
        $connexion->query("INSERT INTO `demmande`(`id`, `dateDem`, `type`, `dateDebut`, `dateFin`, `nbjour`, `employé`) VALUES
        ('$id',$datedemmande,'$type','$datedebut','$datefin','$nbjour','$employe')");
        echo "<script> alert('demmande Envoyer avec succeé :)')</script>";
    }
}
//supprimer
if (isset($_POST['supprime'])) {
    $id = $_POST['id'];
    $connexion->query("DELETE FROM `demmande` WHERE id = '$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="afficher.css" />
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
                    <a class="nav-link" href="#">MY VACATION</a>
                </li>
            </ul>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md">certificate of work<i class="fa fa-sign-in"></i></a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md">pay slip<i class="fa fa-sign-in"></i></a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md" Onclick="document.getElementById('fmr').style.display='block'">VACATION <i class="fa fa-sign-in"></i></a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md" Onclick="document.getElementById('notification').style.display='block'"> Notifications&#128276;
                    </a>
                </span>
            </div>
            <div class="btn-nav"><span class="group-btn">
                    <a href="index.php" class="btn btn-primary btn-md">Log Out <i class="fa fa-sign-in"></i></a>
                </span>
            </div>
        </div>
    </nav>
    <ul id="notification" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <li style="position: absolute; top: 0; right: 0;" Onclick="document.getElementById('fmr2').style.display='block'">

            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto">Notifications</strong>
                    <small class="text-muted">2 seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true" Onclick="document.getElementById('notification').style.display='none'">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Heads up, toasts will stack automatically
                </div>
            </div>

        </li>
    </ul>

    <div id="fmr2">
        <form class="form" action="#" method="POST"></br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" Onclick="document.getElementById('fmr2').style.display='none'">&times;</span>
            </button>
            <h4>Message Recut</h4>
            </br>
            <?php
            require("connexion.php");
            echo "<p>Admin " . $tab['id'] . " votre demmande</p>";
            ?>
            <div class="wrapper">
                <span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md">accept<i class="fa fa-sign-in"></i></a>
                </span>
                <span class="group-btn">
                    <a href="#" class="btn btn-primary btn-md">refuse<i class="fa fa-sign-in"></i></a>
                </span>
            </div>
        </form>
    </div>
    <div id="fmr">
        <form class="form" action="#" method="POST"></br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" Onclick="document.getElementById('fmr').style.display='none'">&times;</span>
            </button>
            <h4>RESERVE VACATION</h4>
            </br>
            <input type="text" name="id" class="form-control input-sm chat-input" placeholder="check id" />
            </br></br>
            <input type="date" name="datedemmande" class="form-control input-sm chat-input" />
            </br></br>
            <select name="type" class="form-control input-sm chat-input">
                <option>Congé annuel</option>
                <option>Congé de maladie</option>
                <option>Congé exceptionnel</option>
            </select>
            </br></br>
            <input type="date" name="datedebut" class="form-control input-sm chat-input" />
            </br></br>
            <input type="date" name="datefin" class="form-control input-sm chat-input" />
            </br></br>
            <input type="number" name="nbjour" class="form-control input-sm chat-input" placeholder="Number of days" />
            </br></br>
            <input type="text" name="employe" class="form-control input-sm chat-input" placeholder="id" />
            </br></br>
            <div class="wrapper">
                <input type="submit" class="btn btn-primary btn-md" name="envoye" value="Send">
                <input type="submit" class="btn btn-primary btn-md" name="supprime" value="Delite">
            </div>
        </form>
    </div>
</body>

</html>