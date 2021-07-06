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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" href="css/hide.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/staff.css" />
    <script type="text/javascript" src="js/rightde.js"></script>
    <style type="text/css">

    </style>
</head>

<body>
    <header class="nav-down ">

        <nav style="border-radius:0px; height:20px;background-color:#FFF" class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Welcome <?php echo $_SESSION['username']; ?>! <a href="adminlogin.php">Logout</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="adminedit.php">Main Menu</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 ">
                <h1 class="text-center ">Dubnet College<br /><small style="font-size:20px">Student Management
                        System</small></h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 ">
                        <br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <ul class="nav  nav-justified" style="background-color:#FFF;">
                <li style="font-family:calibri; font-size:16px;"><a style="color:#000" href="studentedit.php"><strong>Student Information Modify</strong></a></li>
                <li style="font-family:calibri; font-size:16px;"><a style="color:#000" href="studentedit.php"><strong>Student Information Delete</strong></a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="page-header">
                    <h3 style="font-family:calibri;" class="text-center">Student Information</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-md-push-4">
                <h4 style="font-family:calibri;" class="text-center alert alert-danger">Press Search Buttion for view
                    all details</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <table style="background-color: rgba(222,444,444,0.0);" class="table table-responsive" width="500" border="0">
            <form action="" method="post">
                <tr>
                    <td><input style="font-size:12px" type="text" name="search" class="form-control" placeholder="Enter Student Registration No / Mobile Number/ Email / First name or second" />
                    </td>
                </tr>
                <tr align="center">
                    <td align="center"><button name="filter" type="submit" class="btn  btn-default btn-block">Search</button></td>
                </tr>
            </form>
        </table>
    </div>
    <div style="border-radius:10px; padding:25px;" class="container-fluid">
        <div class="row">
            <div class="">
                <br />

                <?php
                $count = 1;
                if (isset($_POST['filter'])) {
                    $search = ($_POST['search']);
                    $self_query = "SELECT * FROM `admission` WHERE concat(`id`, `contact`,`email`,`sname`,`gname`) like '%$search%' ORDER BY `id` DESC";
                    $result = mysqli_query($cn, $self_query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div style="padding:20px;  margin:5px; border-radius:5px; background-color:rgba(255, 255, 255, 0.3);" class="col-md-5 col-md-push-1">
                            <dl class="dl-horizontal">
                                <form class="" action="" method="post" id="upform">
                                    <input type="hidden" name="new" value="1" />

                                    <dt style="font-size:12px;"><strong>Student Reg.No :</strong> </dt>
                                    <dd style="font-size:12px;"><?php echo $row["id"]; ?></dd>

                                    <dt style="font-size:12px;"><strong>Student First Name : </strong> </dt>
                                    <dd style="font-size:12px;"><input name="sname" id="patifn" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["sname"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Student Last Name : </strong> </dt>
                                    <dd style="font-size:12px;"><input name="gname" id="gname" disabled style="margin:5px" class="form-control" type="text" value=" <?php echo $row["gname"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Contact : </strong></dt>
                                    <dd style="font-size:12px;"><input name="contact" id="contact" disabled style="margin:5px" class="form-control" type="number" value="<?php echo $row["contact"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Email: </strong></dt>
                                    <dd style="font-size:12px;"><input name="email" id="email" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["email"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Gender: </strong></dt>
                                    <dd style="font-size:12px;">
                                        <select id="gender" disabled style="margin:5px" name="gender" required="required" class="form-control" placeholder="Select your Gendere">
                                            <option value="<?php echo $row["gender"]; ?>"><?php echo $row["gender"]; ?>
                                            </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </dd>
                                    </select>


                                    <dt style="font-size:12px;"><strong>Address: </strong></dt>
                                    <dd style="font-size:12px;"><input name="addy" id="addy" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["addy"]; ?>"></dd>


                                    <dt style="font-size:12px;"><strong>Program: </strong></dt>
                                    <dd style="font-size:12px;"><input name="course" id="course" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["course"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Id Number: </strong></dt>
                                    <dd style="font-size:12px;"><input name="idnumber" id="idnumber" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["idnumber"]; ?>"></dd>

                                    <dt style="font-size:12px;"><strong>Nationality: </strong></dt>
                                    <dd style="font-size:12px;"><input name="nationality" id="nationality" disabled style="margin:5px" class="form-control" type="text" value="<?php echo $row["nationality"]; ?>"></dd>



                            </dl>
                            <dl>

                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                            </dl>
                            <ul style="" class="nav nav-justified">
                                <li style="background-color:rgba(255, 255, 255, 0.3);"><a href="supdate.php?id=<?php echo $row["id"]; ?>" style="colour:#000">Update</a>
                                </li>
                                <li style="background-color:rgba(255, 255, 255, 0.3);"><a href="sdelete.php?id=<?php echo $row["id"]; ?>" style="colour:#000">Delete</a>
                                </li>
                            </ul>

                        </div>
                        </form>

                <?php
                        $count++;
                    }
                } ?>


            </div>
        </div>
    </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pupdate.js"></script>
    <script src="js/hidenv.js"></script>
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