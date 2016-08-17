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
                            <li class="active"><a href="ch07.php">Chapter 7:<br/>Inheritance and Polymorphism</a></li>
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
            $ch01 = simplexml_load_file("../assets/xml/ch07.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                <p>You use a class to model objects of the same type. Different classes may have some common properties and behaviors, which can be generalized in a class that can be shared by other classes. You can define a specialized class that extends the generalized class. The specialized classes inherit the properties and methods from the general class.</p>
                <blockquote>Here are some key words geometric objects<br>-color: String<br> -filled: boolean<br> -dateCreated: java.util.Date<br>+GeometricObject()<br> +GeometricObject(color: String, filled: boolean)<br> +getColor(): String<br> +setColor(color: String): void<br> +isFilled(): boolean<br> +setFilled(filled: boolean): void<br> +getDateCreated(): java.util.Date<br> +toString(): String<br><br>Here is an example of code for the circle super class with subclass:<br><br>public class SimpleGeometricObject {<br> private String color = "white";<br> private boolean filled;<br> private java.util.Date dateCreated;<br>/** Construct a default geometric object */<br> public SimpleGeometricObject() {<br>dateCreated = new java.util.Date();<br>}<br>/** Construct a geometric object with the specified color */ and filled value */<br>public SimpleGeometricObject(String color, boolean filled) {<br>dateCreated = new java.util.Date();<br>this.color = color;<br> this.filled = filled;<br> }<br>/** Return color */<br> public String getColor() {<br> return color;<br> }<br>/** Set a new color */<br> public void setColor(String color) {<br> this.color = color;<br> }<br>/** Return filled. Since filled is boolean, its get method is named isFilled */<br> public boolean isFilled() {<br> return filled;<br> }<br>/** Set a new filled */<br> public void setFilled(boolean filled) {<br> this.filled = filled;<br> }<br>/** Get dateCreated */<br> public java.util.Date getDateCreated() {<br> return dateCreated;<br> }<br>/** Return a string representation of this object */<br> public String toString() {<br> return "created on " + dateCreated + "\ncolor: " + color + " and filled: " + filled;<br> }<br>}<br></blockquote>
                </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>The keyword super refers to the superclass of the class in which super appears. It can be used in two ways: <br>	To call a superclass constructor.<br> 	To call a superclass method.</p>
                <blockquote>Here is how to call the superclasses constructor:<br>super(), or super(parameters);<br><br>Example of this in code is:<br><br>public CircleFromSimpleGeometricObject( double radius, String color, boolean filled) {<br> super(color, filled);<br> this.radius = radius;<br></blockquote>
               </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>A subclass inherits methods from a superclass. Sometimes it is necessary for the subclass to modify the implementation of a method defined in the superclass. This is referred to as method overriding.</p>
                <blockquote>Here is an example of overriding in code:<br>public class CircleFromSimpleGeometricObject<br> extends SimpleGeometricObject {<br> // Other methods are omitted<br><br> // Override the toString method defined in the superclass<br><br> public String toString() {<br> return super.toString()	+ "\nradius is " + radius; }<br>}<br>    </blockquote>
                 </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>If no inheritance is specified when a class is defined, the superclass of the class is Object by default.</p>
                <blockquote>Classes such as String, StringBuilder, Loan, and GeometricObject are implicitly subclasses of Object<br>The following classes are the same:<br>public class ClassName<br>public class ClassName extends Object<br><br>Here is the signature of the toString method:<br><br>public String toString() </blockquote>
                 </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>two useful terms: subtype and supertype. A class defines a type. A type defined by a subclass is called a subtype, and a type defined by its superclass is called a supertype. Therefore, you can say that Circle is a subtype of GeometricObject and GeometricObject is a supertype for Circle.<br>The inheritance relationship enables a subclass to inherit features from its superclass with additional new features. A subclass is a specialization of its superclass; every instance of a subclass is also an instance of its superclass, but not vice versa.</p>
                <blockquote>Here is an example of polymorphism in java:<br><br>public class PolymorphismDemo {<br>/** Main method */<br> 	public static void main(String[] args) {<br>// Display circle and rectangle properties<br>displayObject(new CircleFromSimpleGeometricObject (1, "red", false));<br>displayObject(new RectangleFromSimpleGeometricObject (1, 1, "black", true));<br>}<br>/** Display geometric object properties */<br> public static void displayObject(SimpleGeometricObject object){<br>System.out.println("Created on " + object.getDateCreated() + ". Color is " + object.getColor());<br>}<br>}</blockquote>
                            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>A variable must be declared a type. The type that declares a variable is called the variables declared type. Here os declared type is Object. A variable of a reference type can hold a null value or a reference to an instance of the declared type. The instance may be created using the constructor of the declared type or its subtype. The actual type of the variable is the actual class for the object referenced by the variable. Here os actual type is GeometricObject, because o references an object created using new GeometricObject(). Which toString() method is invoked by o is determined by os actual type. This is known as dynamic binding.</p>
                <blockquote>Example of dynamic binding:<br><br>public class binding demo { <br>public static void main(String[] args) {<br> m(new GraduateStudent());<br> m(new Student());<br> m(new Person());<br> m(new Object());<br>}<br>public static void	{<br> System.out.println(x.toString());<br>}<br>}<br>class GraduateStudent extends Student{<br>class Student extends Person	{<br> @Override<br> public String toString(){<br> return "Student";<br>class Person extends Object	{<br> @Override public String toString(){<br> return "Person";<br>}<br>}</blockquote>
                            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>Now we are ready to introduce a very useful class for storing objects. You can create an array to store objects. But, once the array is created, its size is fixed.</p>
                <blockquote>Here is an example of the array list java can provide:<br><br>+ArrayList()<br> +add(o: E): void<br> +add(index: int, o: E): void<br> +clear(): void<br> +contains(o: Object): boolean<br> +get(index: int): E<br> +indexOf(o: Object): int<br> +isEmpty(): boolean <br>+lastIndexOf(o: Object): int<br> +remove(o: Object): boolean<br> +size(): int<br> +remove(index: int): boolean<br> +set(index: int, o: E): E<br> </blockquote>
                <blockquote>Here is an example of code:<br><br>import	java.util.ArrayList;<br>public class TestArrayList {<br> public static void main(String[] args) {<br> 	// Create a list to store cities<br>ArrayList cityList = new ArrayList();<br>// Add some cities in the list<br>  cityList.add("London");<br> 	// cityList now contains [London] <br>	cityList.add("Denver");<br> // cityList now contains [London,Denver] <br>	cityList.add("Paris");<br> // cityList now contains [London, Denver, Paris]<br>  cityList.add("Miami");<br> 	// cityList now contains [London, Denver, Paris, Miami]<br> cityList.add("Seoul");<br> // Contains [London, Denver, Paris, Miami, Seoul]<br> Denver, Denver, Paris] Paris, Miami] cityList.add("Tokyo");// Contains [London, Denver, Paris, Miami, Seoul, Tokyo]<br>// Contains [London, Denver, Paris, Miami, Seoul] 	System.out.println("List size? " + cityList.size()	);<br>System.out.println("Is Miami in the list? " + cityList.contains("Miami"));<br>System.out.println("The location of Denver in the list?" + cityList.indexOf("Denver") );<br>System.out.println("Is the list empty? " + cityList.isEmpty	());<br> // Print false<br>// Insert a new city at index 2 	cityList.add(2, "Xian");<br> 	// Contains [London, Denver, Xian, Paris, Miami, Seoul, Tokyo]<br>// Remove a city from the list <br>cityList.remove("Miami")<br>// Contains [London, Denver, Xian, Paris, Seoul, Tokyo]<br>// Remove a city at index 1 <br>	cityList.remove(1);<br> 	// Contains [London, Xian, Paris, Seoul, Tokyo]<br>// Display the contents in the list <br>	System.out.println(cityList.toString());<br>// Display the contents in the list in reverse order<br> 	for (int i = cityList.size() - 1; i >= 0; i)<br> 	System.out.print( cityList.get(i)	+ " ");<br> System.out.println();<br>// Create a list to store two circles<br> 	ArrayList<CircleFromSimpleGeometricObject> list <br>	= new ArrayList<CircleFromSimpleGeometricObject>();<br>// Add two circles<br> 	list.add(new CircleFromSimpleGeometricObject(2));<br> list.add(new CircleFromSimpleGeometricObject(3));<br>// Display the area of the first circle in the list<br> 	System.out.println("The area of the circle? " + ((CircleFromSimpleGeometricObject)list.get(0)).getArea());<br>}<br> }</blockquote>
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
