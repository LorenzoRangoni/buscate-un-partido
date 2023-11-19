<?php
  // $_ENV= parse_ini_file ('.env');
  // $mysqli = mysqli_init();
  // $mysqli->ssl_set(NULL, NULL, "../cacert.pem", NULL, NULL);
  // $mysqli->real_connect($_ENV["HOST"], $_ENV["USERNAME"], $_ENV["PASSWORD"], $_ENV["DATABASE"]);

$mysqli=new mysqli("localhost","root","","buscateunpartido");

$conn = $mysqli;

if ($mysqli->connect_error) {
  die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");


date_default_timezone_set('America/Argentina/Buenos_Aires');



?>