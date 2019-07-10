<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Fonts and Icons-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Blockchain SAW</title>

    <?php
        $browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        if ($browser == true){
            $browser = 'iphone';
    }
    ?>

    <!-- Cambio l' immagine di header su iphone -->
    <?php if($browser == 'iphone'){ ?>
        <style>
            #HeaderImg{
                /* Sizing */
                width: 100vw;
                height: 80vh;
                /* Flexbox stuff */
                display: flex;
                justify-content: center;
                align-items: center;
                /* Text styles */
                text-align: center;
                color: white;
                /* Background styles */
                background-image: url("./Img/Iphone.png");
                background-size: cover;
                object-fit: cover;
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    <?php } ?>  

    <!--NEW NAV-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Start Saw</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="#AboutUsSection">ICO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#SolutionCard">SERVICES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#PricingSectio">PRICING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./Blog/blog.php">BLOG</a>
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
                <a href="./LoginAndSignup/loginSingupIndex.html" class="nav-link">SIGN IN/LOGIN</a>
            <?php } ?>
        </li>
        <li class="nav-item" id="profileBtn">
            <?php 
            //Se l'utente non è loggato non faccio vedere nella navbar il bottone PROFILE
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
                <a href="./LoginAndSignup/UserProfile/userProfile.php" class="nav-link">PROFILE</a>
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
        </ul>
        <form class="form-inline my-2 my-lg-0" action="./Blog/search.php" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search in blog</button>
        </form>
    </div>
    </nav>

    <!-- Header image with title -->
    <!-- Font for the header-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900&display=swap" rel="stylesheet">
    <section class="headerOutside" id="HeaderImg">
        <div class="headerInside">
            <h1>BLOCKCHAIN STARTUP</h1>
        </div>
    </section>

    <div class="aboutAndIcoSection">
    <!-- About us section -->
    <div class="container-fluid" id="AboutUsSection">
        <h1 id="aboutUsTitle">ABOUT US</h1>
        <p id="aboutUsParag"> 
            SAW provides users, developers, and startups with innovative blockchain technologies. We aim to create an entire ecosystem of linked chains and a virtual spiderweb of endless use-cases that make ARK highly flexible, adaptable, and scalable. ARK is a secure platform designed for mass adoption and will deliver the services that consumers want and developers need.
        </p>
    </div>
    <!-- Token generation timer -->
    <div class="container" id="TIMEMAP">
        <div class="row align-items-center" id="firstRowTimer">
            <div class="col"></div>
            <div class="col-8" id="col-10Timer">
                <p id="TimerTitle">ICO Token Generation Timer</p>
                <div class="row" id="timerRow">
                    <div class="col-2" id="col-2Timer" ></div>
                    <div class="col-2" id="col-2Timer">
                        <div class="numberBox">
                            <p id="days"></p>
                            <div class="wordBox"> <h2>Days</h2> </div>
                        </div>
                    </div>
                    <div class="col-2" id="col-2Timer">
                        <div class="numberBox">
                            <p id="hour"></p>
                            <div class="wordBox"> <h2>Hours</h2> </div>                    
                        </div>
                    </div>
                    <div class="col-2" id="col-2Timer">
                        <div class="numberBox">
                            <p id="min"></p>
                            <div class="wordBox"> <h2>Min</h2> </div>
                        </div>
                    </div>
                    <div class="col-2" id="col-2Timer">
                        <div class="numberBox">
                            <p id="sec"></p>
                            <div class="wordBox"> <h2>Sec</h2> </div>
                        </div>
                    </div>
                    <div class="col-2" id="col-2Timer"></div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- Token generation progress bar -->  
    
    <?php
        include_once 'db_connection.php';
        include_once 'connect.php';

        $query="SELECT userName, quantity FROM money";

        $result = $conn->query($query);
        $x = 0;
        $cap = 2000000; //ICO market cap
        $val = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $x = $x + $row["quantity"];
            }
            $_SESSION["sommaToken"] = $x;
            if ($x >= $cap) $val = 100;
            else {
                $val = (100 * $x) / $cap;
            }
        }
    ?>

    <div class="progessBarContainer" id="pbContainer">
            <div class="container">
            <!--DA SISTEMARE 
            <h4 id="targetHeader">Target 200`0000 $</h4>
            <h4 id="currentValueHeader"><?php //echo "Current value: " .$x ." $"?></h4> -->
            <p id="ICOProgressTitle">ICO Progress bar</p>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-10">
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $val . "%"; ?>; background: white;">
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>   
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary btn-lg" id="buyToken">
                            <?php 
                            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
                                <a href="./Checkout/checkoutForm.php">BUY TOKEN</a>
                            <?php 
                            }
                            else { ?>
                                <a href="./LoginAndSignup/loginSingupIndex.html">BUY TOKEN</a>
                            <?php }?>
                        </button>                     
                    </div>
                    <div class="col-2">    
                        <button type="button" class="btn btn-primary btn-lg" id="seeChart">
                            <a href="./RealTimeChart/index.html">SEE CHART</a>
                        </button>
                    </div>
                    <div class="col-4"></div>
                </div>
                <br>
            </div>
        </div>

    <!-- Solution -->
    <section class="pricing py-5" id="SolutionCard">
            <h1 id="ServicesTitle">SERVICES</h1>
            <div class="container">
                <div class="row">
                <!-- First Service -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">SECURITY</h5>
                        <h5 class="card-title text-muted text-uppercase text-center">
                            <img src="./Img/fingerPrint.png" alt="">
                        </h5>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                    </div>
                    </div>
                </div>
                <!-- Second Service -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">TRANSPARENCY</h5>
                        <h5 class="card-title text-muted text-uppercase text-center">
                            <img src="./Img/door.png" alt="">
                        </h5>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                    </div>
                    </div>
                </div>
                <!-- Third Service -->
                <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">environmental friendliness</h5>
                            <h5 class="card-title text-muted text-uppercase text-center">
                                <img src="./Img/Tree.png" alt="">
                            </h5>
                            <hr>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                        </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                <!-- First Service -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Reliabilty</h5>
                        <h5 class="card-title text-muted text-uppercase text-center">
                            <img src="./Img/rel.png" alt="">
                        </h5>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                    </div>
                    </div>
                </div>
                <!-- Second Service -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Blockchain is Cool</h5>
                        <h5 class="card-title text-muted text-uppercase text-center">
                            <img src="./Img/cool.png" alt="">
                        </h5>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                    </div>
                    </div>
                </div>
                <!-- Third Service -->
                <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Easy to use</h5>
                            <h5 class="card-title text-muted text-uppercase text-center">
                                <img src="./Img/easy.png" alt="">
                            </h5>
                            <hr>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, obcaecati? Harum laudantium perspiciatis fuga voluptatem. Unde nisi a deleniti ipsum quo laborum ipsa. Aperiam accusamus, labore autem perferendis distinctio iste.</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    <!-- Pricing section-->
    <section class="pricing py-5" id="PricingSectio">
        <h1 id="PricingTitle">PRICING</h1>
        <h1 id="PricingSecondTitle">LET'S SKYROCKET YOUR BUSINESS</h1>
        <div class="container">
            <div class="row">
            <!-- Free Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Free</h5>
                    <h6 class="card-price text-center">$0<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                    <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
                    <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="./UnderConstruction/index.html" class="btn btn-block btn-primary text-uppercase">Button</a>
                </div>
                </div>
            </div>
            <!-- Plus Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                    <h6 class="card-price text-center">$99<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                    <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="./UnderConstruction/index.html" class="btn btn-block btn-primary text-uppercase">Button</a>
                </div>
                </div>
            </div>
            <!-- Pro Tier -->
            <div class="col-lg-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
                    <h6 class="card-price text-center">$199<span class="period">/month</span></h6>
                    <hr>
                    <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
                    </ul>
                    <a href="./UnderConstruction/index.html" class="btn btn-block btn-primary text-uppercase">Button</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Me</small>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>