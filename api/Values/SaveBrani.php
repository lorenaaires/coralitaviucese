<?php 	
    require 'ConnectionVar.php';
    $connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    mysqli_set_charset($connessione, "utf8");
 
    //echo $_POST;
    $braniarray = $_POST["brani"];
    $arrayLength = count ($braniarray);
    
    for($i=0;$i<$arrayLength;$i++){
        $brani = $braniarray[$i];
        $sql = "UPDATE Repertorio SET Titolo = '".$brani["Titolo"]."', Armonizzazione = '".$brani["Armonizzazione"]."' WHERE id_canti = ".$brani["id_canti"] ;
        
        $result = mysqli_query($connessione, $sql);
    }
      

    $connessione->close();
    echo $result;

?>