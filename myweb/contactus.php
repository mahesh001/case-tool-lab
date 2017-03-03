CTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OnlineStore:home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!--Fixed Top Navbar-->
    <div class="navbar  navbar-inverse navbar-fixed-top">
      <div class="container">


        <a class="navbar-brand" href="index.html">OnlineStore</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target  =".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contactus.php">contactus</a></li>
            <li><a  href="project/login.php" class="btn btn-success btn-lg">Sign-In</a></li>
          <li><a  href="project/signup.php" class="btn btn-default btn-lg">Create Account</a></li>
    
          </ul>
        </div>
      </div>
    </div>
<p>contact us!</p>
<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("youremail@yoursite.com", $subject, $message, $from);
        echo "Email sent!";
        }
    }  
?>
</div>
 <div class="jumbotron">
          <h2>India's Latest E-Commerce Website By::MAHESH KUMAR GARHWAL</h2>
          <p class="btn-group">
          
          </p>
      </div>

      <!--feture content-->

      <div class="row">
      
        <div class="col-sm-4 fbox">

        <span class="glyphicon glyphicon-heart"></span>
        <h3>Easy to Use</h3>
          
          <a  href="#" class="btn btn-default">Read more..</a>
        </div>

        <div class="col-sm-4 fbox">
        <span class="glyphicon glyphicon-comment"></span>
          <h3>Conect with Friend</h3>
         
          <a  href="#" class="btn btn-default">Read more..</a>
        </div>

      </div> <!--end feture content-->
      <hr>
      <!--how to content-->
      <div class="row">
        <div class="col-sm-6">
          <h3>How To Used It.</h3>
           <p>varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.</p>  
           <div class="row">
             <div class="col-sm-6">
             <img src="img/book.jpg" class="img-responsive" alt="book">
               
             </div>
             <div class="col-sm-6">
             <p>magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.</p>
             <a  href="#" class="btn btn-default ">Download ebook</a>
               
             </div>
           </div>    
        </div>
        <div class="col-sm-6">
          <h3>About HindiDevtuts</h3>
          <p>varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.</p>
          <a  href="#" class="btn btn-success btn-lg">Know more about hindidevtuts</a>
          <h3>Learning Process</h3>
          <p>varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur varius blandit sit amet non magna.</p>
        </div>
      </div>

      <!--footer content-->
      <hr>
      <footer class="footer">
        <p>&copy:2014 Magic App Design by: HindiDevTuts</p>
      </footer>

<div id="footer">
<p> @copyright 2015 <a>crazychanger</a> all right reserved.<p> 
</div>
</body>
</html>