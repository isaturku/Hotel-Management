<?php
    $pass_match = true;
    if(isset($_POST["submit"])){
        if($_POST["pass_new"] == $_POST["pass_confirm"]){
            require "config/dbaccess.php";
            $pass = password_hash($_POST["pass_new"],PASSWORD_DEFAULT);
            $stmt = $con->prepare("UPDATE user SET  pass = ? where id = ?");
            $stmt->bind_param("si",$pass,$_GET["id"]);
            $stmt->execute();
            $stmt->close();
            $con->close();
            header("Location: users.php");
        }
        else{
            $pass_match = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Change Password</title>
</head>
<body>
    <?php 
        include "inc/navigation.php";
        if($_COOKIE["userRole"] != 1){
            echo '<div class="alert alert-danger" role="alert">Unfortunately you don\'t have the necessary permissions to use this feature.</div>';
            exit();
        }
        if(!isset($_GET["id"])){
            echo '<div class="alert alert-danger" role="alert">Unfortunately something went wrong! Please try again.</div>';
            exit();
        }
    ?>
    <h1 class="display-4">Change Password</h1>
    <form action="change_pass_admin.php?id=<?=$_GET["id"]?>" method="post" class="register-form">
        <div class="form-group">
            <label for="pass_new">New Password</label>
            <input type="password" class="form-control" id="pass_new" placeholder="••••••••" name="pass_new">
        </div>
        <div class="form-group">
            <label for="pass_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="pass_old" placeholder="••••••••" name="pass_confirm">
        </div>
        <?php
            if(!$pass_match){
                echo '<div class="alert alert-danger" role="alert">The passwords don\'t match. Please try again.</div>';
            }
        ?>
        <button name="submit" type="submit" class="btn btn-primary submit-btn">Submit</button>
    </form>
</body>
</html>