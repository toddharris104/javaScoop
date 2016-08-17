<?php
    //execute common to connect to DB
    require("connect.php");
    //check if session exists, if not.. redirect to login
    if(empty($_SESSION['user'])) {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
    //can display the username by reading from the session array.. because username is user
    //submitted content, MUST use htmlentities on it BEFORE displaying it to the user.
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>JavaScoop | Members</title>
        <!--begin css-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap core CSS -->
        <link href="assets/css/offcanvas.css" rel="stylesheet"><!-- Custom styles for this template -->
        <link href="assets/css/index.css" type="text/css" rel="stylesheet"/><!--Our css-->
    </head>

    <body>
        <nav id="myNavbar" class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Learn to write Java!</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Chapters<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="main.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="support.php">Support</a></li>

                    </ul>
                    <ul id="buttonNav" class="nav navbar-nav navbar-right">
                        <div class="navbar-header">
                            <a class="navbar-brand ">
                                Welcome, <?php
                                $dispName = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
                                $dispName = ucfirst($dispName);
                                echo $dispName;
                                ?>
                            </a>
                        </div>

                        <li><input id="myAccountButton" type="button" value="My Account" class="btn btn-info"/></li>
                        <li><input id="logoutButton" type="button" value="Logout" class="btn btn-danger"/></li>
                        <script>
                            document.getElementById("myAccountButton").onclick = function() {
                                location.href = "edit_account.php";
                            }
                            document.getElementById("logoutButton").onclick = function() {
                                location.href = "logout.php";
                            }
                        </script>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <div class="mainLogo">
            <img id="mainLogo" src="assets/images/CapstoneLogo-min.png"/><br/>
        </div>
        <div class="typewriter">
            <span>Main</span>
        </div>

        <footer id="footMe">
            <div style="position: relative; left: -50%; z-index:-1;"><!--This centers inside the absolute div-->
                <p>&copy; 2016 ITT Project<br/>Our Rights Reserved</p>
            </div>
        </footer>

        <!--begin js-->
        <script src="assets/scripts/offcanvas.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="assets/scripts/bootstrap.min.js"></script>
    </body>
</html>






