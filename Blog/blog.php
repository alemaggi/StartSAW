<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <?php include "functions.php";?>

    <body>
        <?php include("./../Template/navbar.html"); ?>
  
        <div class="container-fluid;">

          <div class="panel">
            <div class="row">
              <div class="col-md-8"> 
                <?php get_article(1); ?>
              </div>

              <div class="col-md-4" style="position: relative; word-break: inherit;">
                <h1>Più recenti</h1>
                <?php get_recent();?>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-3"style="word-break: inherit;">  
              <h1>Più visti</h1>
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
                <?php get_article(4); ?>
              </div>

              <div class="col-md-6" style="word-break: inherit; margin-top: 10px;">
                <?php get_article(5); ?>
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