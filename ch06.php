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
                            <li class="active"><a href="ch06.php">Chapter 6:<br/>Thinking in objects</a></li>
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
            $ch01 = simplexml_load_file("../assets/xml/ch06.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>Normally, you create an object and allow its contents to be changed later. However, occasion- ally it is desirable to create an object whose contents cannot be changed once the object has been created. We call such an object an immutable object and its class an immutable class.</p>
                <blockquote>For a class to be immutable, it must meet the following requirements:<br>#1 All data fields must be private.<br>#2 There cant be any mutator methods for data fields.<br>#3 No accessor methods can return a reference to a data field that is mutable.<br>Here is an example of what this looks like:<br>public class Student {<br>  private int id;<br> private String name;<br> private java.util.Date dateCreated;</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>A variable defined inside a method is referred to as a local variable. The scope of a classes variables is the entire class, regardless of where the variables are declared. A classes variables and methods can appear in any order in the class.</p>
                <blockquote>Example of this would be:<br>public class F {<br> private int x = 0; // Instance variable<br> private int y = 0;<br>  public F() {<br> }<br> public void p() {<br> int x = 1; // Local variable<br> System.out.println("x = " + x);<br> System.out.println("y = " + y);<br> }  }</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>The this keyword is the name of a reference that an object can use to refer to itself. You can use the this keyword to refer to the objects instance members.</p>
                <blockquote>The example is:<br>public class Circle {<br> private double radius;<br>  public double getArea() {<br> return	this.radius *	this.radius * Math.PI;<br> }<br> public String toString() {<br> return "radius: " +	this.radius + "area: " + this.getArea(); <br>}<br> }</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>Class abstraction and encapsulation are two sides of the same coin. Many real-life exam- ples illustrate the concept of class abstraction. Consider, for instance, building a computer system. Your personal computer has many components�a CPU, memory, disk, motherboard, fan, and so on. Each component can be viewed as an object that has properties and methods. To get the components to work together, you need know only how each component is used and how it interacts with the others.</p>
                <blockquote>A code example:<br>import java.util.Scanner;<br> public class TestLoanClass {<br> /** Main method */ <br>public static void main(String[] args) {<br>// Create a Scanner<br> Scanner input = new Scanner(System.in);<br>// Enter annual interest rate<br> System.out.print( "Enter annual interest rate, for example, 8.25: ");<br> double annualInterestRate = input.nextDouble();<br>// Enter number of years<br> System.out.print("Enter number of years as an integer: ");<br> int numberOfYears = input.nextInt();<br>// Enter loan amount<br> System.out.print("Enter loan amount, for example, 120000.95: ");<br> double loanAmount = input.nextDouble();<br>// Create a Loan object<br> Loan loan =<br>new Loan(annualInterestRate, numberOfYears, loanAmount);<br> // Display loan date, monthly payment, and total payment<br>System.out.printf("The loan was created on %s\n" + "The monthly payment is %.2f\nThe total payment is %.2f\n"<br>loan.getLoanDate().toString(), loan.getMonthlyPayment(), loan.getTotalPayment());<br>}<br}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>you will gain insight into the differences between procedural and object-oriented programming and see the benefits of developing reusable code using objects and classes.</p>
                <blockquote>To make a code reusable we have provided the following as use with a BMI:<br>public static double getBMI(double weight, double height)<br><br><p>Once the class is available it will look like this:</p><br>public class UseBMIClass {<br>	public static void main(String[] args) {<br>BMI bmi1 = new BMI("Kim Yang", 18, 145, 70);<br>System.out.println("The BMI for " +	bmi1.getName() + " is " + bmi1.getBMI()  +" "+ bmi1.getStatus() );<br>BMI bmi2 = new BMI("Susan King", 215, 70);<br>System.out.println("The BMI for " +	bmi2.getName() + " is " + bmi2.getBMI()  +" "+ bmi2.getStatus() );<br>}<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>Owing to performance considerations, primitive data type values are not objects in Java. Because of the overhead of processing objects, the languages performance would be adversely affected if primitive data type values were treated as objects. However, many Java methods require the use of objects as arguments. Java offers a convenient way to incorporate, or wrap, a primitive data type into an object (e.g., wrapping int into the Integer class, and wrapping double into the Double class).</p>
                <blockquote>Here are some examples of wrappers as integers and doubles:<br>-value: int<br> +MAX_VALUE: int<br> +MIN_VALUE: int<br>  +Integer(value: int)<br> +Integer(s: String)<br> +byteValue(): byte<br> +shortValue(): short<br> +intValue(): int<br> +longValue(): long<br> +floatValue(): float<br> +doubleValue(): double<br> +compareTo(o: Integer): int<br> +toString(): String<br> +valueOf(s: String): Integer<br> +valueOf(s: String, radix: int): Integer<br> +parseInt(s: String): int<br> +parseInt(s: String, radix: int): int<br><br><p>Here are the doubles:</p><br>-value: double<br>+MAX_VALUE: double<br> +MIN_VALUE: double<br>+Double(value: double) <br>+Double(s: String)<br> +byteValue(): byte <br>+shortValue(): short<br> +intValue(): int<br> +longValue(): long<br> +floatValue(): float<br> +doubleValue(): double<br> +compareTo(o: Double): int<br> +toString(): String<br>+valueOf(s: String): Double<br> +valueOf(s: String, radix: int): Double<br> +parseDouble(s: String): double<br> +parseDouble(s: String, radix: int): double</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>Converting a primitive value to a wrapper object is called boxing. The reverse conversion is called unboxing. Java allows primitive types and wrapper classes to be converted automati- cally. The compiler will automatically box a primitive value that appears in a context requiring an object, and will unbox an object that appears in a context requiring a primitive value. This is called autoboxing and autounboxing.</p>
                <blockquote>Here is what it looks like:<br>1 Integer[] intArray = {1, 2, 3};<br> 2 System.out.println(intArray[0] + intArray[1] + intArray[2]);<br> In line 1, the primitive values 1, 2, and 3 are automatically boxed into objects new Integer(1), new	Integer(2), and new	Integer(3).<br> In line 2, the objects intArray[0], intArray[1], and intArray[2] are automatically converted into int values that are added together.</blockquote>
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
