 <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "student_admission";

    $cn = mysqli_connect($servername, $username, $password, $db);

    ?>

 <?php



    $query = "select * from admission order by id desc limit 1";
    $result = mysqli_query($cn, $query);
    $row = mysqli_fetch_array($result);

    $lastid = $row['id'];

    if ($lastid == " ") {

        $studentid = "DN0001";
    } else {
        $studentid = substr($lastid, 3);
        $studentid = intval($studentid);
        $studentid = "DN000" . ($studentid + 1);
    }
    ?> <?php

        $estudentid = "";
        $esname = "";
        $egname = "";
        $econtact = "";
        $eemail = "";
        $eaddy = "";
        $enationality = "";
        $egender = "";
        $ecourse = "";
        $eidnumber = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $studentid = $_POST['id'];
            $sname = $_POST['sname'];
            $gname = $_POST['gname'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $addy = $_POST['addy'];


            if (isset($_POST['gender']))
                $gender = $_POST['gender'];

            $idnumber = $_POST['idnumber'];
            $nationality = $_POST['nationality'];
            $course = $_POST['course'];

            $er = 0;

            if ($sname == "") {
                $er++;
                $esname = "*Required";
            }


            if ($gname == "") {
                $er++;
                $egname = "*Required";
            }


            if ($contact == "") {
                $er++;
                $econtact = "*Required";
            }

            if ($email == "") {
                $er++;
                $eemail = "*Required";
            }

            if ($addy == "") {
                $er++;
                $eaddy = "*Required";
            }

            if ($nationality == "") {
                $er++;
                $enationality = "*Required";
            }



            if ($idnumber == "") {
                $er++;
                $eidnumber = "*Please enter valid id number";
            }

            if ($course == "") {
                $er++;
                $ecourse = "*Please confirm your Course";
            }


            if ($er == 0) {

                $check = mysqli_query($cn, "select * from admission where id='$studentid' and idnumber='$idnumber'");
                $checkrows = mysqli_num_rows($check);

                if ($checkrows > 0) {
                    echo "Student Already exists refresh page to add new";
                } else {





                    $sql = "INSERT INTO admission ( id, sname, gname, contact, email, addy,gender,idnumber, nationality, course) VALUES ('$studentid','$sname',
						'$gname','$contact','$email','$addy','$gender','$idnumber','$nationality','$course')";

                    if (mysqli_query($cn, $sql)) {

                        print '<span class = "successMessage">Data saved into system.</span>';
                    } else {
                        echo "Data Failed to be saved Student already exist Refresh";
                    }
                }
            }
        }


        ?>







 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet"
     type="text/css" />
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


 <div class="form-area">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="section-title">
                     <h3>Admission form</h3>
                 </div>

                 <div class="row">
                     <div class="col-md-12">
                         <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="left-side-form">
                                         <h5><label for="studentid">Student Number</label><span class="error">
                                             </span>
                                         </h5>
                                         <p><input type="text" name="id" id="ïd" value="<?php echo $studentid ?>"
                                                 readonly></p>

                                         <h5><label for="sname">Student names</label><span class="error">
                                                 <?php print $esname; ?></span>
                                         </h5>
                                         <p><input type="text" name="sname" id="sname" value=""></p>

                                         <h5><label for="gname">Surname name</label><span class="error">
                                                 <?php print $egname; ?></span></h5>
                                         <p><input type="text" name="gname" id="gname" value=""></p>

                                         <h5><label for="contact">contact</label><span class="error">
                                                 <?php print $econtact; ?>+263</span></h5>
                                         <p><input type="text" name="contact" id="contact" value="" pattern="\d{9,9}"
                                                 maxlength="9"></p>

                                         <h5><label for="email">email</label><span class="error">
                                                 <?php print $eemail; ?></span></h5>
                                         <p><input type="text" name="email" id="email" value=""></p>

                                         <h5><label for="addy">address</label><span class="error">
                                                 <?php print $eaddy; ?></span></h5>
                                         <p><textarea name="addy" id="addy"></textarea></p>
                                     </div>
                                 </div>
                                 <div class="col-md-6">

                                     <h5><label for="gender">Gender</label><span class="error">
                                             <?php print $egender; ?></span></h5>
                                     <input type="radio" name="gender" value="male"><span>Male</span>
                                     <input type="radio" name="gender" value="female"><span>Female</span>
                                     <input type="radio" name="gender" value="others"><span>Others</span>

                                     <h5><label for="idnumber">National ID Number</label><span class="error">
                                             <?php print $eidnumber; ?></span></h5>
                                     <p><input type="text" name="idnumber" id="idnumber" value=""></p>

                                     <h5><label for="nationality">Nationality</label><span class="error">
                                             <?php print $enationality; ?></span></h5>
                                     <p><input type="text" name="nationality" id="nationality" value=""></p>



                                     <h5><label for="department">Choose Department Name</label></h5>
                                     <select id="type" class="form-control input-sm">
                                         <option value="item0">--Select Departments--</option>
                                         <option value="item1">Information Technology</option>
                                         <option value="item2">Accounting and Finance</option>
                                         <option value="item3">Marketing and Public Relations</option>
                                         <option value="item4">Purchasing,HR & Management</option>
                                         <option value="item5">Secretarial & Office Administration</option>

                                         <option value="item6">Academics</option>

                                     </select>

                                     <h5><label>Choose Courses</label>
                                         <select id="size" name="" id="" class="form-control input-sm">
                                             <option value="">--Courses--</option>
                                         </select>




                                         <h5><label for="course">Confirm Course Choosed</label><span class="error">
                                                 <?php print $ecourse; ?></span></h5>

                                         <p><input type="text" name="course" id="course" value=""></p>



                                         <p><input type="submit" name="submit" value="Save Details"></p>

                                 </div>
                             </div>
                     </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>

 <script type="text/javascript">
$(document).ready(function() {
    $("#type").change(function() {
        var val = $(this).val();
        if (val == "item1") {
            $("#size").html(
                "<option value='test'>Information Technology Diploma</option><option value='test'>Business IT</option><option value='test'>Computer Engineering Diploma</option><option value='test'>Information Systems</option><option value='test'>System analysis and Design</option>"
            );
        } else if (val == "item2") {
            $("#size").html(
                "<option value='test1'>IBAS-Certified to Diploma</option><option value='test1'>CIS-Diploma</option><option value='test1'>IAC-Certified to Diploma</option><option value='test1'>SAAA-Certified to Diploma</option><option value='test1'>ACCA-Certified to Advanced Diploma</option><option value='test1'>HEXCO-Certified to Diploma</option>"
            );
        } else if (val == "item3") {
            $("#size").html(
                "<option value='test'>IAC-Certified to Diploma</option><option value='test2'>HEXCO-Certified to Diploma</option><option value='test3'>CCIP-Certified to Diploma</option>"
            );
        } else if (val == "item4") {
            $("#size").html(
                "<option value='test'>IAC-Certified to Diploma</option><option value='test2'>IPMZ-Certified to Diploma</option>"
            );
        } else if (val == "item5") {
            $("#size").html(
                "<option value='test'>IAC-Diploma in Office Administration</option><option value='test2'>Excutive Secretarial</option><option value='test3'>HEXCO-Secretarial</option><option value='test4'>Records and Library science diploma</option>"
            );
        } else if (val == "item6") {
            $("#size").html(
                "<option value='test'>O level lesson</option><option value='test2'>A level lessons</option>"
            );
        } else if (val == "item0") {
            $("#size").html("<option value=''>--select one--</option>");
        }
    });
});
 </script>