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
                            <li><a href="ch09.php">Chapter 9:<br/>Exception Handling and Text I/O</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="active"><a href="ch10.php">Chapter 10:<br/>Abstract Classes and Interfaces</a></li>
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
            $ch01 = simplexml_load_file("../assets/xml/ch10.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>Both Circle and Rectangle contain the getArea() and getPerimeter() methods for com- puting the area and perimeter of a circle and a rectangle. Since you can compute areas and perimeters for all geometric objects, it is better to define the getArea() and getPerimeter() methods in the GeometricObject class. However, these methods cannot be implemented in the GeometricObject class, because their implementation depends on the specific type of geometric object. Such methods are referred to as abstract methods and are denoted using the abstract modifier in the method header. After you define the methods in GeometricObject, it becomes an abstract class. Abstract classes are denoted using the abstract modifier in the class header.</p>
                <blockquote>Here is what the code looks like for and abstract with a geometric object<br><br>public	class GeometricObject {<br> private String color = "white";<br> private boolean filled;<br> private java.util.Date dateCreated;<br> /** Construct a default geometric object */<br> protected GeometricObject() {<br> dateCreated = new java.util.Date();<br> }<br>  /** Construct a geometric object with color and filled value */<br> protected GeometricObject(String color, boolean filled) {<br> dateCreated = new java.util.Date();<br> this.color = color;<br> this.filled = filled;<br> }<br> /** Return color */<br> public String getColor() {<br> return color;<br>}<br>/** Set a new color */<br>public void setColor(String color) {<br> this.color = color;<br> } <br>/** Return filled. Since filled is boolean, the get method is named isFilled */<br>public boolean isFilled() {<br>	return filled;<br> } <br>/** Set a new filled */<br> public void setFilled(boolean filled) {<br>this.filled = filled;<br> }<br>	/** Get dateCreated */<br>public java.util.Date getDateCreated() {<br>return dateCreated;<br> }<br> @Override<br> public String toString() {<br> return "ccreated on " + dateCreated + "\ncolor: " + color + " and filled: " + filled;<br>/**Abstract method getArea */<br>public abstract double getArea();<br>/*Abstract method getPerimeter */<br>public abstract double getPerimeter();<br>}<br> </blockquote>
                          </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>In many ways an interface is similar to an abstract class, but its intent is to specify common behavior for objects of related classes or unrelated classes. For example, using appropriate interfaces, you can specify that the objects are comparable, edible, and/or cloneable.</p>
                <blockquote>Here is the sample of the interfaces code in Java:<br><br>public class TestEdible {<br> public static void main(String[] args) {<br> Object[] objects = {new Tiger(), new Chicken(), new Apple()};<br> for (int i = 0;<br> i < objects.length; i++) {<br> if (objects[i] instanceof Edible)<br> System.out.println(((Edible)objects[i]).howToEat());<br> if (objects[i] instanceof Animal) {<br> System.out.println(((Animal)objects[i]).sound());<br> }<br>}<br>}<br>}<br>abstract class Animal {<br> /** Return animal sound */<br> public abstract String sound();<br>}<br>class Chicken extends Animal implements Edible {<br>@Override<br>public String howToEat() {<br>return "Chicken: Fry it";<br>}<br>@Override<br> public String sound() {<br> return "Chicken: cock-a-doodle-doo";<br>}<br>}<br>class Tiger extends Animal {<br> @Override<br> public String sound() {<br> public String howToEat() {<br> return "Tiger: RROOAARR";<br>}<br>}<br>abstract class Fruit implements Edible {<br>// Data fields, constructors, and methods omitted here<br>}<br>class Apple extends Fruit {<br> @Override<br> public String howToEat() {<br> return "Apple: Make apple cider";<br>}<br>}<br>class Orange extends Fruit {<br> @Override<br> public String howToEat() {<br> return "Orange: Make orange juice";<br></blockquote>
                      </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>Suppose you want to design a generic method to find the larger of two objects of the same type, such as two students, two dates, two circles, two rectangles, or two squares. In order to accomplish this, the two objects must be comparable, so the common behavior for the objects must be comparable. Java provides the Comparable interface for this purpose.</p>
                <blockquote>Here is the example of sorting comparable objects<br><br>import java.math.*;<br> public class SortComparableObjects {<br> public static void main(String[] args) {<br>String[] cities = {"Savannah", "Boston", "Atlanta", "Tampa"};<br> java.util.Arrays.sort(cities);<br>for (String city: cities)<br> System.out.print(city + " ");<br> System.out.println();<br>BigInteger[] hugeNumbers = {new BigInteger("2323231092923992")<br>new BigInteger("432232323239292"), <br>new BigInteger("54623239292")};<br>java.util.Arrays.sort(hugeNumbers);<br>for (BigInteger number: hugeNumbers)<br> System.out.print(number + " ");<br>}<br>}<br></blockquote>
                      </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>An interface with an empty body is referred to as a marker interface. A marker interface does not contain constants or methods. It is used to denote that a class possesses certain desirable properties. A class that implements the Cloneable interface is marked cloneable, and its objects can be cloned using the clone() method defined in the Object class.</p>
                <blockquote>Here is a clonable calender example. It will also show what it will display:<br><br>package java.lang;<br> public interface Cloneable {<br> }<br>Calendar calendar = new GregorianCalendar(2013, 2, 1);<br> Calendar calendar1 = calendar;<br> Calendar calendar2 = (Calendar)calendar.clone();<br> System.out.println("calendar == calendar1 is " + (calendar == calendar1));<br> System.out.println("calendar == calendar2 is " + (calendar == calendar2));<br> System.out.println("calendar.equals(calendar2) is " + calendar.equals(calendar2));<br><br>Here is what it displays:<br>calendar == calendar1 is true<br> calendar == calendar2 is false<br> calendar.equals(calendar2) is true</blockquote>
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
