<?php

    if(!isset($_FILES['img'])) {
        echo '<p>Please select a file</p>';
    } else {
        try {
        $msg= upload(); 
        echo $msg; 
        }
        catch(Exception $e) {
        echo $e->getMessage();
        echo 'Sorry, could not upload file';
        }
    }

    function upload() {
        require_once('./../connect.php'); 
        $maxsize = 100000;
        if($_FILES['img']['error']==UPLOAD_ERR_OK) {
            if(is_uploaded_file($_FILES['img']['tmp_name'])) {    
                $tempName=$_FILES['img']['tmp_name'];
                $tempName = file_get_contents($tempName);
                            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $titolo = $_POST["titolo"];
                $descrizione = $_POST["descrizione"];
                $testo = $_POST["testo"];
                }

                $titolo = trim($_POST['titolo']);
                $titolo = strip_tags($titolo);
                $titolo = htmlspecialchars($titolo);

                $descrizione = trim($_POST['descrizione']);
                $descrizione = strip_tags($descrizione);
                $descrizione = htmlspecialchars($descrizione);

                $testo = trim($_POST['testo']);
                $testo = strip_tags($testo);
                $testo = addslashes($testo);
                            
                $query = $conn->prepare("INSERT INTO articolo (title, description, text, picture, views)
                                         VALUES(?, ?, ?, ?, ?)");
                if (!$query){
                    echo "Prepared failed";
                }
                            
                if (strlen($titolo)!=0 && strlen($descrizione)!=0 && strlen($testo)!=0) {
                    $views = 0;
                    $query->bind_param('ssssi', $titolo, $descrizione, $testo, $tempName, $views) or die("Binding failed");
                    if (!$query->execute()) {
                        echo "Error" . "<br>" . mysqli_error($conn);
                    }
                    header("Location: blog.php");
                }
            }
        }                
    }
?>