<?php
    include_once './../db_connection.php';
    include_once './checkoutForm.php';
    include_once './../connect.php';
   
    session_start();
    $email = $_SESSION["email"];
    
if (isset($_POST['email']) and isset($_POST['quantity']) and isset($_POST['creditCard']) and isset($_POST['expire']) and isset($_POST['ccv'])){

    $nome = $_POST["email"];
    $quantity = $_POST["quantity"];
    $card = $_POST["creditCard"];
    $expire = $_POST["expire"];
    $ccv = $_POST["ccv"];
    $error = false;


    mysqli_real_escape_string($conn, $nome);
    mysqli_real_escape_string($conn, $quantity);
    mysqli_real_escape_string($conn, $card);
    mysqli_real_escape_string($conn, $expire);
    mysqli_real_escape_string($conn, $ccv);

    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `users` WHERE userEmail='$email'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    //Array di errrori
    $errors = array();

    if ($count != 1){
        //stampare un errore che l'utente non è nel db
        $error = true;
        array_push($errors, "L' utente non è nel DB'"); 
    }

    if ($nome != $email){
        //stampare che l'utente è sbagliato
        $error = true;
        array_push($errors, "L' utente è sbagliato'"); 
    }

    if (empty($nome)){
        $error = true;
    }
    if (empty($quantity)){
        $error = true;
    }
    if (empty($card)){
        $error = true;
    }
    //controllare la lunghezza del numero della carta di credito
    if (empty($expire)){
        $error = true;
        array_push($errors, "Formato carta di credito sbagliato"); 
    }
    if (empty($ccv)){
        $error = true;
        array_push($errors, "Il CVV obbligatoria"); 
    }

    if ($quantity > $_SESSION["sommaToken"]){
        $error = true;
        array_push($errors, "Non si posso acquistare più token di quelli disponibili"); 
    }

    if ($error == false) {
        $toinsert = $conn->prepare("INSERT INTO money (userName, quantity) VALUES (?, ?)");
        if(!$toinsert){
            echo "Prepare failed";
        }
        $toinsert->bind_param("sd", $nome, $quantity) or die("Bind failed");
        $toinsert->execute();
        header("location: ./../index.php#TIMEMAP");
    }

    //display degli errori
    if (!empty($errors)) {
        foreach ($errors as $item){
            echo $item . ". ";
        }
    }
}
?>
