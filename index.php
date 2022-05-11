<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Startseite</title>
</head>
<body>
  <?php include "inc/navigation.php";?>
  <h1 class="display-4">News</h1>
  <?php
    require_once "config/dbaccess.php";
    $newsQuery = "select * from news order by added;";
    $newsResult = $con->query($newsQuery);
    while ($news = $newsResult->fetch_assoc()) {
      $addDate = date("d M H:i", strtotime($news["added"]));
      echo '<a href="news.php?id='.$news["id"].'">';
      echo '<div class="card bg-dark text-white">';
      echo '<img class="card-img" src="'.$news["thumbnail"].'" alt="Card image">';
      echo '<div class="card-img-overlay">';
      echo '<h5 class="card-title">'.$news["title"].'</h5>';
      echo '<p class="card-text news-desc">'.$news["des"].'</p>';
      echo '<p class="card-text">'.$addDate.'</p>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
    }
  ?>
</body>
</html>