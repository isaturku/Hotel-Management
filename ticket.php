<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $error = false;
        $title="Error";
        $thumbnail = "";
        $des = "";
        $added = "";
        if(!isset($_GET["id"])){
            $error = true;
        }
        else{
            require "config/dbaccess.php";
            $newsQuery = $con->prepare("select * from news where id = ?;");
            $newsQuery -> bind_param("i",$_GET["id"]);
            $newsQuery -> execute();
            $newsResult = $newsQuery->get_result();
            $news = $newsResult->fetch_assoc();
            $title = $news["title"];
            $thumbnail = $news["thumbnail"];
            $des = $news["des"];
            $added = $news["added"];
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title><?= $title?></title>
</head>
<body>
    <?php
    include "inc/navigation.php";
        if($error){
            echo '<div class="alert alert-danger" role="alert">Something went wrong! Please try again.</div>';
        }
        else{
            echo '<div class="news-img"><img class="news-thumbnail" src="'.$thumbnail.'" alt="'.$title.'"></div>';
            echo '<div class="des"><h1 class="display-4">'.$title.'</h1><p>'.$des.'</p></div>';
        }
    ?>
</body>
</html>