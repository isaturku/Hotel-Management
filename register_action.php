<?php
if(isset($_POST["anrede"])){
       require "config/dbaccess.php";
       echo "done";
       $stmt = $con->prepare("INSERT INTO user(anrede,vname,nname,email,uname,pass,userRole,status) VALUES (?,?,?,?,?,?,?,1);");
       $stmt->bind_param("ssssssi",$_POST["anrede"],$_POST["vname"],$_POST["nname"],$_POST["email"],$_POST["uname"],$pass,$_POST["role"]);
       $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
       $stmt->execute();
        header('Location: users.php');
}
?>