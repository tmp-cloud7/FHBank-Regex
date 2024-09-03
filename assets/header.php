<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <title><?= $pageTitle?></title>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"><title>Document</title> -->
</head>
<body>
    <header>
        <h1>FH Bank </h1>        
        <nav>
            <?php if(isset($_SESSION['profile_id'])) {?>
                <ul>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a></li>                       
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
                    </ul>

            <?php } else {?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>    
        </nav>
       
        <?php }?>
    </header>
