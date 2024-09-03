<?php
    $pageTitle = "User Account";
    require_once("assets/header.php");
    require_once("assets/db_confhbank.php");

    if(!isset($_SESSION['profile_id'])) {
        header("Location: parent_login.php");
    }

    echo "<h1>Welcome,</h1>";

?>

<style>
    #imagePreview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 5px;
    }
</style>
<input type="file" name="profile_dp" id="profile_dp" />
<img src="" alt="File Upload" name="imagePreview" id="imagePreview"/>

<script>
    const preview = document.querySelector("#imagePreview");
    const profileImage = document.querySelector("#student_dp");
    
    profileImage.addEventListener("change", function() {
        let file = this.files[0];

        fileSize = 3 * 1024 * 1024;
        if (file['type'] == "image/jpeg" || file['type'] == "image/png" || file['type'] == "image/jpg") {
            if (!(file['size'] > fileSize)) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
        } else {
            alert("file exceed 3MB");
            this.value = "";
        }
        } else {
            alert(file['name'] + " is not allowed");
            this.value = "";
        }
    });
</script>