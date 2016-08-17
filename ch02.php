<?php



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
                            <li><a href="ch01.php">Chapter 1:<br/>Programming Made Simple</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="ch02.php">Chapter 2:<br/>Basic Operators and Loops</a></li>
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
        <div class="col-xs-12">
            <?php
            //this is what loads your XML file...
            //note the two periods beforehand... have to go up a directory to get to assets!!
            $ch01 = simplexml_load_file("../../assets/xml/ch02.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>Sometimes, whether a statement is executed is determined by a combination of several conditions.<br> You can use logical operators to combine these conditions to form a compound Boolean expression.<br> Logical operators, also known as Boolean operators, operate on Boolean values to create a new Boolean value.</p>
                <blockquote>Example of New Boolean is:<br> ! = not<br> ^ =	exclusive or<br>&& = and<br>! = not</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>The if statement in ComputeTax.java, makes selections based on a single true or false condition. There are four cases for computing taxes, which depend on the value of status.<br> To fully account for all the cases, nested if statements were used. Overuse of nested if statements makes a program difficult to read. Java provides a switch statement to simplify coding for multiple conditions. You can write the following switch statement to replace the nested if statement like this:</p>
                <blockquote> switch (status) {<br> case 0: compute tax for single filers;<br> Break;<br>case 1: compute tax for married jointly or qualifying widow(er);<br> break;<br>case 2:compute tax for married filing separately;<br> break;<br> case 3:compute tax for head of household;<br> break;<br> default:System.out.println("Error: invalid status");<br> System.exit(1); }</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>Conditional expressions are in a completely different style, with no explicit if in the statement. The syntax is: boolean-expression ? expression1 : expression2;</p>
                <blockquote>The result of this conditional expression is expression1 if boolean-expression is true; otherwise the result is expression2.<br> Suppose you want to assign the larger number of variable num1 and num2 to max.<br> You can simply write a statement using the conditional expression: max = (num1 > num2) ? num1 : num2;</blockquote>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <blockquote>The syntax for the while loop is:<br> while (loop-continuation-condition) {<br> // Loop body Statement(s); }</blockquote>
                <p>Another example of a while loop continuation is:</p> <blockquote>loop-continuation-condition is count < 100 and the loop body contains the following two statements:<br> int count = 0; while (count < 100) {<br> System.out.println("Welcome to Java!"); <br>count++;<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>A do-while loop is the same as a while loop except that it executes the loop body first and then checks the loop continuation condition.<br> The do-while loop is a variation of the while loop.<br></p><blockquote>Its syntax is: do {<br> // Loop body;<br> Statement(s);<br> } while (loop-continuation-condition);</blockquote> </p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>A for loop performs an initial action once, then repeatedly executes the statements in the loop body, and performs an action after an iteration when the loop- continuation-condition evaluates to true.</p>
                <blockquote>Often you write a loop in the following common form:<br> i = initialValue; // Initialize loop control variable<br> while (i < endValue) {<br> // Loop body<br> ...<br> i++; // Adjust loop control variable</blockquote><br><blockquote> A for loop can be used to simplify the preceding loop as:<br> for (i = initialValue; i < endValue; i++) {<br> // Loop body</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
                <p>The while loop and for loop are called pretest loops because the continuation condition is checked before the loop body is executed. The do-while loop is called a posttest loop because the condition is checked after the loop body is executed. The three forms of loop statements while, do-while, and for are expressively equivalent; that is, you can write a loop in any of these three forms.</p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle9; ?></h2>
                <p><?php echo $ch01->sect9; ?></p>
                <p>Nested loops consist of an outer loop and one or more inner loops. Each time the outer loop is repeated, the inner loops are reentered, and started anew.</p>
                <blockquote>Here is a multiplication program that uses nested loops:<br> public class MultiplicationTable {<br> /** Main method */<br> public static void main(String[] args) {<br> // Display the table heading <br>System.out.println(" Multiplication Table");<br> // Display the number title<br> System.out.print(" "); for(intj=1;j<=9;j++);<br>System.out.print("	" + j);<br>System.out.println("\numbers");<br>// Display table body<br> for (int i = 1; i <= 9; i++) {<br> System.out.print(i + " | ");<br> // Display the product and align properly<br> System.out.printf("%4d", i * j);<br> }<br> System.out.println();<br>}<br>}<br>} </blockquote>
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
