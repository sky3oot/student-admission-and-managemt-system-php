<?php

if (isset($_GET['a'])) {
    if (file_exists(('admission/' . $_GET['a'] . ".php"))) {
        include('admission/' . $_GET['a'] . ".php");
    } else {
        print '<h4>Warning ! You are trying to violating our system.</h4>';
        var_dump($_SERVER);
    }
} else {
    include('admission/student_add.php');
}