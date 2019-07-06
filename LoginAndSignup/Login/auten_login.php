<?php  
// Inialize session
session_start();

require('./../db_connect.php');

if (isset($_POST['email']) and isset($_POST['pass'])){
	
    // Assigning POST values to variables.
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['pass']);

    //encryption
    $pass = hash('sha256', $password);

    //Array di errrori
    $errors = array();
    //Check per errori
    if(empty($email)){
        array_push($errors, "L'email è obbligatoria"); 
    }
    if(empty($password)) { 
        array_push($errors, "La password e' obbligatoria"); 
    }

    //Check for records in the table
    $query = $connection->prepare("SELECT * FROM users WHERE userEmail = ? AND userPass = ?");
    if (!$query){
        echo "Prepared failed";
    }
    $query->bind_param('ss',$email,$pass) or die("Binding failed");
    $result = $query->execute();
    $query->store_result();

    if ($query->num_rows > 0){
        //Ho un risultato dalla query
        session_start();
        $_SESSION["email"] = $email; 
        $_SESSION["loggedIn"] = true;
        header("Location: ./../UserProfile/userProfile.php");
    }
    else{
        array_push($errors, "Credienziali sbagliate"); 
    }
    //display degli errori
    if (!empty($errors)) {
        foreach ($errors as $item){
            echo $item . ". ";
        }
    }
}
?>