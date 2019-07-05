<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include "functions.php";?>
    </head>

    <body>    
        <?php include("./../Template/navbar.html"); ?>
        <div class="container-fluid">
            <div style="display: flow-root; margin: 25px; background-color: aliceblue; padding: 15px;">
                <div class="row">

                        <div class="col-md-3" style="position: relative; word-break: inherit;">
                            <h1>Pi&ugrave; Recenti</h1>
                            <?php get_recent();?>
                        </div>

                        <div class="col-md-6">
                            <?php get_article(); ?>
                        </div>

                        <div class="col-md-3">
                            <h1>Pi&ugrave; Visti</h1>
                            <?php get_most_viewed(); ?>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <a href="blog3.php"> <button type="button" class="btn btn-secondary" style="align: right;">Tutti gli articoli</button> </a>
                    </div>
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