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
                            <li class="active"><a href="ch09.php">Chapter 9:<br/>Exception Handling and Text I/O</a></li>
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
    <div class="row ">
        <div class="col-xs-12">
            <?php
            //this is what loads your XML file...
            //note the two periods beforehand... have to go up a directory to get to assets!!
            $ch01 = simplexml_load_file("../assets/xml/ch09.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>To demonstrate exception handling, including how an exception object is created and thrown, we will begin with this example</p>
                <blockquote>Here is the example:<br><br>import java.util.Scanner;<br> public class Quotient {<br> public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> // Prompt the user to enter two integers<br> System.out.print("Enter two integers: ");<br> int number1 = input.nextInt();<br> int number2 = input.nextInt();<br>System.out.println(number1 + " / " + number2 + " is " + (	));<br>}<br>}</blockquote>
                        </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>Runtime errors occur while a program is running if the JVM detects an operation that is impossible to carry out. For example, if you access an array using an index that is out of bounds, you will get a runtime error with an ArrayIndexOutOfBoundsException. If you enter a double value when your program expects an integer, you will get a runtime error with an InputMismatchException. In Java, runtime errors are thrown as exceptions. An exception is an object that represents an error or a condition that prevents execution from proceeding normally. If the exception is not handled, the program will terminate abnormally.</p>
                <blockquote>Here is the example of exception handling overview:<br>import java.util.Scanner;<br> public class Quotient {<br> public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> // Prompt the user to enter two integers<br> System.out.print("Enter two integers: ");<br> int number1 = input.nextInt();<br> int number2 = input.nextInt();<br> System.out.println(number1 + " / " + number2 + " is " + (	));</blockquote>
                <p>Below is an example of quotient with if example: </p>
                <blockquote>import java.util.Scanner;<br> public class QuotientWithIf {<br> public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> // Prompt the user to enter two integers<br> System.out.print("Enter two integers: ");<br> int number1 = input.nextInt();<br> int number2 = input.nextInt();<br> System.out.println(number1 + " / " +"is" + number2 + "is" + (number1/number2 ));<br>Else<br> System.out.println("Divisor cannot be zero ");</blockquote>
                <p>Next is the example of the quotientwithmethod:</p>
                <blockquote>import java.util.Scanner;<br> public class QuotientWithMethod {<br>public static int quotient(int number1, int number2) {<br>if (number2 == 0) {<br> System.out.println("Divisor cannot be zero");<br>System.exit(1);<br>}<br>return number1 / number2;<br>}<br>public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> // Prompt the user to enter two integers<br> System.out.print("Enter two integers: ");<br> int number1 = input.nextInt();<br> int number2 = input.nextInt();<br>int result = quotient(number1, number2);<br>System.out.println(number1 + " / " + number2 + " is " + result);<br>}<br>}</blockquote>
                <p>The example of quotient with exception is: </p>
                <blockquote>import java.util.Scanner;<br> public class QuotientWithException {<br>public static int quotient(int number1, int number2) {<br>if (number2 == 0)<br>throw new ArithmeticException("Divisor cannot be zero");<br>return number1 / number2;<br>}<br> public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> // Prompt the user to enter two integers<br> System.out.print("Enter two integers: ");<br> int number1 = input.nextInt();<br> int number2 = input.nextInt();<br>try {<br>int result = quotient(number1, number2);<br>System.out.println(number1 + " / " + number2 + " is "+ result);<br>}<br>catch (ArithmeticException ex) {<br>System.out.println("Exception: an integer " + "cannot be divided by zero ");<br>}<br>System.out.println("Execution continues ...");<br>}<br>}</blockquote>
                <p>Last is the InputMismatchException:</p>
                <blockquote>import java.util.*;<br> public class InputMismatchException {<br> public static void main(String[] args) {<br> Scanner input = new Scanner(System.in);<br> boolean continueInput = true;<br> do{<br>try{<br>System.out.print("Enter an integer: ");<br>int number = input.nextInt();<br>// Display the result<br> System.out.println( "The number entered is " + number);<br>continueInput = false;<br>}<br>catch (InputMismatchException ex) {<br>System.out.println("Try again. (" + "Incorrect input: an integer is required)");<br>input.nextLine(); // Discard input<br>}<br>} while (continueInput);<br>}<br>}</blockquote>
                        </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>Occasionally, you may want some code to be executed regardless of whether an exception occurs or is caught. Java has a finally clause that can be used to accomplish this objective.</p>
                <blockquote>Here is what the code looks like:<br><br>try {<br> statements;<br> }<br> catch (TheException ex) {<br>handling ex;<br> } <br>finally {<br> finalStatements;<br>}</blockquote>
                      </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>The try block contains the code that is executed in normal circumstances. The catch block contains the code that is executed in exceptional circumstances. Exception handling separates error-handling code from normal programming tasks, thus making programs easier to readand to modify. Be aware, however, that exception handling usually requires more time and resources, because it requires instantiating a new exception object, rolling back the call stack, and propagating the exception through the chain of methods invoked to search for the handler.</p>
                <blockquote>When should you use a try-catch block in the code? Use it when you have to deal with unexpected error conditions.<br>This is what the code looks like:<br><br>try {<br> System.out.println(refVar.toString());<br> }<br> catch (NullPointerException ex) {<br> System.out.println("refVar is null");<br> }<br></blockquote>
                <p>This the rethrowing exceptions code and what it might look like:</p>
                <blockquote>try {<br> statements;<br> }<br> catch (TheException ex) {<br>perform operations before exits;<br> throw ex;<br>}</blockquote>
                   </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>Every file is placed in a directory in the file system. An absolute file name (or full name) contains a file name with its complete path and drive letter. For example, c:\book\Welcome.java is the absolute file name for the file Welcome.java on the Windows operating system. Here c:\book is referred to as the directory path for the file. Absolute file names are machine dependent. On the UNIX platform, the absolute file name may be /home/liang/book/Welcome.java, where /home/liang/book is the directory path for the file Welcome.java. A relative file name is in relation to the current working directory. The complete direc- tory path for a relative file name is omitted. For example, Welcome.java is a relative file name. If the current working directory is c:\book, the absolute file name would be c:\book\Welcome.java.</p>
                <blockquote>This code shows how to create a File object and use the methods in the File class to obtain its properties:<br><br>public class TestFileClass {<br> public static void main(String[] args) {<br>java.io.File file = new java.io.File("image/us.gif");<br>System.out.println("Does it exist? " + file.exists());<br>System.out.println("The file has " + file.length() + " bytes");<br> System.out.println("Can it be read? " + file.canRead());<br> System.out.println("Can it be written? " + file.canWrite());<br> System.out.println("Is it a directory? " + file.isDirectory());<br> System.out.println("Is it a file? " + file.isFile());<br> System.out.println("Is it absolute? " + file.isAbsolute());<br> System.out.println("Is it hidden? " + file.isHidden());<br> System.out.println("Absolute path is " + file.getAbsolutePath());<br> System.out.println("Last modified on " + new java.util.Date(file.lastModified()));<br>}<br>}<br></blockquote>
                      </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>A File object encapsulates the properties of a file or a path, but it does not contain the meth- ods for creating a file or for writing/reading data to/from a file (referred to as data input and output, or I/O for short). In order to perform I/O, you need to create objects using appropriate Java I/O classes. The objects contain the methods for reading/writing data from/to a file. There are two types of files: text and binary. Text files are essentially strings on disk. This sec- tion introduces how to read/write strings and numeric values from/to a text file using the Scanner and PrintWriter classes.</p>
                <blockquote>What the code looks like for WriteData:<br><br>public class WriteData {<br>  public static void main(String[] args) throws IoException {<br>java.io.File file = new java.io.File("scores.txt");<br>if()){<br>System.out.println("File already exists");<br> System.exit(1);<br>// Create a file<br>java.io.PrintWriter output = new java.io.PrintWriter(file);<br>// Write formatted output to the file<br>output.print("Name")<br>output.println(90);<br>output.print("Big K John ");<br> 	output.println(85);<br>// Close the file<br>output.close();<br>}<br>}</blockquote>
                <p>A Scanner breaks its input into tokens delimited by whitespace characters.<br>The next code is for the ReadData</p>
                <blockquote>import java.util.Scanner;<br> public class ReadData {<br> public static void main(String[] args)throws Exception {<br>// Create a File instance<br> java.io.File file = new java.io.File("scores.txt");<br>// Create a Scanner for the file<br>Scanner input = new Scanner(file);<br>// Read data from a file<br>while(input.hasNext()){<br>String firstName = input.next()<br>String mi = input.next();<br>String lastName = input.next()<br>int score = input.nextInt();<br>System.out.println(firstName + " " + mi + " " + lastName + " " + score);<br>}<br>// Close the file<br>input.close();<br>}<br>}</blockquote>
                   </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>Java provides the javax.swing.JFileChooser class for displaying a file dialog</p>
                <blockquote>Here is what the code might look like using the ReadFileUsingJFileChooser:<br><br>import java.util.Scanner;<br> import javax.swing.JFileChooser;<br> public class ReadFileUsingJFileChooser {<br> public static void main(String[] args) throws Exception {<br>JFileChooser fileChooser = new JFileChooser();<br> if fileChooser.showOpenDialog(null)<br>==JFileChooser.APPROVE_OPTION) {<br>// Get the selected file<br> java.io.File file = fileChooser.getSelectedFile();<br>// Create a Scanner for the file<br> Scanner input = new Scanner(file);<br>// Read text from the file<br> while (input.hasNext()) {<br> System.out.println(input.nextLine());<br>}<br>// Close the file<br> input.close();<br>}<br>else {<br> System.out.println("No file selected");<br>}<br>}<br>}</blockquote>
                  </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
                <p>In addition to reading data from a local file on a computer or file server, you can also access data from a file that is on the Web if you know the files URL (Uniform Resource Locator the unique address for a file on the Web).</p>
                <blockquote>This is what the code looks like from a URL:<br><br>try {<br> 	URL url = new URL("http://www.google.com/index.html");<br> }<br> catch (MalformedURLException ex) {<br> ex.printStackTrace();<br> }</blockquote>
                <p>Here is what the code looks like reading a file from the URL:</p>
                <blockquote>import java.util.Scanner;<br>public class ReadFileFromURL {<br> public static void main(String[] args) {<br>System.out.print("Enter a URL: ");<br>String URLString = new Scanner(System.in).next();<br>try {<br> java.net.URL url = new java.net.URL(URLString);<br>int count = 0;<br>Scanner input = new Scanner(url.openStream());<br>while (input.hasNext()) {<br>String line = input.nextLine();<br>count += line.length();<br>}<br>System.out.println("The file size is " + count + " bytes");<br>}<br>catch (java.net.MalformedURLException ex) {<br>System.out.println("Invalid URL");<br>}<br>catch (java.io.IOException ex) {<br>System.out.println("I/O Errors: no such file");<br>}<br>}<br>}</blockquote>
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
