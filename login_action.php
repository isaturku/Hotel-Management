<?php
    if(!isset($_POST["uname"]) || !isset($_POST["pass"])){
        header("Location:login.php?error=1");
    }
    else{
        require "config/dbaccess.php";
        $sql = "select * from user where uname = ?";
        $stmt = $con-> prepare($sql);
        $stmt-> bind_param("s",$_POST["uname"]);
        $stmt-> execute();
        $user = $stmt->get_result();
        $rows = $user->num_rows;
        $user = $user->fetch_assoc();
        $pass = $user["pass"];
        $status = $user["status"];
        if($rows == 1 && password_verify($_POST["pass"],$pass) && $status == 1){
            setcookie("vname",$user["vname"],time()+86400*7);
            setcookie("nname",$user["nname"],time()+86400*7);
            setcookie("anrede",$user["anrede"],time()+86400*7);
            setcookie("userRole",$user["userRole"],time()+86400*7);
            setcookie("uid",$user["id"],time()+86400*7);
            header("Location: index.php");
        }else{
            header("Location:login.php?error=2");
        }
    }
?>