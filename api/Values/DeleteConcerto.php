<?php
require 'ConnectionVar.php';
$connessione = mysqli_connect($host, $user, $password, $dbname) or die("errore di connessione");
mysqli_set_charset($connessione, "utf8");

$concerto = $_POST["concerto"];

$sql = "DELETE FROM registroUscite WHERE id_uscita=" . $concerto["id_uscita"];


$result = mysqli_query($connessione, $sql);

$connessione->close();
echo $result;
