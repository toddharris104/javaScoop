<?php
/**
 * Created by PhpStorm.
 * User: tharris
 * Date: 7/17/16
 * Time: 3:19 PM
 */
//execute common to connect to DB
require("connect.php");
require_once("recaptchalib.php");
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
        <title>JavaScoop | Contact</title>
        <!--begin css-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap core CSS -->
        <link href="assets/css/offcanvas.css" rel="stylesheet"><!-- Custom styles for this template -->
        <link href="assets/css/index.css" type="text/css" rel="stylesheet"/><!--Our css-->
        <!--begin js-->
    </head>

    <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">Learn to write Java!</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chapters
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="ch01.php">Chapter 1:<br/>Programming Made Simple</a></li>
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
                    <li class="active"><a href="support.php">Support</a></li>

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
    <br/>
    <div class="container">
        <div class="row">
            <div class="jumbotron aboutUs" style="position: relative;">
                <br/>
                <h1>Contact Us</h1>
                <br/>
                <form>
                    <table id="supportTable" style="width:252px;text-align: right;"><!--LEFT SIDE-->
                        <tr>
                            <td>User:&nbsp;</td>
                            <td><input title="form_un" type="text" name="username" value="<?php echo $dispName; ?>" size="20"/>
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone:&nbsp;</td>
                            <td><input title="form_pn" type="tel" name="phonenumber" size="20"/>
                                <br/><br/>
                            </td>
                        </tr>

                        <tr>
                            <td>Email:&nbsp;</td>
                            <td><input title="form_em" type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" size="20" readonly="readonly"/>
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>Subject:&nbsp;</td>
                            <td><input title="form_sb" type="text" name="subject" placeholder="Problem?" </td>
                        </tr>
                    </table>
                    <div style="float:right;vertical-align: top;">
                        <?php
                        require_once("recaptchalib.php");
                        $publickey = "6LecmSUTAAAAAMwPon3QBVfuwmW71pZF5iMYUsoL";
                        echo recaptcha_get_html($publickey);
                        ?>
                    </div>
                    <br/>
                    <textarea title="textarea" style="width:318px; height:150px; border:1px ridge #88C8B7; max-width: 100%; max-height:350px; " placeholder="Your message.."></textarea>
                    <br/><br/>
                    <input type="submit"  class="btn btn-success" style="position: absolute; bottom:20px; left:60px;" />
                </form>
            </div>
        </div>
    </div>

    <footer id="footMe">
        <div style="position: relative; left: -50%; z-index:-1;"><!--This centers inside the absolute div-->
            <p>&copy; 2016 ITT Project<br/>Our Rights Reserved</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/scripts/offcanvas.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    </body>
</html>

