<?php

ob_start();
session_start();

require('./../db_connect.php');

$error = false;

if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pass'])){

    // array errori
    $errors = array(); 

    // Assigning POST values to variables.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passVal = $_POST['passConf'];

    //clean up input to prevent SQL injection
    //name clean up
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    //email clean up
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    //pass clean up
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    //passVal clean up
    $passVal = trim($_POST['passConf']);
    $passVal = strip_tags($passVal);
    $passVal = htmlspecialchars($passVal);

    //name validation
    if (empty($name)) {
        $error = true;
        array_push($errors, "Please enter your full name."); //da usare
    }

    //email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        array_push($errors, "Please enter valid email address."); //da usare
    }
    else {
        // check email exist or not
        $query = $connection->prepare("SELECT * FROM users WHERE userEmail = ?");
        if (!$query){
            echo "Prepared failed";
        }
        $query->bind_param('s',$email) or die("Binding failed");
        $result = $query->execute();
        $query->store_result();

        if ($query->num_rows > 0){
            echo "Errore, Email gia utilizzata";
            $emailError = "Provided email is already in use.";
        }
    }
    // pass validation
    if (empty($pass)){
        $error = true;
        array_push($errors,"Please enter pass."); //da usare
    } 
    else if(strlen($pass) < 6) {
        $error = true;
        array_push($errors,"pass must have atleast 6 characters.");  //da usare
    }
    else if ($pass != $passVal){
        $error = true;
        array_push($errors,"le due PW non coincidono"); //mettere qualcosa di sensato e non un echo
    }
    
    //pass encryption with SHA256();
    $pass = hash('sha256', $pass);
    
    //If all fields are right
    if ($error != true) {
        /*
        $query = "INSERT INTO users (userName, userEmail, userPass) VALUES('$name', '$email', '$pass')";
        mysqli_query($connection, $query);
        $_SESSION['name'] = $name;
        header("Location: ./../Login/login.php");
        */
        //Test prepared statement
        $query = $connection->prepare("INSERT INTO users (userName, userEmail, userPass) VALUES(?, ?, ?)");
        if (!$query){
            echo "Prepared failed";
        }
        
        $query->bind_param('sss',$name, $email, $pass) or die("Binding failed");
        $query->execute();
        
        $_SESSION['name'] = $name;
        header("Location: ./../Login/login.php");
        echo "Successo";
    
    }
    else {
        //header("Location: signup.php "); //Da cambiare
        echo "PD!! Qualcosa è andato storto";
    }
}
?>