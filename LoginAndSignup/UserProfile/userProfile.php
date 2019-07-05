<?php
require_once('./../db_connect.php');

session_start();
$email = $_SESSION["email"];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE userEmail='$email'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
$name=$row['userName'];
$email=$row['userEmail'];
}
?>

<!--TEST-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="userProfile.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 details">
      <blockquote>
        <h5> Name: <?php echo $name ?></h5>
      </blockquote>
      <p>
      Email: <?php echo $email ?>
      <br>
      </p>
      <button><a href="editProfile.php">Edit profile</a></button>
      <button><a href="./../Logout/logout.php">Logout</a></button>
      <button><a href="./../../index.php">Go to home page</a></button>
    </div>
  </div>
</div>

</body>
</html>