<?php
/**
 * Created by PhpStorm.
 * User: tharris
 * Date: 7/13/16
 * Time: 4:51 PM
 */
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
        <title>JavaScoop</title>
        <!--begin css-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap core CSS -->
        <link href="assets/css/offcanvas.css" rel="stylesheet"><!-- Custom styles for this template -->
        <link href="assets/css/index.css" type="text/css" rel="stylesheet"/><!--Our css-->
        <!--being js-->

    </head>
    <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">Learn to write Java!</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chapters
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="ch01.php">Chapter 1:<br/>Programming Made Simple</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch02.php">Chapter 2:<br/>Basic Operators and Loops</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch03.php">Chapter 3:<br/>Methods and Variables in Java</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch04.php">Chapter 4:<br/>Single-Dimensional and Multidimensional Arrays</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch05.php">Chapter 5:<br/>Objects Classes and Strings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch06.php">Chapter 6:<br/>Thinking in objects</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch07.php">Chapter 7:<br/>Inheritance and Polymorphism</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch08.php">Chapter 8:<br/>GUI Basics and Graphics</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch09.php">Chapter 9:<br/>Exception Handling and Text I/O</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch10.php">Chapter 10:<br/>Abstract Classes and Interfaces</a></li>
                        </ul>
                    </li>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="support.php">Support</a></li>

                </ul>
                <ul id="buttonNav" class="nav navbar-nav pull-right">
                    <li><input id="myAccountButton" type="button" value="My Account" class="btn btn-info"/></li>
                    <li><input id="logoutButton" type="button" value="Logout" class="btn btn-danger"/></li>
                    <script>
                        document.getElementById("myAccountButton").onclick = function() {
                            location.href = "edit_account.php";
                        };
                        document.getElementById("logoutButton").onclick = function() {
                            location.href = "logout.php";
                        }
                    </script>
                </ul>
                <div class="navbar-header pull-right">
                    <a class="navbar-brand ">
                        Welcome, <?php
                        $dispName = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
                        $dispName = ucfirst($dispName);
                        echo $dispName;
                        ?>
                    </a>
                </div>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->



<br/><br/>
<div class="container">
    <div class="row">
        <div class="col-xs-12 ">
            <?php
            //this is what loads your XML file...
            //note the two periods beforehand... have to go up a directory to get to assets!!
            $ch01 = simplexml_load_file("assets/xml/ch01.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle9; ?></h2>
                <p><?php echo $ch01->sect9; ?></p>
            </div>

            <br/><br/><br/>
        </div>
    </div>


    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/scripts/offcanvas.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    </body>
</html>
