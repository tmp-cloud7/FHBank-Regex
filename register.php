<?php
    $pageTitle = "Sign Up";
    require_once("assets/header.php");
    require_once("assets/db_confhbank.php");

   
    // Initializing Variables
    $passError = $emailError = $phoneError = $ninError = $bvnError = ""; # Error Variables
    $firstname = $middlename = $surname = $gender = $email = $phone = $dob = $username = $nin = $bvn = $acc_type = $maritalstatus =$sta_origin = $lga_origin = $address = ""; // Customer Variables
    // htmlspecialchars()
    // Form Validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        // Capturing customers bio-data

        // htmlspecialchars() // trim() for security

        $firstname = htmlspecialchars(trim($_POST["firstname"]));
        $middlename = htmlspecialchars(trim($_POST["middlename"]));
        $surname = htmlspecialchars(trim( $_POST["surname"]));
        $username = htmlspecialchars(trim( $_POST['username']));
        $gender = htmlspecialchars(trim( $_POST["gender"]));
        $email =  $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $phone =htmlspecialchars(trim( $_POST["phone"]));
        $dob = htmlspecialchars(trim($_POST["dob"]));
        $nin = htmlspecialchars(trim($_POST["nin"]));
        $bvn = htmlspecialchars(trim($_POST["bvn"]));
        $acc_type = htmlspecialchars(trim($_POST["acc_type"]));
        $maritalstatus = htmlspecialchars(trim($_POST["maritalstatus"]));
        $sta_origin = htmlspecialchars(trim($_POST["sta_origin"]));
        $lga_origin = htmlspecialchars(trim($_POST["lga_origin"]));
        $address = htmlspecialchars(trim($_POST["address"]));
       

        // Validating email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $sql = "SELECT * FROM users WHERE email = ?";
           $stmt = $conn -> prepare($sql);
           $stmt -> bind_param("s", $email);
           $stmt -> execute();
           $result = $stmt -> get_result();
           if ($result -> num_rows > 0 ) {
            $emailError = "Email already exists";
           }
        } else {
            $emailError = "Invalid email format";
        }

        // Password Validation
        if($password == $cpassword) {
            if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@%$&?-_])[A-Za-z\d!@%$&?-_]{8,}/", $password)) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $passError = "Password must contain at least 8 characters, including uppercase, lowercase, number, and special character";
            }
        } else {
            $passError = "Password do not match";
        }

        // Phone Number Validation
        if (preg_match('/^0[789][01]\d{8}$|^\+234[789][01]\d{8}$/', $phone)) {
            $sql = "SELECT * FROM users WHERE phone = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param("s", $phone);
            $stmt -> execute();
            $result = $stmt -> get_result();
            if ($result -> num_rows > 0) {
                $phoneError = "Phone number already exist";
            }        
        } else {
            $phoneError = "Invalid phone number";
        }

        // Validating Bvn And NIN
        if (preg_match('/\d{11}$/', $nin)) {
            $sql = "SELECT * FROM users WHERE nin = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bind_param("s", $nin);
            $stmt -> execute();
            $result = $stmt -> get_result();
            if ($result -> num_rows > 0) {
                $ninError = "NIN already exist";
            }        
        } else {
            $ninError = "Invalid NIN";
        }
        if (preg_match('/\d{11}$/', $bvn)) {
           $sql = "SELECT * FROM users WHERE bvn = ?";
           $stmt = $conn -> prepare($sql);
           $stmt -> bind_param("s", $bvn);
           $stmt -> execute();
           $result = $stmt -> get_result();
           if ($result -> num_rows > 0) {
                $bvnError = "Bvn already exist";
           }
        } else {
            $ninError = "Invalid input";
        }

        // Populating the database
        if ($emailError == "" && $phoneError == ""  && $passError == "" && $ninError == "" && $bvnError == "") {
            $sql = 'INSERT INTO users (firstname, middlename, lastname, gender, phone, email, username, password, dob, acc_type, marital_status, address, lga_origin, state_origin, bvn, nin ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $conn -> prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssssssssssssssss", $firstname, $middlename, $surname, $gender, $phone, $email, $username, $pass, $dob, $acc_type, $maritalstatus, $address, $lga_origin, $sta_origin, $bvn, $nin);
                if ($stmt->execute()) {
                    echo "<h3>Registered Succesfully</h3>";
                }
            }
        } else {
            echo "Errors: $passError, $phoneError, $emailError, $ninError, $bvnError";
        }        
    }
        

?>

<main class="m-5 p-5" style="background: gray;">
    <form autocomplete="off" method="post" action="" style="display: flex; gap: 20px; flex-flow: column">

        <h1>Sign Up</h1>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name" name="firstname" value="<?= $firstname?>" required/>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Middlename (Optional)" name="middlename" value="<?= $middlename?>"/>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Surname" name="surname" value="<?= $surname?>" required/>
            </div>
        </div>

        <div class="row">
        <div class="col">
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $username?>" required/>
            </div>
            <div class="col">
                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" value="<?= $phone?>" required/>
                <span class="text-danger"><?= $phoneError ?></span>
            </div>
            
            <div class="col">
                <input type="email" class="form-control" placeholder="E-Mail Address" name="email" value="<?= $email?>" required/>
            </div>
        </div>
        <div class="row">
        <div class="col">
                <input type="text" class="form-control" placeholder="Enter BVN" name="bvn" value="<?= $bvn?>" required/>
                <span class="text-danger"><?= $bvnError?></span>
            </div>           
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter NIN" name="nin" value="<?= $nin?>" required/>
                <span class="text-danger"><?= $ninError?></span>
            </div>
            <div class="col">
                <div class="d-flex">
                    Account Type:
                        <select name="acc_type" required class ="form-control" value="<?=$acc_type?>">                        
                            <option value="1">Savings</option>
                            <option value="2">Current</option>
                            <option value="3">Fixed</option>
                        </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                Gender:
                <input type="radio" name="gender" value="Male"/> Male
                <input type="radio" name="gender" value="Female" checked/> Female
                <input type="radio" name="gender" value="Others"/> Others
            </div>
            <div class="col l-2">
                Date Of Birth:
                <input type="date" class="form-control" placeholder="dob" name="dob" value="<?= $dob ?>" required />
            </div>
            <div class="col">
                <div class="d-flex">
                    Marital Status:
                    <select name="maritalstatus" required class="form-control" value="<?=$maritalstatus?>">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Seperated">Seperated</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
            </div>
        <div class="row mt-4">
            <div class="col">
                <input type="text" class="form-control" placeholder="State Of Origin" name="sta_origin" value="<?= $sta_origin?>" required/>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="LGA Origin" name="lga_origin" value="<?= $lga_origin?>" required/>
            </div>
        </div>   
        </div>
        <div class="row">
            <div class="col">
                <textarea placeholder="Home Address" name="address" class="form-control"><?= $address?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="password" class="form-control" placeholder="Create Password" name="password" value="<?= $password?>" required/>
                <span class="text-danger"><?= $passError?></span>
            </div>
            <div class="col">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?= $cpassword ?>" required />
                <span class="text-danger"><?= $passError?></span>
            </div>
        </div>

        <div class="row ">
            <div class="col">
                <input type="submit" value="Sign up" class="form-control btn btn-primary"/>
            </div>
        </div>
    </form>
</main>