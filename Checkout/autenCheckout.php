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

    if ($count != 1){
        //stampare un errore che l'utente non è nel db
        $error = true;
    }

    if ($nome != $email){
        //stampare che l'utente è sbagliato
        $error = true;
    }

    //qui sotto poi non ci va 20000 ma ci va i soldi che mancano alla fine della barra (quindi meno di 200000 tranne all' iniziio)
    //if ($quantity > 200000){
        //dire che non si puo comprare piu di quello che c'è
      //  $error = true;
    //}

    //fare dei controlli piu belli
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
    }
    if (empty($ccv)){
        $error = true;
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

    //poi ci va qualcosa qui
    else {
        echo "Errore";
    }
}
?>
