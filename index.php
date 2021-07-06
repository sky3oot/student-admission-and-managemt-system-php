<?php
$cn = mysqli_connect("localhost", "root", "", "student_admission");


?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets1/css/owl.carousel.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="assets1/js/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Student Admission</title>
    <link rel="shourtcut icon" type="image/png" href="assets1/img/favicon.png">
</head>

<body>

    <div class="header-area header-absoulate">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Dubnet <span id="na">
                                    <h2 class="log">College</h2>
                                </span></span>
                        </a>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="main-menu">
                        <?php include('admission/menu.php'); ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                    <span class="social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-area">
        <div class="owl-carousel slider-content">
            <div class="single-slider-item slider-bg-1">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2>We provide quality education</h2>
                                    <p>Education is what remains after one has forgotten<br>
                                        what one has learned in school.

                                        <br><i>Albert Einstein</i>
                                    </p>

                                    <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item slider-bg-2">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2>Conceive and Achieve</h2>
                                    <p>Education is the most powerful weapon<br>
                                        which you can use to change the world.

                                        <br><i>Nelson Mandela</i>
                                    </p>

                                    <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <section class="home_banner_area">
                        <div class="banner_inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner_content text-center">
                                            <p class="text-uppercase">
                                                Take A Step
                                            </p>
                                            <h2 class="text-uppercase mt-4 mb-5">
                                                Registration still in Progress
                                            </h2>
                                            <div>
                                                <a href="registration.php" class="primary-btn2 mb-3 mb-sm-0">Register
                                                    Here</a>
                                                <a href="adminlogin.php" class="primary-btn ml-sm-3 ml-0">Admin Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <div class="logo">
                            <a href="">
                                <i class="fa fa-home"></i>
                                <span>Dubnet College</span>
                            </a>
                            <p> Education is what remains after one has forgotten <br>
                                what one has learned in school.

                                <br><i>Albert Einstein</i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h3>Navigation</h3>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="?a=admission/student_add">admission</a></li>
                                <li><a href="calender.php">Calender</a></li>
                                <li><a href="#">Courses</a></li>
                                <li><a href="payment.php">Payments</a></li>
                                <li><a href="contact">contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <span class="social-icon">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </span>
                </div>
                <p class="copy-right">Copyright &copy;2021 Developed By Ropafadzo</p>
            </div>
        </div>
    </footer>



    <script src="assets1/js/popper-1.12.9.min.js"></script>
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/owl.carousel.min.js"></script>
    <script src="assets1/js/main.js"></script>
</body>

</html>