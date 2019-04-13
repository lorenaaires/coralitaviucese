<?php 	
    require 'ConnectionVar.php';
    $connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    mysqli_set_charset($connessione, "utf8");
 
    //echo $_POST;
    $concerto = $_POST["concerto"];
    
    if(isset($concerto["id_uscita"])){
        $sql = "UPDATE registroUscite SET indirizzoFileVolantini='".$concerto["indirizzoFileVolantini"]."', data_inizio='".$concerto["data_inizio"]."', data_fine='".$concerto["data_fine"]."',quandoDescrizione='".$concerto["quandoDescrizione"]."',luogo_uscita='".$concerto["luogo_uscita"]."',dettagli_uscita='".$concerto["dettagli_uscita"]."' WHERE id_uscita=".$concerto["id_uscita"];
    }else{  
        $sql = "INSERT INTO registroUscite (data_inizio, data_fine,quandoDescrizione,luogo_uscita,dettagli_uscita) VALUES ('".$concerto["data_inizio"]."','".$concerto["data_fine"]."','".$concerto["quandoDescrizione"]."','".$concerto["luogo_uscita"]."','".$concerto["dettagli_uscita"]."')";
    }
    
    $result = mysqli_query($connessione, $sql);   

    $connessione->close();
    echo $result;

?>