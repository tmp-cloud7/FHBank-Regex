<?php
    $pageTitle = "User Account";
    require_once("assets/header.php");
    require_once("assets/db_confhbank.php");

    if(!isset($_SESSION['profile_id'])) {
        header("Location: login.php");
    }
    echo "<h1>Welcome,</h1>";

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $profile_dp = $_FILES('profile_dp');
        if ($profile_dp['error'] == 0) {
            $filename = uniqid("profile_") . "." . pathinfo($profile_dp['name'], PATHINFO_EXTENSION);
            $filelocation = "profile_dp/" . $profile_dp;
        } else {
            echo "error uploading file";
        }
   }
?>

<style>
    #imagePreview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 5px;
    }
</style>
<form action="" method="post" enctype="multipart/form-data" >
    <input type="file" name="profile_dp" id="profile_dp"/>
    <img src="" alt="file upload" name="imagePreview" id="imagePreview"/>
    <input type="submit" value="upload" placeholder="Upload photo" />

</form>

<script>
    const preview = document.getElementById("#imagePreview");
    const profImage = document.getElementById("#profile_dp");

    profImage.addEventListener("change", function {

        let file = this.files[0];

        imageSize = 3 * 1024 * 1024;

        if(file['type'] == jpg || file['type'] == jpeg || file['type'] == png) {
            if (!(file['size'] > imageSize)) {
                const reader = new FileReader ();
                reader.onload = function {
                    preview.src = reader.result
                }
                reader.readAsDataURL(file)
            } else {
                alert (file['size'] "+ should not exceed 3MB ");
                this.value = "";
            }
        } else {
            alert (file['type'] "is not allowed");
            this.value ="";
        }
    })



</script>