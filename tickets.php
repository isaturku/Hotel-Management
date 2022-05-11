<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "config/styles.php" ?>
    <title>Tickets</title>
</head>
<body>
    <?php include "inc/navigation.php" ?>
    <h1 class="display-4">Tickets</h1>
    <div class="list-group">
        <?php
            require "config/dbaccess.php";
            $sql = "";
            if($_COOKIE["userRole"] == 3){
                $sql = "SELECT t.id,t.title,t.des,t.status,t.added,u.anrede,u.vname,u.nname,t.uid,t.thumbnail,ts.statusTitle from ticket t join user u on t.uid=u.id join ticketstatus ts on ts.id = t.status where t.uid =".$_COOKIE["uid"].";";
            }else{
                $sql = "SELECT t.id,t.title,t.des,t.status,t.added,u.anrede,u.vname,u.nname,t.uid,t.thumbnail,ts.statusTitle from ticket t join user u on t.uid=u.id join ticketstatus ts on ts.id = t.status";
            }
            $ticketResult = $con->query($sql);
            while($ticket = $ticketResult->fetch_assoc()){
                $addDate = date("d M H:i", strtotime($ticket["added"]));
                $statusClass = "";
                $option1 = "";
                $option2 = "";
                $option3 = "";
                switch ($ticket["status"]){
                    case "1":
                        $statusClass = "list-group-item-warning";
                        $option1 = "selected";
                        break;
                    case "2":
                        $statusClass = "list-group-item-success";
                        $option2 = "selected";
                        break;
                    case "3":
                        $statusClass = "list-group-item-danger";
                        $option3 = "selected";
                        break;
                }
                echo '<div class="list-group-item list-group-item-action d-flex align-items-middle ticket '.$statusClass.'">';
                echo '<div class="ticket-img">';
                echo '<img src="'.$ticket["thumbnail"].'" alt="ticket">';
                echo '</div>';
                echo '<div class="flex-column ticket-details ">';
                echo '<div class="d-flex w-100 justify-content-between">';
                echo '<h5 class="mb-1">'.$ticket["title"].'</h5>';
                echo '<small>'.$addDate.'</small>';
                echo '</div>';
                echo '<p class="mb-1 ticket-desc ">'.$ticket["des"].'</p>';
                echo '<div class="d-flex w-100 justify-content-between add-info">';
                if($_COOKIE["userRole"] != 3){
                echo '<small>By '.$ticket["anrede"].' '.$ticket["vname"].' '.$ticket["nname"].'</small>';
                echo '<form class="status-change" method="post" action="status_action.php?id='.$ticket["id"].'">
                <div class="form-group" >
                    <select name="status" id="status">
                        <option value="1" '.$option1.'>Offen</option>
                        <option value="2" '.$option2.'>Erfolgreich Geschlossen</option>
                        <option value="3" '.$option3.'>Erfolglos Geschlossen</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary submit-btn">Change Status</button>
                </form>';
                }
                else{
                    echo '<small>'.$ticket["statusTitle"].'</small>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>