<?php
    setcookie("vname","",time()-1);
    setcookie("nname","",time()-1);
    setcookie("userRole","",time()-1);
    setcookie("anrede","",time()-1);
    header("Location: index.php");
?>