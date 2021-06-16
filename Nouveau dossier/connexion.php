<?php
$servername = 'localhost';
$username = 'root';
$password = '';

try {
  $connexion = new PDO("mysql:host=$servername;dbname=gestioncongé", $username, $password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
