<?php 	

    function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
    }
    //$host="89.46.111.34";    $user = "Sql1049322";    $password="f76075174z";    $dbname = "Sql1049322_2";
    //file_get_contents('php://input');
    //if(isset($_FILES["locandina"])){
    //    echo 'c\'è la locandina';
    
    //}else{
/*

    require 'ConnectionVar.php';
    $connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    if(isset($_FILES["locandina"]))
        echo $_POST["locandina"];
        else echo "niente";
*/
    if(isset($_POST["concerto"]))
        echo $_POST["concerto"];
    $concerto = $_POST["concerto"];
    if(isset($concerto["id_uscita"])){
        $sql = "UPDATE registroUscite SET data_inizio='".$concerto["data_inizio"]."', data_fine='".$concerto["data_fine"]."',quandoDescrizione='".$concerto["quandoDescrizione"]."',luogo_uscita='".$concerto["luogo_uscita"]."',dettagli_uscita='".$concerto["dettagli_uscita"]."',indirizzoFileVolantini='".$concerto["indirizzoFileVolantini"]."' WHERE id_uscita=".$concerto["id_uscita"];
    }else{  
        $sql = "INSERT INTO registroUscite (data_inizio, data_fine,quandoDescrizione,luogo_uscita,dettagli_uscita,indirizzoFileVolantini) VALUES ('".$concerto["data_inizio"]."','".$concerto["data_fine"]."','".$concerto["quandoDescrizione"]."','".$concerto["luogo_uscita"]."','".$concerto["dettagli_uscita"]."','".$concerto["indirizzoFileVolantini"]."')";
    }
    $result = mysqli_query($connessione, $sql);

    

    $connessione->close();
//}
    echo $result;

?>