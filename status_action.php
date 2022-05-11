<?php
    require "config/dbaccess.php";
    $stmt = $con->prepare("UPDATE ticket SET status= ? where id = ?");
    $stmt->bind_param("ii",$_POST["status"],$_GET["id"]);
    echo $_POST["status"];
    $stmt->execute();
    $stmt->close();
    header("Location: tickets.php");
?>