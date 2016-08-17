<?php
    //connect DB
    require("connect.php");
    require_once("recaptchalib.php");
    $privatekey = "6LecmSUTAAAAAIji401-YMFPs7kZ2F-0Cj1S2Or_";
    $resp = recaptcha_check_answer($privatekey,
                                $_SERVER['REMOTE_ADDR'],
                                $_POST['recaptcha_challenge_field'],
                                $_POST['recaptcha_response_field']);
    $errors = array(); //see edit_account for my notes on this method of error catching
    //is registration form empty?
    if(!empty($_POST)) {
        //username blank validation
        if(empty($_POST['username'])) {
            $errors[] = 'Username cannot be blank';
        }
        //Password blank validation
        if(empty($_POST['password'] ) || empty($_POST['password2'])) {
            $errors[] = 'Password field cannot be blank';
        }
        //Password match validation
        if($_POST['password'] != $_POST['password2']) {
            $errors[] = 'Passwords do not match';
        }
        //email validation
        if(!filter_var($_POST['email'], FILTER_SANITIZE_STRING, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email entered in an invalid format';
        }
        //reCaptcha validation
        if(!$resp->is_valid) {
            $errors[] = 'Please check the box to validate you are human';
        }
        $strCountUN = substr_count($_POST['username'], " ");
        if($strCountUN > 0) {
            $errors[] = 'Cannot have a space in your username';
        }
        //username already exists validation
        $query = "SELECT 1 FROM users WHERE username = :username";
        //this method is referred to as using special tokens.. (:username)
        //This is a best practice and more secure than just using the value in $_POST['username']
        //The hacks that would be vulnerable to is called SQL injections!! google it
        $query_params = array(':username' => $_POST['username']);
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage()); 
        }
        //fetch method returns an array representing the "next" row from
        //results, or false no more rows exist to fetch.
        $row = $stmt->fetch();
        //if row was found, do not continue... user already exists
        if($row) {
            $errors[] = 'This username is already in use';
        }
        //email already exists validation
        $query = "SELECT 1 FROM users WHERE email = :email";
        $query_params = array(':email' => $_POST['email']);
        try {
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage()); 
        } 
        $row = $stmt->fetch();
        if($row) {
            $errors[] = 'This email address is already registered';
        }
        /*
         * if $errors passes the guantlet and does not have any value... query runs:
         */
        if(count($errors) == 0) {
            $query = "INSERT INTO users (username,password,salt,email) VALUES (:username,:password,:salt,:email)";
            //salting and hashing password
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt);
            //The following is badass:
            //The purpose of this is to hash the hash value 65,536 more times. This protects
            //against brute force attacks. Now an attacker must compute the hash 65537
            //times for each guess they make against a password, whereas if the password
            //were hashed only once the attacker would have been able to make 65537 different
            //guesses in the same amount of time instead of only one.
            for ($round = 0; $round < 65536; $round++) {
                $password = hash('sha256', $password . $salt);
            }
            //ensures all data stored in DB is lower case... will capitalize when needed in our code
            $tmpname = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
            $tmpname = strtolower($tmpname);
            $tmpemail = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
            $tmpemail = strtolower($tmpemail);
            //preparing tokens to insert into DB
            $query_params = array(
                ':username' => $tmpname,
                ':password' => $password,
                ':salt' => $salt,
                ':email' => $tmpemail
            );
            //this executes the query
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
            $_SESSION["nicename"] = $tmpname;
            //back to login we go
            header("Location: index.php");
            die("Redirecting to index.php");
        }
        else {
            $error[] = "Something went wrong...";
        }
    }
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>JavaScoop | Register</title>
        <!--begin css-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap core CSS -->
        <link href="assets/css/offcanvas.css" rel="stylesheet"><!-- Custom styles for this template -->
        <link href="assets/css/index.css" type="text/css" rel="stylesheet"/><!--Our css-->
        <!--begin js-->
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                    <li class="active"><a href="main.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="support.php">Support</a></li>

                </ul>
                <ul id="buttonNav" class="nav navbar-nav pull-right">
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
                <div class="jumbotron aboutUs" style="position:relative;padding-bottom:20px!important;width:65%;padding:right:0px!important;">
                    <h1>Registration</h1>
                    <form action="register.php" method="post">
                        <table id="registerTable">
                            <tr>
                                <th>Username:</th>
                                <th>E-Mail:</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="username" value="" size="20"/></td>&nbsp;&nbsp;
                                <td><input type="text" name="email" value="" size="20"/></td>
                            </tr>
                            <tr>
                                <th>Password:</th>
                                <th>Confirm:</th>
                            </tr>
                            <tr>
                                <td><input type="password" name="password" value="" size="20"/></td>&nbsp;&nbsp;
                                <td><input type="password" name="password2" value="" size="20"/></td>
                            </tr>
                        </table>
                        <br/>
                        <?php
                            require_once("recaptchalib.php");
                            $publickey = "6LecmSUTAAAAAMwPon3QBVfuwmW71pZF5iMYUsoL";
                            echo recaptcha_get_html($publickey);
                        ?>
                        <br/>
                        <input type="submit" value="Register" class="btn btn-success" />
                        <br/><br/>
                        <?php
                        if(count($errors) > 0){
                            echo '<ul style="color:darkred; list-style-type: square;">';
                            foreach($errors as $e){
                                echo '<li>' . $e . '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </form>
                </div>
            </div><!--row-->
        </div><!--container-->
        <footer id="footMe" style="position: relative;">
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