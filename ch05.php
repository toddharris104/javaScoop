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
                        <li class="active"><a href="ch05.php">Chapter 5:<br/>Objects Classes and Strings</a></li>
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
            $ch01 = simplexml_load_file("../assets/xml/ch05.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>Object-oriented programming (OOP) involves programming using objects. An object repre- sents an entity in the real world that can be distinctly identified. For example, a student, a desk, a circle, a button, and even a loan can all be viewed as objects. An object has a unique identity, state, and behavior.<br>A Java class uses variables to define data fields and methods to define actions. Addition- ally, a class provides methods of a special type, known as constructors, which are invoked to create a new object. A constructor can perform any action, but constructors are designed to perform initializing actions, such as initializing the data fields of objects.</p>
                <blockquote>Example of what a class template should look like:<br>Class Name: Circle<br>Data Fields: radius is _____<br>Methods: getArea getPerimeter setRadius<br></blockquote>

            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>Constructors are a special kind of method. They have three peculiarities: <br>   A constructor must have the same name as the class itself.<br>Constructors do not have a return type not even void.<br> Constructors are invoked using the new operator when an object is created. Constructors play the role of initializing objects.</p>
                <blockquote>Here is an example:<br>Constructors are used to construct objects. To construct an object from a class, invoke a constructor of the class using the new operator.<br>new ClassName(arguments);<br>An example of what will not work<br>public void Circle()</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>the SimpleCircle class and created objects from the class. You will frequently use the classes in the Java library to develop programs.</p>
                <blockquote>Here are some examples of classes:<br>A date class<br>java.util.Date date =   new java.util.Date();<br>System.out.println("The elapsed time since Jan 1, 1970 is " + date.getTime() + "milliseconds");<br>System.out.println(date.toString());<br>A random class:<br>Random random1 = new Random(3);<br>System.out.print("From random1: ");<br>for (int i = 0; i < 10; i++)<br>System.out.print(random1.nextInt(1000) + " "); </blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>To declare a static variable or define a static method, put the modifier static in the variable or method declaration. The static variable numberOfObjects and the static method getNumberOfObjects() can be declared as</p>
                <blockquote>Example of a static:<br>static int numberOfObjects;<br>static int getNumberObjects() {<br>return numberOfObjects;<br>}</blockquote>
                <p>Constants in a class are shared by all objects of the class. Thus, constants should be declared as final static.</p>
                <blockquote>final static double PI = 3.14159265358979323846;</blockquote>
                <p>An instance method can invoke an instance or static method and access an instance or static data field. A static method can invoke a static method and access a static data field. However, a static method cannot invoke an instance method or access an instance data field, since static methods and static data fields dont belong to a particular object.</p>
                <blockquote>Example of a method with correct code:<br>public class A {<br> inti=5;<br> static int k = 2;<br> public static void main(String[] args) {<br> A a = new A();<br> int j = a.i; // OK, a.i accesses the object's instance variable<br> a.m1(); // OK. a.m1() invokes the object's instance method<br> public void m1() {<br> i = i + k + m2(i, k);<br> }<br> public static int m2(int i, int j) {<br> }<br> return (int)(Math.pow(i, j));<br>}<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>You can use the public visibility modifier for classes, methods, and data fields to denote that they can be accessed from any other classes. If no visibility modifier is used, then by default the classes, methods, and data fields are accessible by any class in the same package.</p>
                <blockquote>Here is an example:<br>public class C1 {<br> public int x;<br> int y;<br> private int z;<br> public void m1() {<br> }<br> void m2() {<br> }<br> private void m3() {<br> }<br> }</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>You can also create arrays of objects. For example, the following statement declares and creates an array of ten Circle objects.</p>
                <blockquote>An example of this is:<br>for (int i = 0; i < circleArray.length; i++) {<br> circleArray[i] = new Circle();<br> }</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>The String class has 13 constructors and more than 40 methods for manipulating strings. Not only is it very useful in programming, but it is also a good example for learning classes and objects.</p>
                <blockquote>Example of how to construct a string:<br>String newString = new String(stringLiteral);<br>Examples of language strings:<br>+equals(s1: Object): boolean<br> +equalsIgnoreCase(s1: String): boolean<br> +compareTo(s1: String): int<br> +compareToIgnoreCase(s1: String): int<br> +regionMatches(index: int, s1: String, s1Index: int, len: int): boolean<br> +regionMatches(ignoreCase: boolean, index: int, s1: String, s1Index: int, len: int): boolean<br> +startsWith(prefix: String): boolean<br> +endsWith(suffix: String): boolean</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
                <p>Many methods in the Java API require an object argument. To enable the primitive data values to be treated as objects, Java provides a class for every primitive data type. These classes are Character, Boolean, Byte, Short, Integer, Long, Float, and Double for char, boolean, byte, short, int, long, float, and double, respectively.</p>
                <blockquote>Example of creating a new character:<br>Character character = new Character('a');<br>Here are some character examples:<br>+Character(value: char)<br> +charValue(): char<br> +compareTo(anotherCharacter: Character): int<br> +equals(anotherCharacter: Character): boolean<br> +isDigit(ch: char): boolean<br> +isLetter(ch: char): boolean +isLetterOrDigit(ch: char): boolean<br> +isLowerCase(ch: char): boolean<br> +isUpperCase(ch: char): boolean<br> +toLowerCase(ch: char): char<br> +toUpperCase(ch: char): char</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle9; ?></h2>
                <p><?php echo $ch01->sect9; ?></p>
                <p>Perhaps you have already noticed the unusual header for the main method, which has the parameter args of String[] type. It is clear that args is an array of strings. The main method is just like a regular method with a parameter. You can call a regular method by pass- ing actual parameters. Can you pass arguments to main? Yes, of course you can.</p>
                <blockquote>An example of this would be:<br>public class A {<br> public static void main(String[] args) {<br> String[] strings = {"New York", "Boston", "Atlanta"};<br> TestMain.main(strings)</blockquote>
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