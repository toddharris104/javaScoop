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
                            <li class="active"><a href="ch08.php">Chapter 8:<br/>GUI Basics and Graphics</a></li>
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
            $ch01 = simplexml_load_file("../assets/xml/ch08.xml");
            ?>
            <div class="jumbotron">
                <h1><?php echo $ch01->mainTitle; ?></h1>
                <p><?php echo $ch01->intro; ?></p>

            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle1; ?></h2>
                <p><?php echo $ch01->sect1; ?></p>
                 <p> Recall that the triangular arrow denotes the inheritance relationship, the diamond denotes the composition relationship, and the filled diamond denotes the exclusive composition relationship.</p>
                <blockquote>The subclasses of Component are called component classes for creating the user interface. The classes, such as JFrame, JPanel, and JApplet, are called container classes used to contain other components. The classes, such as Graphics, Color, Font, FontMetrics, and Dimension, are called helper classes used to support GUI components.<br><br>Here is an example of component classes:<br><br>JButton jbtOK = new JButton("OK");<br> System.out.println(jbtOK instanceof JButton);<br> System.out.println(jbtOK instanceof JComponent);<br> System.out.println(jbtOK instanceof Container);<br> System.out.println(jbtOK instanceof Component);<br> System.out.println(jbtOK instanceof Object);<br><br>Here is examples of container classes:<br><br>java.awt.Container is used to hold components. Frames, panels, and applets are its subclasses.<br>javax.swing.JFrame is a top-level container for holding other Swing user-interface components in Java GUI applications.<br>javax.swing.JPanel is an invisible container for grouping user-interface components. Panels can be nested. You can place panels inside another panel. JPanel is also often used as a canvas to draw graphics.<br>javax.swing.JApplet is a base class for creating a Java applet using Swing components.<br>javax.swing.JDialog is a popup window generally used as a temporary window to receive additional information from the user or to provide notification to the user.</blockquote>
                <p>Below are some GUI helper classes:</p>
                <blockquote>java.awt.Graphics is an abstract class that provides the methods for drawing strings, lines, and simple shapes.<br>java.awt.Color deals with the colors of GUI components. For example, you can specify background or foreground colors in components like JFrame and JPanel, or you can specify colors of lines, shapes, and strings in drawings.<br>java.awt.Font specifies fonts for the text and drawings on GUI components. For example, you can specify the font type (e.g., SansSerif), style (e.g., bold), and size (e.g., 24 points) for the text on a button.<br>java.awt.FontMetrics is an abstract class used to get the properties of the fonts.<br>java.awt.Dimension encapsulates the width and height of a component (in integer precision) in a single object.<br>java.awt.LayoutManager specifies how components are arranged in a container.</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle2; ?></h2>
                <p><?php echo $ch01->sect2; ?></p>
                <p>Suppose that you want to place ten buttons and a text field in a frame. The buttons are placed in grid formation, but the text field is placed on a separate row. It is difficult to achieve the desired look by placing all the components in a single container. With Java GUI program- ming, you can divide a window into panels. Panels act as subcontainers to group user- interface components. You add the buttons in one panel, then add the panel to the frame.</p>
                <blockquote>the following code creates a panel and adds a button to it:<br>JPanel p = new JPanel();<br> p.add(new JButton("OK"));<br><br> Here is an example of the code you would use:<br><br>import java.awt.*;<br> import javax.swing.*;<br>public class TestPanels extends JFrame {<br> public TestPanels() {<br> // Create panel p1 for the buttons and set GridLayout<br>JPanel p1 = new JPanel();<br>p1.setLayout(new GridLayout(4, 3));<br>// Add buttons to the panel<br>for(inti=1;i<=9;i++){<br>p1.add(new JButton("" + i));<br>}<br> p1.add(new JButton("" + 0));<br> p1.add(new JButton("Start"));<br> p1.add(new JButton("Stop"));<br>// Create panel p2 to hold a text field and p1<br>JPanel p2 = new JPanel(new BorderLayout());<br>p2.add(new JTextField("Time to be displayed here"),<br>BorderLayout.NORTH);<br>p2.add(p1, BorderLayout.CENTER);<br>// Add contents to the frame<br>add(p2, BorderLayout.EAST);<br> add(new JButton("Food to be placed here"),<br> BorderLayout.CENTER);<br>}<br>/** Main method */<br> public static void main(String[] args) {<br> TestPanels frame = new TestPanels();<br> frame.setTitle("The Front View of a Microwave Oven");<br> frame.setSize(400, 250);<br> frame.setLocationRelativeTo(null); // Center the frame<br> frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br> frame.setVisible(true);<br>}<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle3; ?></h2>
                <p><?php echo $ch01->sect3; ?></p>
                <p>You can set colors for GUI components by using the java.awt.Color class. Colors are made of red, green, and blue components, each represented by an int value that describes its inten- sity, ranging from 0 (darkest shade) to 255 (lightest shade). This is known as the RGB model.</p>
                <p>Below is an example of what it looks like:</p>
                <blockquote>public Color(int r, int g, int b);</blockquote>
                <p>You can create a font using the java.awt.Font class and set fonts for the components using the setFont method in the Component class.</p>
                <p>You can choose a font name from SansSerif, Serif, Monospaced, Dialog, and DialogInput, choose a style from Font.PLAIN (0), Font.BOLD (1), Font.ITALIC (2), and Font.BOLD + Font.ITALIC (3), and specify a font size of any positive integer.</p>
                <blockquote>Here is an example:<br><br>Font font1 = new Font("SansSerif", Font.BOLD, 16);<br> Font font2 = new Font("Serif", Font.BOLD + Font.ITALIC, 12);</blockquote>
                <p>JTextField inherits JTextComponent, which inherits JComponent. Here is an example of creating a text field with red foreground color and right horizontal alignment:</p>
                <blockquote>JTextField jtfMessage = new JTextField("T-Storm");<br> jtfMessage.setForeground(Color.RED);<br> jtfMessage.setHorizontalAlignment(JTextField.RIGHT);</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle4; ?></h2>
                <p><?php echo $ch01->sect4; ?></p>
                <p>An icon is a fixed-size picture; typically it is small and used to decorate components. Images are normally stored in image files. Java currently supports three image formats: GIF (Graph- ics Interchange Format), JPEG (Joint Photographic Experts Group), and PNG (Portable Net- work Graphics). The image file names for these types end with .gif, .jpg, and .png, respectively. If you have a bitmap file or image files in other formats, you can use image- processing utilities to convert them into the GIF, JPEG, or PNG format for use in Java.</p>
                <blockquote>Here is an example of this with test code to follow:<br><br>ImageIcon icon = new ImageIcon("image/us.gif");<br><br>import javax.swing.*;<br> import java.awt.*;<br>public class TestImageIcon extends JFrame {<br>private ImageIcon usIcon = new ImageIcon("image/us.gif");<br>private ImageIcon myIcon= new ImageIcon("image/my.jpg");<br>private ImageIcon frIcon= new ImageIcon("image/fr.gif");<br>private ImageIcon ukIcon= new ImageIcon("image/uk.gif");<br>public TestImageIcon() {<br> setLayout(new GridLayout(1, 4, 5, 5));<br>add(new JLabel(usIcon));<br> add(new JLabel(myIcon));<br> add(new JButton(ukIcon));<br> add(new JButton(frIcon));<br>}<br>/** Main method */<br> public static void main(String[] args) {<br> TestImageIcon frame = new TestImageIcon();<br> frame.setTitle("TestImageIcon");<br> frame.setSize(200, 200);<br> frame.setLocationRelativeTo(null);<br> // Center the frame<br> frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br> frame.setVisible(true);<br>}<br>}</blockquote>
           </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle5; ?></h2>
                <p><?php echo $ch01->sect5; ?></p>
                <p>The following section will introduce GUI components JCheckBox, JRadioButton, and JLabel.<br>A toggle button is a two-state button like a light switch. JToggleButton inherits AbstractButton and implements a toggle button. Often JToggleButton’s subclasses JCheckBox and JRadioButton are used to enable the user to toggle a choice on or off.<br>Radio buttons, also known as option buttons, enable you to choose a single item from a group of choices. In appearance radio buttons resemble check boxes, but check boxes display a square that is either checked or blank, whereas radio buttons display a circle that is either filled (if selected) or blank (if not selected).</p>
                <blockquote>Here is an example checkbox code:<br>JCheckBox jchk = new JCheckBox("Student", true);<br> jchk.setForeground(Color.RED);<br> jchk.setBackground(Color.WHITE);<br> jchk.setMnemonic('S');</blockquote>
                <blockquote>Here is teh example of radiobutton:<br>JRadioButton jrb = new JRadioButton("Student", true);<br> jrb.setForeground(Color.RED);<br> jrb.setBackground(Color.WHITE);<br> jrb.setMnemonic('S');</blockquote>
                <blockquote>The example of label code:<br>// Create an image icon from an image file<br> ImageIcon icon = new ImageIcon("image/grapes.gif");<br> // Create a label with a text, an icon, with centered horizontal alignment<br> JLabel jlbl =new JLabel("Grapes", icon, JLabel.CENTER);<br>//Set label's text alignment and gap between text and icon<br>jlbl.setHorizontalTextPosition(JLabel.CENTER);<br>jlbl.setVerticalTextPosition(JLabel.BOTTOM);<br>jlbl.setIconTextGap(5);</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle6; ?></h2>
                <p><?php echo $ch01->sect6; ?></p>
                <p>paintbrush. You can apply the methods in the Graphics class to draw graphics on a GUI component. To paint, you need to specify where to paint. Each component has its own coordinate sys- tem with the origin (0, 0) at the upper-left corner. The x-coordinate increases to the right, and the y-coordinate increases downward.The Graphics class–an abstract class—provides a device-independent graphics interface for displaying figures and images on the screen on different platforms. Whenever a compo- nent (e.g., a button, a label, or a panel) is displayed, the JVM automatically creates a Graphics object for the component on the native platform and passes this object to invoke the paintComponent method to display the drawings.</p>
                <blockquote>Here is an example of this code:<br>import javax.swing.*;<br> 2 import java.awt.Graphics;<br>public class TestPaintComponent extends JFrame {<br>	public TestPaintComponent() {<br>add(new NewPane () );<br>}<br>public static void main(String[] args) {<br>TestPaintComponent frame = new TestPaintComponent();<br> frame.setTitle("TestPaintComponent");<br> frame.setSize(200, 100);<br> 	frame.setLocationRelativeTo(null);<br> // Center the frame<br> frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br>frame.setVisible(true);<br>}<br>}<br>class NewPanel extends JPanel {<br> @Override<br> protected void paintComponent(Graphics g) {<br> super.paintComponent(g);<br> g.drawLine(0, 0, 50, 50);<br> g.drawString("Banner", 0, 40);<br>}<br>}</blockquote>
            </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle7; ?></h2>
                <p><?php echo $ch01->sect7; ?></p>
                <p>Java provides six methods for drawing the outline of rectangles or rectangles filled with color. You can draw or fill plain rectangles, round-cornered rectangles, or three-dimensional rectangles. The drawRect(int x, int y, int w, int h) method draws a plain rectangle, and the fillRect(int x, int y, int w, int h) method draws a filled rectangle. The parameters x and y represent the upper-left corner of the rectangle, and w and h are its width and height<br>The drawRoundRect(int x, int y, int w, int h, int aw, int ah) method draws a round-cornered rectangle, and the fillRoundRect(int x, int y, int w, int h, int aw, int ah) method draws a filled round-cornered rectangle. Parameters x, y, w, and h are the same as in the drawRect method, parameter aw is the horizontal diameter of the arcs at the corner, and ah is the vertical diameter of the arcs at the corner</p>
                <blockquote>Here is how you would draw shapes in Java. Examples of this are below:<br><br>import java.awt.*;<br> import javax.swing.*;<br> public class TestFigurePanel extends JFrame {<br> public TestFigurePanel() {<br> setLayout(new GridLayout(2, 3, 5, 5));<br> add(new FigurePanel(FigurePanel.LINE));<br> add(new FigurePanel(FigurePanel.RECTANGLE));<br> add(new FigurePanel(FigurePanel.ROUND_RECTANGLE));<br> add(new FigurePanel(FigurePanel.OVAL));<br> add(new FigurePanel(FigurePanel.RECTANGLE, true));<br> add(new FigurePanel(FigurePanel.ROUND_RECTANGLE, true));<br> }<br> public static void main(String[] args) {<br> TestFigurePanel frame = new TestFigurePanel();<br> frame.setSize(400, 200);<br> frame.setTitle("TestFigurePanel");<br>frame.setLocationRelativeTo(null); // Center the frame<br> frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br> frame.setVisible(true);<br> }<br> }</blockquote>
                <p>Below is an example of how to draw an arc:<br><br></p>
                <blockquote>import javax.swing.JFrame;<br> import javax.swing.JPanel;<br> import java.awt.Graphics;<br> public class DrawArcs extends JFrame {<br> public DrawArcs() {<br> setTitle("DrawArcs");<br> add(new ArcsPanel());<br> 	/** Main method */<br> public static void main(String[] args) {<br> DrawArcs frame = new DrawArcs();<br> frame.setSize(250, 300);<br> frame.setLocationRelativeTo(null); // Center the frame<br>  frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br> frame.setVisible(true);<br> } <br> } <br> // The class for drawing arcs on a panel<br> class ArcsPanel extends JPanel {<br> @Override // Draw four blades of a fan<br>protected void paintComponent(Graphics g){<br> super.paintComponent(g);<br>int xCenter = getWidth() / 2;<br>int yCenter = getHeight() / 2<br>int radius = (int)(Math.min(getWidth(), getHeight()) * 0.4);<br>intx = xCenter - radius;<br>inty = yCenter - radius;<br>g.fillArc(x, y, 2 * radius, 2 * radius, 0, 30);<br> g.fillArc(x, y, 2 * radius, 2 * radius, 90, 30);<br> g.fillArc(x, y, 2 * radius, 2 * radius, 180, 30);<br> g.fillArc(x, y, 2 * radius, 2 * radius, 270, 30)<br>}<br>}</blockquote>
                </div>

            <div class="row">
                <h2><?php echo $ch01->sectTitle8; ?></h2>
                <p><?php echo $ch01->sect8; ?></p>
                <p>The next statements create an image icon and display it in a label:</p>
                <blockquote>ImageIcon imageIcon = new ImageIcon("image/us.gif");<br> JLabel jlblImage = new JLabel(imageIcon);</blockquote>
                <p>The following is example:<br></p>
                <blockquote>import java.awt.*;<br> import javax.swing.*;<br> public class DisplayImage extends JFrame {<br> public DisplayImage() {<br>add(new ImagePanel());<br>}<br>public static void main(String[] args) {<br>JFrame frame = new DisplayImage();<br> frame.setTitle("DisplayImage");<br> frame.setSize(300, 300);<br> frame.setLocationRelativeTo(null); // Center the frame<br> frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);<br> frame.setVisible(true);<br>}<br>}<br>class ImagePanel extends JPanel {<br>privateImageIcon imageIcon = new ImageIcon("image/us.gif");<br>privateImage image = imageIcon.getImage();<br>@Override /** Draw image on the panel */<br>protected void paintComponent(Graphics g) {<br>super.paintComponent(g);<br>if (image != null)<br>g.drawImage(image, 0, 0, getWidth(), getHeight(), this);<br>}<br>}</blockquote>
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
