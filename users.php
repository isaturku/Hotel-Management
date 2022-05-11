<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Users</title>
</head>
<body>
    <?php 
        include "inc/navigation.php";
        if($_COOKIE["userRole"] != 1){
            echo '<div class="alert alert-danger" role="alert">Unfortunately you don\'t have the necessary permissions to use this feature.</div>';
            exit();
        }
    ?>
    <h1 class="display-4">Users</h1>
    <a href="register.php"><button class="btn btn-primary my-2 add-user"><i class="fas fa-plus"></i> Add User</button></a>
    <div class="users">
    <table class="table">
        <thead>
            <tr>
                <td scope="col">First Name</td>
                <td scope="col">Last Name</td>
                <td scope="col">Geschlecht</td>
                <td scope="col">D.O.B</td>
                <td scope="col">SVNR</td>
                <td scope="col">Krankenkasse</td>
                <td scope="col">Strasse</td>
                <td scope="col">Ort</td>
                <td scope="col">PLZ</td>
            </tr>
        </thead>
        <tbody>
            <?php
                require "config/dbaccess.php";
                $userResult = $con->query("SELECT u.id,u.anrede,u.vname,u.nname,u.email,u.uname,ur.roleTitle,u.status FROM user u join userrole ur on u.userRole = ur.id order by u.id;");
                while ($user = $userResult->fetch_assoc()) {
                $status = "";
                $check = "";
                $disable="";
                if($user["status"] == 1){
                    $status = "aktiv";
                    $check = "fa-sign-out-alt";
                }else{
                    $status = "passiv";
                    $check = "fa-sign-in-alt";
                }
                echo '<th scope="row">'.$user["id"].'</td>';
                echo '<td>'.$user["anrede"].'</td>';
                echo '<td>'.$user["vname"].'</td>';
                echo '<td>'.$user["nname"].'</td>';
                echo '<td>'.$user["email"].'</td>';
                echo '<td>'.$user["uname"].'</td>';
                echo '<td>'.$user["roleTitle"].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td><a href="change_pass_admin.php?id='.$user["id"].'"><i class="fas fa-user-edit"></i></a></td>';
                echo '<td><a href="change_status.php?id='.$user["id"].'&status='.$user["status"].'"><i class="fas '.$check.' "></i></a></td>';
                echo '</tr>';
                }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>