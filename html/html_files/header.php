<!DOCTYPE html>


<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/search.css">
    <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/money-and-finance/512/find-512.png">
    <title>COMP IT</title>
</head>
<nav class="navbar" >
    <a href="../">CompIT</a>
    <input type="text" placeholder="Search...">
    <a href="#">Favorite</a>
    <div class="dropdown">
        <a href="javascript:void(0);" class="icon" onclick="dropDownHamburger()">
            <i class="fa fa-bars"></i>
        </a>
        <div class="dropcontent">
            <a href="#">Categorii</a>
            <a href="../html_files/login">Login</a>
            <a href="../html_files/register">Sign Up</a>
            <a href="#">Your Opinion</a>
        </div>
    </div>
    <a href="../html_files/login">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['username'])) {
        echo "Buna ";
        echo $_SESSION['username'];
    }
    else
    {
        echo "Login";
    }
    ?>
    </a>
</nav>