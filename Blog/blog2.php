<!DOCTYPE html>
<?php
    date_default_timezone_set('Europe/Rome');
    //include "./../LoginAndSignup/Login/auten_login.php";
    //session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
        <script type="text/javascript">
            function reload() {
                location.replace("blog2.php")
            }
        </script>
        <?php include "functions.php";?>
    </head>

    <body>    
    <?php include("./../Template/navbar.php"); ?>
    <div class="container-fluid">
            <div class="panel">
                <div class="row">

                        <div class="col-md-3" style="position: relative; word-break: inherit;">
                            <h1>Pi&ugrave; Recenti</h1>
                            <?php get_recent();?>
                        </div>

                        <div class="col-md-6">
                            <?php get_article();?>
                        </div>

                        <div class="col-md-3">
                            <h1>Pi&ugrave; Visti</h1>
                            <?php get_most_viewed(); ?>
                        </div>
                </div>
                <!-- comment section !-->
                <div class="container-fluid" style="word-break: inherit;">
                
                <div id="commentSection">
                    <div class="comment-container">
                        <h2>Commenti</h2>

                        <?php show_comments(); ?>

                    </div>

                        
                        <div style="border-block-end-style: solid;">
                            <div class="row">
                                <div class="col-md-9">
                                <?php
                                    $name = " ";
                                    if (isset($_SESSION["email"])) {
                                        $name = $_SESSION["email"];
                                    }
                                    else {
                                        $name = "Anonymous";
                                    }
                                    echo "<form method='POST' action='".add_comment()."'>
                                        <input type='hidden' name='idUser' value= ".$name." >
                                        <input type='hidden' name='date' value='".date('Y-m-d')."'>
                                        <textarea id='TextArea' class='commento' rows=5 name='comment' style='background: transparent; color: black; width: 100%; '></textarea><br>
                                        <button type='submit' name='addComment' onchange='showComment()' class='btn btn-secondary' style='margin-block-end: 5px; margin-top: 5px;'>Add Comment</button>
                                    </form> ";
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <a href="blog3.php"> <button type="button" class="btn btn-secondary" style="align: right; margin-top: 5px;">Tutti gli articoli</button> </a>
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

    <?php include("./../Template/footer.php"); ?>
        
    </body>
    
</html>