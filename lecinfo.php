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




<?php


$servername = "localhost";
$username = "root";
$password = "";
$db = "student_admission";

$cn = mysqli_connect($servername, $username, $password, $db);


if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $surname  = $_POST['surname'];
    $course   = $_POST['course'];
    $time   = $_POST['time'];
    $status    = $_POST['status'];
    $contact    = $_POST['contact'];

    $checkeml = "SELECT course from lecture where course='$course'";
    $checktel = "SELECT contact from lecture where contact='$contact'";
    //Execute select SQL Querry
    $logPermition = mysqli_query($cn, $checkeml);
    $logPermitiontel = mysqli_query($cn, $checktel);

    //read sigle row of result set
    $row = mysqli_fetch_array($logPermition);
    $rowem = mysqli_fetch_array($logPermitiontel);


    $query = "INSERT INTO `lecture`
            (`name`, `surname`, `course`, `time`, `status`, `contact`)
             VALUES ('$name','$surname','$course','$time','$status','$contact')";

    if (mysqli_query($cn, $query)) {
        $success =  '<div align="center" class="alert alert-success">Registration Successful !</div>';
    }
}









?>




<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/staff.css" />
    <script type="text/javascript" src="js/rightde.js"></script>
    <style type="text/css">
    .active a {
        background-color: #c6c6c6;
    }
    </style>

</head>

<body>
    <link rel="stylesheet" href="css/hide.css">
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
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <h1 class="text-center ">Dubnet College<br /><small style="font-size:20px">Student Management
                        System</small></h1>
            </div>

        </div>
    </div>
    <br><br><br>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav  nav-justified" style="background-color:#FFF;">
                <li class="active" style="font-family:calibri; font-size:16px;"><a style="color:#000"
                        href="lecinfo.php"><strong>Add Lecturer</strong></a></li>
                <li style="font-family:calibri; font-size:16px;"><a style="color:#000"
                        href="lecsearch.php"><strong>lecturer Details</strong></a></li>
                <li style="font-family:calibri; font-size:16px;"><a style="color:#000"
                        href="lecfind.php"><strong>lecturer Search</strong></a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <div class="page-header">
                    <h3 style="font-family:calibri;" class="text-center">Lecturer Registration</h3>
                </div>
                <br />


                <div class="container">
                    <div class="row ">
                        <div class="col-md-4 col-md-offset-4 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">Lecturer Registration form</h3>
                                </div>
                                <center>
                                    <div class="panel-body">
                                        <small class="text-danger">All fields are required</small>
                                        <div>

                                            <table border="0" class="">
                                                <form id="id" name="id" action="" method="post">

                                                    <td colspan=" 2" style="padding:5px">
                                                        <div class="input-group col-md-12 col-xs-12"><input required
                                                                pattern="[A-Za-z]{1,30}" title="Use Only Letters"
                                                                id="name" name="name" type="text" class="form-control"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div id="name" class="text-center">
                                                        </div>
                                                    </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="padding:5px">
                                                            <div class="input-group col-md-12 col-xs-12"><input required
                                                                    pattern="[A-Za-z]{1,30}" title="Use Only Letters"
                                                                    name="surname" id="surname" type="text"
                                                                    class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="padding:5px">
                                                            <div class="input-group col-md-12 col-xs-12 "><input
                                                                    name="course" required="required" type="text"
                                                                    class="form-control" placeholder="Program"></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="padding:5px">
                                                            <div class="input-group col-md-12 col-xs-12 "> <span
                                                                    style="border-radius:0px; width:10px"
                                                                    class="input-group-addon"
                                                                    id="basic-addon1">+263</span><input
                                                                    pattern="\d{9,9}" maxlength="9"
                                                                    title="Envalid Mobile Number Use only Letters and chacter count must be 9"
                                                                    name="contact" required type="contact"
                                                                    class="form-control" placeholder="Contact Number"
                                                                    style="border-radius:0px"></div>
                                                            <script type="text/javascript">
                                                            document.write('<?php echo $conduperr; ?>');
                                                            </script>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="padding:5px;">
                                                            <div class="input-group col-md-12 col-xs-12 "><select
                                                                    name="status" required="required"
                                                                    class="form-control"
                                                                    placeholder="Select your Status">
                                                                    <option value="">Select Status</option>
                                                                    <option value="Active">Active</option>
                                                                    <option value="Not Active">Not Active</option>
                                                                </select></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="padding:5px;">
                                                            <div class="input-group col-md-12 col-xs-12 "><select
                                                                    name="time" required="required" class="form-control"
                                                                    placeholder="Select Time">
                                                                    <option value="">Time</option>
                                                                    <option value="Full time">Full Time</option>
                                                                    <option value="Part Time">Part Time</option>
                                                                    <option value="Other">Other</option>
                                                                </select></div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td colspan="2" style="padding:5px">
                                                            <div align="center"><button name="submit" type="submit"
                                                                    class="btn" value="SUBMIT">SUBMIT</button></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="padding:5px">
                                                            <script type="text/javascript">
                                                            document.write('<?php echo $success; ?>');
                                                            </script>
                                                        </td>
                                                    </tr>

                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </center>
                                <div class="panel-footer text-center">Press Submit button after completing </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/hidenv.js"></script>
    <script type="text/javascript">
    var x = "Basic Administartion";
    var y = "Super Administartion";

    if (document.getElementById("admte").value == x) {
        document.getElementById("lock").style.display = 'none';
    } else {
        document.getElementById("lock").style.display;
    }
    </script>
</body>
<footer>
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