<?php
/**
 * Created by PhpStorm.
 * User: tharris
 * Date: 7/13/16
 * Time: 4:51 PM
 */

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
                            <li><a href="ch02.php">Chapter 2:<br/>Basic Operators and Loops</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="ch03.php">Chapter 3:<br/>Methods and Variables in Java</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="ch04.php">Chapter 4:<br/>Single-Dimensional and Multidimensional Arrays</a></li>
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
        <div class="col-xs-12">
            <?php
            //this is what loads your XML file...
            //note the two periods beforehand... have to go up a directory to get to assets!!
            $ch01 = simplexml_load_file("../assets/xml/ch04.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>An array is used to store a collection of data, but often we find it more useful to think of an array as a collection of variables of the same type.<br> Instead of declaring individual variables, such as number0, number1, . . . , and number99, you declare one array variable such as numbers and use numbers[0], numbers[1], . . . , and numbers[99] to represent individual variables.</p>
                <blockquote>Here is an example of a basic array:<br>public class AnalyzeNumbers {<br> public static void main(String[] args) {<br>final int NUMBER_OF_ELEMENTS = 100;<br> double sum = 0;<br> java.util.Scanner input = new java.util.Scanner(System.in);<br> for (int i = 0; i < NUMBER_OF_ELEMENTS; i++) {<br> System.out.print("Enter a new number: ");<br> sum += numbers[i];</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>There are three ways to copy arrays: <br>	Use a loop to copy individual elements one by one. <br>	Use the static arraycopy method in the System class.<br>  Use the clone method to copy arrays.</p>
                <blockquote>Here are the three examples:<br>Example#1<br>int[] sourceArray = {2, 3, 1, 5, 10};<br> int[] targetArray = new int[sourceArray.length];<br> for (int i = 0; i < sourceArray.length; i++) {<br> targetArray[i] = sourceArray[i];<br> }<br>Example#2<br>arraycopy(sourceArray, src_pos, targetArray, tar_pos, length);<br></blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>Just as you can pass primitive type values to methods, you can also pass arrays to methods. For example, the following method displays the elements in an int array:</p>
                <blockquote>public static void printArray(int[] array) {<br> for (int i = 0; i < array.length; i++) {<br>System.out.print(array[i] + " ");<br>}<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>You can pass arrays when invoking a method. A method may also return an array. For example, the following method returns an array that is the reversal of another array.</p>
                <blockquote>public static int[] reverse(int[] list) {<br> int[] result = new int[list.length];<br> for (int i = 0, j = result.length - 1;<br> i < list.length; i++, j--) {<br> result[j] = list[i];<br> list 9	return result;<br> }<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>The java.util.Arrays class contains various static methods for sorting and searching arrays, comparing arrays, filling array elements, and returning a string representation of the array. These methods are overloaded for all primitive types.</p>
                <blockquote>Here are two ways you can do this:<br>double[] numbers = {6.0, 4.4, 1.9, 2.9, 3.4, 3.5};<br>java.util.Arrays.sort(numbers); // Sort the whole array<br>char[] chars = {'a', 'A', '4', 'F', 'D', 'P'};<br>java.util.Arrays.sort(chars, 1, 3);// Sort part of the array</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>How do you declare a variable for two-dimensional arrays? How do you create a two- dimensional array? How do you access elements in a two-dimensional array? This section addresses some of these issues.</p>
                <blockquote>Here is an example of two ways you can do this:<br>elementType[][] arrayRefVar;<br>elementType arrayRefVar[][]; // Allowed, but not preferred<br></blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>Initializing arrays with input values. The following loop initializes the array with user input values:</p>
                <blockquote>java.util.Scanner input = new Scanner(System.in);<br>java.util.Scanner input = new Scanner(System.in);<br>System.out.println("Enter " + matrix.length + " rows and " + matrix[0].length + " columns: ");<br>for (int row = 0; row <	; row++) {<br>for (int column = 0; column <	; column++) {<br>matrix[row][column] = input.nextInt();<br>}<br>}</blockquote>

            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
                 <p>You can pass a two-dimensional array to a method just as you pass a one-dimensional array.</p>
                 <blockquote>public class PassTwoDimensionalArray {<br> public static void main(String[] args) {<br>int[][] m = getArray(); // Get an array<br>Here is the second way to do this:<br>public static int sum(int[][] m) {<br>int for } total = 0;<br>for } total = 0; (int row = 0; row < m.length; row++) {<br>for (int column = 0; column < m[row].length; column++) {<br>total += m[row][column];</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle9; ?></h2>
                <p><?php echo $ch01->sect9; ?></p>
                <p>The way to declare two-dimensional array variables and create two-dimensional arrays can be generalized to declare n-dimensional array variables and create n-dimensional arrays for n >= 3.<br>you may use a three-dimensional array to store exam scores for a class of six students with five exams, and each exam has two parts (multiple-choice and essay). The following syntax declares a three-dimensional array variable scores, creates an array, and assigns its reference to scores.</p>
                <blockquote>Here is an example:<br>double[][][] scores = new double[6][5][2];</blockquote>
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
