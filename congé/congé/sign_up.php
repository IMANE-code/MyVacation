<?php
include("connect.php");
session_start();

$query_service = "SELECT * FROM service  ";
$service = mysqli_query($con,$query_service);

if(isset($_POST['next'])){
  $login=htmlspecialchars(strtolower(trim($_POST['login'])));
  $password=md5($_POST['password']);

    $query_1 = "INSERT INTO auth(login,pwd)VALUE('$login','$password')";




    if(mysqli_query($con,$query_1)){

      // global $login , $password;
      $query_2 = "SELECT id FROM auth WHERE login='$login' && pwd='$password'";
      $result_2 = mysqli_query($con,$query_2);
      if(mysqli_num_rows($result_2)>0){
          //Récupérer ID Login
          $row_2 = mysqli_fetch_assoc($result_2);
          $_SESSION['login']=$login;
          $_SESSION['password']=$password;
          $_SESSION['id'] = $row_2['id'];

          header('location:registration.php');
          }

   }else{
       echo "error";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/sign-up.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1 >Register</h1>
    </div>

    <!-- Login Form -->
    <form action="" method="post">
      <input type="text"  class="fadeIn second" name="login" id="firstname"  name="login" required placeholder="CIN">
      <input type="text"  class="fadeIn third"  id="lastname"  type="password" name="password" required placeholder="password">
      <select class="form-control" id="service"  type="text" name="service" required>

            <?php
              if(mysqli_num_rows($service)>0){
                while($row = mysqli_fetch_assoc($service)) {
                  $service_type=htmlspecialchars(trim($_POST['service']));
                  $_SESSION['service'] = $service_type;

                  ?>
                  <option value="<?=$row['id'];?>" ><?=$row["libelle"];?></option>
                  <?php
                }
              }else{
                echo "0 result";
              }

            ?>

          </select>
      <input type="submit" class="fadeIn fourth" value="Register" name="next">
    </form>
  </div>
</div>









</body>
</html>
