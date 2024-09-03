<?php
    $pageTitle = "Login Page";
    require_once("assets/header.php");
    require_once("assets/db_confhbank.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validate user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo 'All fields are required';
            exit;
        }
            $sql = 'SELECT * FROM users WHERE email = ? LIMIT 1';
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param("s", $email);
            $stmt -> execute();
            $result = $stmt -> get_result();
            if ($result -> num_rows === 1) {
                $row = $result -> fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['profile_id'] = $row['user_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    header("Location: dashboard.php");
                } else {
                    echo 'User not found';
                    echo '<a href="register.php">Click here to register</a>';
                }
            } else {
                echo 'User not found';
                echo '<a href="register.php">Click here to register</a>';
            }
        } 
?>

<form class="m-5 p-5" method="post" action="">
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email or Phone Number">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password"/>
    </div>
    <div class="form-group">
        <label class="form-check-label"><input type="checkbox"> Remember me</label>
    </div>
    <input type="submit" class="btn btn-primary" value="Sign In"/>
</form>