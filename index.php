<?php
    //connect.php connects to DB
    require("connect.php");
    //stores the last username input in case of failed login attempt
    $submitted_username = '';
    //if statement checks to determine whether the login form has been submitted
    if(!empty($_POST)) {
        $query = " SELECT id,username,password,salt,email FROM users WHERE username = :username";
        //parameter values
        $query_params = array(':username' => $_POST['username']);
        try {
            //query the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        //has user logged in? initilized to false
        $login_ok = false;
        // Retrieve the user data from the database.  If $row is false, then the username doesn't exist
        $row = $stmt->fetch();
        if($row) {
            //check salt hash
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++) {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
            if($check_password === $row['password']) {
                //if it matches, $login_ok is true
                $login_ok = true;
            }
        }
        if($login_ok) {
            //storing row array into server session.. removing salt+password for best practice
            unset($row['salt']);
            unset($row['password']);
            //this will store the user into server session
            $_SESSION['user'] = $row;
            //redirect user after successful login
            header("Location: main.php");    //need to change this later for full site
            die("Redirecting to: main.php");
        }
        else {
            $loginError = "Login Failed!";
            //put username back so all that is needed is to reeneter the password
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
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
                        <li class="active"><a href="index.php">Login to Start</a></li>
                    </ul>

                    <form action="index.php" method="post">
                        <ul id="buttonNav" class="nav navbar-nav pull-right" >
                            <li style="color:red; margin:auto; line-height: 47px;">
                                <?php
                                if($loginError == "Login Failed!") {
                                    echo $loginError;
                                }
                                ?>
                            </li>
                            <li><input type="text" name="username" value="<?php echo $_SESSION['nicename']; ?>" placeholder="Username" size="14"/></li>
                            <li><input type="password" name="password" value="" placeholder="Password" size="14"/></li>
                            <li class="active"><input type="submit" value="Login" class="btn btn-info"/></li>
                            <li class="active">
                                <input id="registerURL" type="button" value="Register" class="btn btn-success" />
                            </li>
                            <script>
                                document.getElementById("registerURL").onclick = function() {
                                    location.href = "register.php";
                                }
                            </script>
                        </ul>
                    </form>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->

        <div class="mainLogo">
            <img id="mainLogo" src="assets/images/CapstoneLogo-min.png"/><br/>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="assets/scripts/typed.js" type="text/javascript"></script>
        <script src="assets/scripts/index.js" type="text/javascript"></script>
        <div class="typewriter">
            <span class="indexTyped" style="white-space:pre"></span><span style="color:#000;"> Java</span>
        </div>

        <footer id="footMe">
            <div style="position: relative; left: -50%;"><!--This centers inside the absolute div-->
                <p>&copy; 2016 ITT Project<br/>Our Rights Reserved</p>
            </div>
        </footer>


        <!-- Bootstrap core JavaScript-->
        <script src="assets/scripts/bootstrap.min.js"></script>
        <script src="assets/scripts/offcanvas.js"></script>
    </body>
</html>