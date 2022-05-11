<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php";?>
    <title>Create Ticket</title>
</head>
<body>
    <?php 
        include "inc/navigation.php";
    ?>
    <h1 class="display-4">Create Ticket</h1>
    <form action="ticket_action.php" method="post" class="register-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="News Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <br>    
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" required>
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <textarea class="form-control" id="des" placeholder="Write down the news here..." name="des" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
    </form>
</body>
</html>