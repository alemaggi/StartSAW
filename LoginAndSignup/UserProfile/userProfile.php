<?php
require_once('./../../connect.php');

session_start();
$email = $_SESSION["email"];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE userEmail='$email'";
$result = mysqli_query($conn, $query);

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

      <!--TEST-->
      <a href="editProfile.php" class="button1">Edit profile</a>
      <br id="btnSeparator">
      <a href="./../Logout/logout.php" class="button1">Logout</a>
      <br id="btnSeparator">
      <a href="./../../index.php" class="button1">Go to home page</a>

    </div>
  </div>
</div>

</body>
</html>