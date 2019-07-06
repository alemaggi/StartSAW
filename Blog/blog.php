<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <?php 
            function get_recent() {
              include "connection.php";
              
              $query = "SELECT title, description FROM articolo";
              $result = $conn->query($query);
              $x = 1;
              while($x<=5) {
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $title = $row["title"];
                  $des = $row["description"];
                  echo "<div class = recent>" . "<h2>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title . "</a>" . "</h2>" . "<p class= des>" . $des . "</p>" . "</div>"; 
                  $x++;
                }
                else echo "Si è verificato un problema!";
              }
            }

            function get_most_viewed(){
              include "connection.php";
              $query = "SELECT title, description, views, id FROM articolo ORDER BY views DESC";
              $result = $conn->query($query);
              $x = 1;
              while($x<=5) {
                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $title = $row["title"];
                      $des = $row["description"];
                      $idMostViewed = $row["id"];
                      echo "<div class = recent>" . "<h2>" . "<a href='blog2.php' id= $idMostViewed  onclick='get_id(this.id)'>". $title . "</a>" . "</h2>" . $des . "</div>"; 
                      $x++;
                  }
              }
            }

            function get_article($x) {
              include "connection.php";
              $i = $x;
              $query2 = "SELECT title, text, picture FROM articolo";
              $result2 = $conn->query($query2);
              if ($result2->num_rows > 0) { 
                while($i > 0) {
                  $row2 = $result2->fetch_assoc();
                  $title2 = $row2["title"];
                  $text = $row2["text"];
                  $i--; 
                }
                  echo '<img src="data:image/jpeg;base64, '.base64_encode( $row2['picture'] ).'" style= "width:100%; border-block-end-style:solid;" >' . "<h1>" . "<a href='blog2.php' id= $x  onclick='get_id(this.id)'>". $title2 . "</a>" . "</h1>" . $text;
              }
              else echo "Si è verificato un problema!";
            }

        ?>
    </head>

    <body>
      
    <?php include("./../Template/navbar.html"); ?>

        <div class="container-fluid;">

          <div class="panel">
            <div class="row">
              <div class="col-md-8"> 
                <?php get_article(1); ?>
              </div>

              <div class="col-md-4" style="position: relative; word-break: inherit;">
                <h1>Pi&ugrave; Recenti</h1>
                <?php get_recent();?>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-3"style="word-break: inherit;">  
              <h1>Pi&ugrave; Visti</h1>
                <?php get_most_viewed();?>
              </div>

              <div class="col-md-9" style="word-break: inherit;">
                <?php get_article(2); ?>
              </div>
            </div>

            <div style="display: flex;">
              <div style="width: 15%;">
              </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <?php get_article(3); ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6" style="word-break: inherit; margin-top: 10px;">
                <?php get_article(5); ?>
              </div>

              <div class="col-md-6" style="word-break: inherit; margin-top: 10px;">
                <?php get_article(6); ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5"></div>
                <div class="col-md-2">
                  <a href="blog3.php"> <button type="button" class="btn btn-secondary" style="align: right;">Tutti gli articoli</button> </a>
                </div>
            </div>
          </div>

          <script type="text/javascript">
            function get_id(clicked_id){
              var id_topass = clicked_id;
              document.cookie = "id="+id_topass;
            } 
          </script>

        

    </body>

    
</html>