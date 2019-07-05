<?php

require('./../db_connect.php');
session_start();
$oldEmail = $_SESSION["email"];
$error = 0;
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['passUno']) and isset($_POST['passDue'])){

// Assigning POST values to variables.
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['passUno'];
$passVal = $_POST['passDue'];

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
$pass = trim($_POST['passUno']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);


$passVal = trim($_POST['passDue']);
$passVal = strip_tags($passVal);
$passVal = htmlspecialchars($passVal);

//Array Error
$errors = array();

//name validation
if (empty($name)) {
    $error = true;
    $nameError = "Please enter your full name."; //da usare
}

//email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = true;
    $emailError = "Please enter valid email address."; //da usare
}
else {
    // check email exist or not and password
    $query = $connection->prepare("SELECT * FROM users WHERE userEmail=? AND userPass = ? ");
    if (!$query){
        echo "Prepared failed";
    }
    $query->bind_param('ss',$email, $pass) or die("Binding failed");
    $result = $query->execute();
    $query->store_result();

    if ($query->num_rows > 0){
        $error = true;
        $emailError = "Provided email or password is already in use.";  //da usare            
    }
}

if(strlen($pass) < 6) {
    $error = true;
    array_push($errors,"pass must have atleast 6 characters.");  //da usare
}
else if ($pass != $passVal){
    $error = true;
    array_push($errors,"le due PW non coincidono"); //mettere qualcosa di sensato e non un echo
}

//pass encryption
$passEncrypted = hash('sha256', $pass);

//If all fields are right
    if ($error != 1) {
        $query = "UPDATE users SET userName = '$name', userEmail = '$email', userPass = '$passEncrypted' WHERE userEmail = '$oldEmail'";
        mysqli_query($connection, $query);
        $_SESSION["email"] = $email; 
        $_SESSION["loggedIn"] = true;
        header("Location: userProfile.php");
    }
}
?>