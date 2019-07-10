<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="navbar.css">
    
    <!--NEW NAV-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="./../index.php#">Start Saw</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./../index.php#AboutUsSection">ICO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../index.php#SolutionCard">SERVICES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../index.php#PricingSectio">PRICING</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../Blog/blog.php">BLOG</a>
            </li>
            <li class="nav-item" id="loginSignupBtn">
                <?php 
                //Se l'utente è gia loggato non faccio vedere nella navbar il bottone LOGIN/SIGNUP
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
                    <script type='text/javascript'>
                        $(document).ready(function(){
                            document.getElementById("loginSignupBtn").style.display = "none";
                        });
                    </script>
                <?php 
                }
                else { ?>
                    <a href="./../LoginAndSignup/loginSingupIndex.html" class="nav-link">SIGN IN/LOGIN</a>
                <?php } ?>
            </li>
            <li class="nav-item" id="profileBtn">
            <?php 
            //Se l'utente non è loggato non faccio vedere nella navbar il bottone PROFILE
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
                <a href="./../LoginAndSignup/UserProfile/userProfile.php" class="nav-link">PROFILE</a>
                <?php 
                }
                else { ?>
                    <script type='text/javascript'>
                        $(document).ready(function(){
                            document.getElementById("profileBtn").style.display = "none";
                        });
                    </script>
                <?php } ?>
            </li>
            <li class="nav-item" id="postOnBlog">
            <?php 
            //Se l'utente non è loggato non faccio vedere nella navbar il bottone per postare sul blog
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
                <a href="./../Blog/blog4.html" class="nav-link">POST ON BLOG</a>
            <?php 
            }
            else { ?>
                <script type='text/javascript'>
                    $(document).ready(function(){
                        document.getElementById("postOnBlog").style.display = "none";
                    });
                </script>
            <?php } ?>
        </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="./../Blog/search.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search in blog</button>
            </form>
        </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>