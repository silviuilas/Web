<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('PHP/DatabaseA.php');
    $db = DatabaseA::getDatabaseObj();
    $db->connect();
    $name = $_POST["usrname"];
    $pass = $_POST["paswd"];
    if (isset($_POST["usrname"]) == NULL or isset($_POST["paswd"]) == NULL) {
        echo "Username sau password bug";
        die();
    }


    $result = $db->query("Select * from admins_info where username='$name'");
    if (($row = mysqli_fetch_row($result)) != NULL) {
        if ($row[1] == $_POST['usrname'])
            if ($row[2] == $_POST['paswd']) {
                $_SESSION['adminUser'] = $_POST['usrname'];
                $_SESSION['adminId'] = $row[0];
            }
    }
}
