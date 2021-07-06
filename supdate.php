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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Welcome <?php echo $_SESSION['username']; ?>! <a
                            href="adminlogin.php">Logout</a>
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
    <?php

    $id = $_REQUEST['id'];
    $query = "SELECT * FROM `admission` WHERE `id`='$id'";
    $result = mysqli_query($cn, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 ">
                <h1 class="text-center ">Dubnet College<br /><small style="font-size:20px">Student Management
                        System</small></h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="page-header">
                    <h3 style="font-family:calibri;" class="text-center">Update Student Information</h3>
                </div>
            </div>
        </div>
    </div>

    <div style="border-radius:10px; padding:25px;" class="container-fluid">
        <div class="row">
            <div class="">
                <h4 style="font-family:calibri;" class="text-center">Enable Fields using active field dropdown</h4>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-push-4">
                            <ul class="nav  nav-justified" style="background-color:#FFF;">
                                <li style="font-family:calibri; font-size:16px;"><a href="studentedit.php">Go Back!</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <br />
                <?php

                if (isset($_POST['submit'])) {

                    //$id=$_REQUEST['id'];
                    $id = $_POST['id'];
                    $sname = $_POST['sname'];
                    $gname = $_POST['gname'];
                    $contact = $_POST['contact'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $adress = $_POST['addy'];
                    $idnumber = $_POST['idnumber'];
                    $nationality = $_POST['nationality'];
                    $course = $_POST['course'];

                    $rquery = "UPDATE `admission` SET
`sname`='$sname',
`gname`='$gname',
`contact`='$contact',
`email`='$email',
`gender`='$gender',
`addy`='$adress',
`idnumber`='$idnumber',
`nationality`='$nationality',
`course`='$course',

WHERE `id` = '$id'";
                    mysqli_query($cn, $rquery) or die(mysqli_error($cn));
                    header("Location: studentedit.php");
                }
                ?>

                <div style="padding:20px;  margin:5px; border-radius:5px; background-color:rgba(255, 255, 255, 0.3);"
                    class="col-md-4 col-md-push-4">
                    <dl class="dl-horizontal">
                        <form class="" action="" method="post" id="upform">
                            <input type="hidden" name="new" value="1" />
                            <dt style="font-size:12px;"><strong>Student Reg.No :</strong> </dt>
                            <dd style="font-size:12px;"><?php echo $row["id"]; ?></dd>

                            <dt style="font-size:12px;"><strong>Student First Name : </strong> </dt>
                            <dd style="font-size:12px;"><input pattern="[A-Za-z]{1,30}" title="Use Only Letters"
                                    name="sname" id="sname" style="margin:5px" class="form-control" type="text"
                                    value="<?php echo $row["sname"]; ?>"></dd>

                            <dt style="font-size:12px;"><strong>Student Last Name : </strong> </dt>
                            <dd style="font-size:12px;"><input pattern="[A-Za-z]{1,30}" title="Use Only Letters"
                                    name="gname" id="gname" style="margin:5px" class="form-control" type="text"
                                    value=" <?php echo $row["gname"]; ?> "></dd>

                            <dt style="font-size:12px;"><strong>Contact Number : </strong>
                            <dd style="font-size:12px;">
                                <div style="margin:5px" class="input-group">
                                    <span class="  input-group-addon"
                                        id="basic-addon1"><?php echo $row["contact"]; ?></span>
                                    <input pattern="\d{9,9}" maxlength="9"
                                        title="Enter valid Mobile Number Use only Letters and chacter count must be 9"
                                        required="required" name="contact" id="tel" type="text" class="form-control"
                                        value="<?php echo $row["contact"]; ?>" placeholder="contact"
                                        aria-describedby="basic-addon1 ">
                            </dd>


                            <dt style="font-size:12px;"><strong>Email: </strong></dt>
                            <dd style="font-size:12px;"><input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                    title="Not Valide Email" name="email" id="email" style="margin:5px"
                                    class="form-control" type="text" value="<?php echo $row["email"]; ?>"></dd>

                            <dt style="font-size:12px;"><strong>Gender: </strong></dt>
                            <dd style="font-size:12px;">
                                <select name="gender" id="gender" style="margin:5px" class="form-control"
                                    placeholder="Select your Gender">
                                    <option value="<?php echo $row["gender"]; ?>"><?php echo $row["gender"]; ?>
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                            </dd>
                            </select>


                            <dt style="font-size:12px;"><strong>Address: </strong></dt>
                            <dd style="font-size:12px;"><input required="required" name="addy" id="addy"
                                    style="margin:5px" class="form-control" type="text"
                                    value="<?php echo $row["addy"]; ?>"></dd>

                            <dt style="font-size:12px;"><strong>Id Number: </strong></dt>
                            <dd style="font-size:12px;"><input name="idnumber" style="margin:5px" class="form-control"
                                    type="text" value="<?php echo $row["idnumber"]; ?>"></dd>

                            <dt style="font-size:12px;"><strong>Nationality: </strong></dt>
                            <dd style="font-size:12px;"><input name="nationality" style="margin:5px"
                                    class="form-control" type="text" value="<?php echo $row["nationality"]; ?>"></dd>

                            <dt style="font-size:12px;"><strong>Course: </strong></dt>
                            <dd style="font-size:12px;"><input name="course" style="margin:5px" class="form-control"
                                    type="text" value="<?php echo $row["course"]; ?>"></dd>



                    </dl>
                    <dl>
                        <dt style="font-size:12px;"><strong>Active Field: </strong></dt>
                        </dt>
                        <dd style="font-size:12px;">
                            <select onchange="display()" style="margin:5px; border-colour=red;" id="fieldsac"
                                required="required" class="form-control" placeholder="Select your Staff Type">

                                <option value="DF">Disable Fields</option>
                                <option value="ED">Enable Fields</option>
                            </select>
                        </dd>
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                    </dl>
                    <center>
                        <button id="Button" class="btn" name=submit type="submit" disabled="disabled">Update</button>
                    </center>
                    </ul>

                </div>
                </form>



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
    <hr />
    <center>
        <h5 style="color:#FFF">Developed by Ropafadzo</h5>
        <center>
</footer>

</html>