<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Login</title>
</head>
<body>
    <?php 
        include "inc/navigation.php";
    ?>
    <h1 class="display-4">Login</h1>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == 1){
                echo '<div class="alert alert-danger" role="alert">Please Fill in both fields.</div>';
            }else if($_GET["error"] == 2){
                echo '<div class="alert alert-danger" role="alert">There is no active user with those credentials.</div>';
            }
        }
    ?>
    <form action="login_action.php" method="post" class="register-form">
        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" class="form-control" id="uname" placeholder="johndoe" name="uname" autocomplete="username">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="uname" placeholder="••••••••" name="pass" autocomplete="current-password">
        </div>
        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
    </form>
</body>
</html>