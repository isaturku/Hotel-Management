<?php
    require "config/dbaccess.php";
    $newStatus = 0;
    if($_GET["status"] == 0)
        $newStatus = 1;
    $stmt = $con->prepare("UPDATE user SET status = ? WHERE id = ?");
    $stmt->bind_param("ii",$newStatus,$_GET["id"]);
    $stmt->execute();
    $stmt->close();
    $con->close();
    header("Location: users.php");
?>