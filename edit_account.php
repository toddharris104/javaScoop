<?php
    //connect to DB
    require("connect.php");
    //check if user is logged in
    if(empty($_SESSION['user'])) {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
    //used this method of collecting errors for further validation...
    //but as for now, we only validate email address
    $errors = array();
    //check if edit_account form has been submitted..
    //if it has, then then update account
    if(!empty($_POST)) {
        //validating email address
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email entered in an invalid format';
        }

        //If user enters new password, need to hash and generate new salt
        if(!empty($_POST['password'])) {
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $_POST['password'] . $salt); 
            for($round = 0; $round < 65536; $round++) {
                $password = hash('sha256', $password . $salt); 
            } 
        } 
        else {
            //if user did not enter a new password
            $password = null; 
            $salt = null; 
        } 

        //if form has no errors, proceed with insert query
        if(count($errors) == 0) {
            //ensures all data stored in DB is lower case... will capitalize when needed in php
            $tmpemail = $_POST['email'];
            $tmpemail = strtolower($tmpemail);
            //Initial query parameter values
            $query_params = array(
                ':email' => $tmpemail,
                ':user_id' => $_SESSION['user']['id'],
            );
            //need parameter values for the new password hash and salt.
            if ($password !== null) {
                $query_params[':password'] = $password;
                $query_params[':salt'] = $salt;
            }

            //First half of the query.. will add to this depending on password change or not
            $query = "UPDATE users SET email = :email";
            //if password changed, append to previous query to include new password
            if ($password !== null) {
                $query .= ", password = :password, salt = :salt";
            }
            //update query so that it only updates current user
            $query .= "WHERE id = :user_id";
            //Execute the query
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                $errors[] = 'Failed to run query';
                //die("Failed to run query: " . $ex->getMessage());
            }
            //update the data stored in the $_SESSION
            $_SESSION['user']['email'] = $_POST['email'];
            //redirects back to the main page
            header("Location: main.php");
            // Calling die or exit after performing a redirect using the header function
            // is critical.  The rest of your PHP script will continue to execute and
            // will be sent to the user if you do not die or exit.
            die("Redirecting to main.php");
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
        <title>JavaScoop | Account</title>
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
                    <li><a href="support.php">Support</a></li>

                </ul>
                <ul id="buttonNav" class="nav navbar-nav pull-right">
                    <li><input id="myAccountButton" type="button" value="My Account" class="btn btn-info active"/></li>
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

    <div class="typewriter">
        <span>Account info</span>
    </div>

    <div class="container" style="margin-top:60px;">
        <div class="row">
            <div class="jumbotron aboutUS">
                <form action="edit_account.php" method="post">
                    <h3>Username: <?php
                        echo $dispName;
                        ?></h3>
                    <span>E-Mail Address:</span><br />
                    <input type="text" name="email" value="<?php
                            echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8');
                            ?>" />
                    <br /><br />
                    <span>Password:</span><br />
                    <input type="password" name="password" value="" /><br />
                    <i>(leave blank if you do not want to change your password)</i>
                    <br /><br />
                    <input type="submit" value="Update Account"  class="btn btn-success"/>
                    <?php
                    if(count($errors) > 0){
                        echo '<ul style="color:darkred; list-style-type: square;">';
                        foreach($errors as $e){
                            echo '<li>' . $e . '</li>';
                        }
                        echo '</ul><br/>';
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="jumbotron aboutUS">
                <h3>Memberlist</h3>
                <table class="tableClass">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>E-Mail Address</th>
                    </tr>
                    <?php
                    $query = "SELECT id,username,email FROM users";
                    try {
                        //these run query against DB
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                    }
                    catch(PDOException $ex) {
                        die("Failed to run query: " . $ex->getMessage());
                    }
                    //using fetchAll, we retrieve all rows found in DB
                    $rows = $stmt->fetchAll();
                    foreach($rows as $row): ?>
                        <tr>
                            <td><?php echo $row['id'];//htmlentities not needed here because $row['id'] is always integer?></td>
                            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

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
