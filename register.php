<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Register</title>
</head>
<body>
    <?php 
        include "inc/navigation.php";
    ?>
    <h1 class="display-4">Add User</h1>
    <form action="register_action.php" method="post" class="register-form">
        <div class="form-group">
            <label for="anrede">Anrede</label>
            <select class="form-control" id="anrede" name="anrede" required>
                <option value="Herr">Herr</option>
                <option value="Frau">Frau</option>
            </select>
        </div>
        <div class="form-group">
            <label for="vname">Vorname</label>
            <input type="text" class="form-control" id="vname" placeholder="John" name="vname" required>
        </div>
        <div class="form-group">
            <label for="nname">Nachname</label>
            <input type="text" class="form-control" id="nname" placeholder="Doe" name="nname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="johndoe@example.com" name="email" required>
        </div>
        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" class="form-control" id="uname" placeholder="johndoe" name="uname" required>
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" placeholder="••••••••" name="pass" required>
        </div>
        <div class="form-group">
        <label for="User Role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="3">Guest</option>
                <option value="2">Service Technician</option>
                <option value="1">Administrator</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
    </form>
</body>
</html>