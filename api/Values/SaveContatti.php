<?php 	
    require 'ConnectionVar.php';
    $connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    mysqli_set_charset($connessione, "utf8");
 
    //echo $_POST;
    $infoCoro = $_POST["infoCoro"];

    $sql = "UPDATE informazioniSito SET  codiceFiscaleCoro = '".$connessione->real_escape_string($infoCoro["codiceFiscaleCoro"])."', indirizzoCoro = '".$connessione->real_escape_string($infoCoro["indirizzoCoro"])."', mailDirettore = '".$connessione->real_escape_string($infoCoro["mailDirettore"])."', mailPresidente = '".$connessione->real_escape_string($infoCoro["mailPresidente"])."', nomeCoro = '".$connessione->real_escape_string($infoCoro["nomeCoro"])."', nomeDirettore = '".$connessione->real_escape_string($infoCoro["nomeDirettore"])."', nomePresidente = '".$connessione->real_escape_string($infoCoro["nomePresidente"])."', telefonoDirettore = '".$connessione->real_escape_string($infoCoro["telefonoDirettore"])."', telefonoPresidente = '".$connessione->real_escape_string($infoCoro["telefonoPresidente"])."'";
    
    $result = mysqli_query($connessione, $sql);   

    if (!$result)
        echo $connessione->error;
    $connessione->close();
    echo var_dump($result);
?>