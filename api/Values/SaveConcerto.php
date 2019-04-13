<?php 	
    require 'ConnectionVar.php';
    $connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    mysqli_set_charset($connessione, "utf8");
    
    
    $concerto = $_POST["concerto"];
    
    if(isset(
        $concerto["id_uscita"])){ $sql = "UPDATE registroUscite SET indirizzoFileVolantini='".$connessione->real_escape_string($concerto["indirizzoFileVolantini"])."', data_inizio='".$connessione->real_escape_string($concerto["data_inizio"])."', data_fine='".$connessione->real_escape_string($concerto["data_fine"])."',quandoDescrizione='".$connessione->real_escape_string($concerto["quandoDescrizione"])."',luogo_uscita='".$connessione->real_escape_string($concerto["luogo_uscita"])."',dettagli_uscita='".$connessione->real_escape_string($concerto["dettagli_uscita"])."' WHERE id_uscita=".$connessione->real_escape_string($concerto["id_uscita"]);
    }else{  
        $sql = "INSERT INTO registroUscite (data_inizio, data_fine,quandoDescrizione,luogo_uscita,dettagli_uscita) VALUES ('".$connessione->real_escape_string($concerto["data_inizio"])."','".$connessione->real_escape_string($concerto["data_fine"])."','".$connessione->real_escape_string($concerto["quandoDescrizione"])."','".$connessione->real_escape_string($concerto["luogo_uscita"])."','".$connessione->real_escape_string($concerto["dettagli_uscita"])."')";
    }
    
    $result = mysqli_query($connessione, $sql);   
    
    if (!$result)
        echo $connessione->error;
    $connessione->close();
    echo var_dump($result);

?>