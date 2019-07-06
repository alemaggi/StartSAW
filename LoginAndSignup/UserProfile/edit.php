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
    array_push($errors,"Please enter your full name. ");
}

//email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = true;
    array_push($errors,"Please enter valid email address. ");
}
else {
    // check email exist or not and password
    if ($oldEmail == $email){
        $error = true;
        array_push($errors,"Provided email or password is already in use. ");     
    }
}

if(strlen($pass) < 6) {
    $error = true;
    array_push($errors,"pass must have atleast 6 characters. ");
}
if ($pass != $passVal){
    $error = true;
    array_push($errors,"le due PW non coincidono. ");
}

//pass encryption
$passEncrypted = hash('sha256', $pass);

//controllo che la nuova password sia diversa da quella vecchia
//NON FUNZIONA
$query= mysqli_query($connection ,"SELECT * FROM users WHERE userEmail = '$oldEmail' ") or die(mysql_error());
$arr = mysqli_fetch_array($query);
if($arr['userPass'] == $passEncrypted) {
    $error = true;
    array_push($errors,"La nuova password non può coincidere con la vecchia. ");
}

//If all fields are right
    if ($error != 1) {
        $query = "UPDATE users SET userName = '$name', userEmail = '$email', userPass = '$passEncrypted' WHERE userEmail = '$oldEmail'";
        mysqli_query($connection, $query);
        $_SESSION["email"] = $email; 
        $_SESSION["loggedIn"] = true;
        header("Location: userProfile.php");
    }
    //display degli errori
    if (!empty($errors)) {
        foreach ($errors as $item){
            echo $item;
        }
    }
}
?>