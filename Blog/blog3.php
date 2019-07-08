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
        <?php include("./../Template/navbar.php"); ?>
        <div class="panel">
            <div style="display: flow-root; padding: 35px;">
                <div style="display: flex;">
                    <div style="word-break: inherit; padding: 10px;">
                        <?php get_all_article(); ?>
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