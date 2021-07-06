<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "student_admission";

$cn = mysqli_connect($servername, $username, $password, $db);
?>




<?php
session_start();
if ((!isset($_SESSION["username"])) && (!isset($_SESSION["Adminstrator"]))) {
    header("Location: adminlogin.php");
    exit();
}
?>


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/hide.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="js/rightde.js"></script>
    <title>Adminstration</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <header class="nav-down ">

        <nav style=" border-radius: 0px; height:20px;background-color:#FFF" class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Welcome <font color="#7eaefc"><?php echo $_SESSION['username']; ?>!</font>
                        You
                        are logged in as <?php echo $_SESSION['username']; ?> <a href="adminlogin.php">Logout</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li><a href="studentinfo.php">Student Info</a></li>
                        <li><a href="lecinfo.php">Lecture Info</a></li>
                        <li><a href="invoice.php">Student Invoices</a></li>
                        <li><a href="accepted.php">Accepted Student</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>



    </header>

    <main>
        <div class="container-fluid">
            <div class="row">

                <h1 class="text-center "><img width="9%" src="images/menu/logol.png">Dubnet College<br /><small
                        style="font-size:20px">Student Enrollment Management System</small></h1>

                <hr width="250px">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="page-header">
                        <h3 style="font-family:calibri;" class="text-center">Invoice Information</h3>
                    </div>
                    <br />


                    <body>

                        <h2>Contact accounting office</h2>
    </main>
</body>
<footer class=" footer">

    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    <br>
    <div class="container-fluid footer">
        <div class="row">
            <br>
            <div class="col-md-10 col-md-push-2">
                <div style="text-align: left;" class="col-md-2">
                    <h5 style="font-size: 17px;">Student Info</h5>

                    <p><a style="color: #767773" href="#">Student Registration</a><br>
                        <a style="color: #767773" href="#">Student Information</a><br>
                        <a style="color: #767773" href="#">Student Search</a><br>
                    </p>

                </div>
                <div style="text-align: left;" class="col-md-2">
                    <h5 style="font-size: 17px;">Lecturer Info</h5>
                    <p><a style="color: #767773" href="#">Add lecture</a><br>
                        <a style="color: #767773" href="#">Lecture Details</a><br>
                        <a style="color: #767773" href="#">Search Lecture</a><br>
                        <a style="color: #767773" href="#">Active lecture</a><br>
                    </p>
                </div>
                <div style="text-align: left;" class="col-md-2">
                    <h5 style="font-size: 17px;">Student Invoices</h5>
                    <p><a style="color: #767773" href="#">Curent Invoices</a><br>
                        <a style="color: #767773" href="#">Accepted student Invoices</a>
                    </p>
                </div>
                <div style="text-align: left;" class="col-md-2">
                    <h5 style="font-size: 17px;">Accomodation Information</h5>
                    <p><a style="color: #767773" href="#">Accomodation Avilability</a></p>
                </div>
                <div style="text-align: left;" class="col-md-2">
                    <h5 style="font-size: 17px;">Accepted Student Information</h5>
                    <p id=""><a style="color: #767773" href="#">Accepted Student Information</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid foot2">
        <div class="row">
            <div style="padding: 10px;" class="col-md-10 col-md-push-2">
                Copyright © 2021 Ropafadzo. All rights reserved.
            </div>
        </div>
    </div>
</footer>


</html>