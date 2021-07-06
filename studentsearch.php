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
    <title>Student Management System</title>
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
        <div class="container-fluid">
            <div class="row">
                <ul class="nav  nav-justified" style="background-color:#FFF;">

                    <li class="active" style="font-family:calibri; font-size:16px;"><a style="color:#000"
                            href="studentinfo.php"><strong>Student Information</strong></a></li>
                    <li style="font-family:calibri; font-size:16px;"><a style="color:#000"
                            href="studentsearch.php"><strong>Student Search</strong></a></li>
                    <li id="lockk" style="font-family:calibri; font-size:16px;"><a style="color:#000"
                            href="studentedit.php"><strong>Student Information Edit and Delete</strong></a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <br />
                    <div class="page-header">
                        <h3 style="font-family:calibri;" class="text-center">Search for Student Info</h3>
                    </div>
                </div>
                <table style="background-color: rgba(255,255,255,0.0);" class="table table-responsive" width="500"
                    border="0">
                    <form action="" method="post">
                        <tr>
                            <td><input style="font-size:12px" type="text" name="search" class="form-control"
                                    placeholder="Enter Student Registration No / Mobile Number/ Email / First name or second" />
                            </td>
                        </tr>
                        <tr align="center">
                            <td align="center"><button name="filter" type="submit"
                                    class="btn  btn-default btn-block">Search</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                if (isset($_POST['filter'])) {
                    $search = ($_POST['search']);
                    $self_query = "SELECT * FROM `admission` WHERE concat(`id`,`sname`,`gname`,`contact`,`email`, `idnumber`,`nationality`) like '%$search%' ORDER BY `id` DESC";
                    $result = mysqli_query($cn, $self_query);

                    while ($row = mysqli_fetch_array($result)) { ?>

                <div style="padding:20px;  margin:5px; border-radius:5px; background-color:rgba(255, 255, 255, 0.3);"
                    class="col-md-5 col-md-push-1">

                    <h4 style=" color:">
                        Student Reg.No : <?php echo $row["id"]; ?><br />
                        Student Name : <?php echo $row["sname"]; ?> <?php echo $row["gname"]; ?><br />
                        Student Contact : <?php echo $row["contact"] ?>
                    </h4>

                    <dl class="dl-horizontal">

                        <dt style="font-size:12px;"><strong>Student Email : </strong></dt>
                        <dd style="font-size:12px;"><?php echo $row["email"]; ?></dd>

                        <dt style="font-size:12px;"><strong>Id Number : </strong>
                        <dd style="font-size:12px;"><?php echo $row["idnumber"]; ?></dd>

                        <dt style="font-size:12px;"><strong>nationality: </strong></dt>
                        <dd style="font-size:12px;"><?php echo $row["nationality"]; ?></dd>

                        <dt style="font-size:12px;"><strong>Program: </strong></dt>
                        <dd style="font-size:12px;"><?php echo $row["course"]; ?></dd>

                        <dt style="font-size:12px;"><strong>Address: </strong></dt>
                        <dd style="font-size:12px;"><?php echo $row["addy"]; ?></dd>

                    </dl>

                    <ul style="" class="nav nav-justified">
                        <li style="background-color:rgba(255, 255, 255, 0.3);"><a style="colour:#000" target="_blank"
                                href="#?id=<?php echo $row["id"]; ?>" name="ad">Enroll to College</a></li>

                    </ul>




                    <?php }
                } ?>




                </div>
            </div>
        </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/petrej.js"></script>
        <script src="js/hidenv.js"></script>
        <script type="text/javascript">
        var x = "Basic Administartion";
        var y = "Super Administartion";





        <
        script src = "js/jquery.min.js" >
        </script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/hidenv.js"></script>

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