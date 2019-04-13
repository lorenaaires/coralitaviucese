<?php 	
    require 'ConnectionVar.php';

    define("UPLOAD_DIR", "../../Doc_Volantini/");

    if(isset($_FILES['file']['name'])&&strstr($_FILES['file']['name'],' ')==false){        
        $file = $_FILES['file'];
        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name'])){
            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);
            echo $_FILES['file']['name'];
        }
    }else{
        echo "Non è permesso l'inserimento di file con spazi nel nome, rinomina il file che vuoi caricare prima dell'upload.";
    }
?>