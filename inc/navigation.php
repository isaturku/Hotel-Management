<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Hotel Verwaltung</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="impressum.php" class="nav-link">Impressum</a>
          </li>
          <li class="nav-item">
            <a href="hilfe.php" class="nav-link">Hilfe</a>
          </li>
          <?php
            if(isset($_COOKIE["vname"])){
              echo '<li class="nav-item">';
              echo '<a href="tickets.php" class="nav-link">Tickets</a>';
              echo '</li>';
              if($_COOKIE["userRole"] == 1){
                echo '<li class="nav-item">';
                echo '<a href="users.php" class="nav-link">Users</a>';
                echo '</li>';
              }
            }
          ?>
        </ul>
        <?php
        if(!isset($_COOKIE["vname"])){
          echo '<a href="login.php"><button class="btn btn-primary my-2"><i class="fas fa-sign-in-alt"></i> Login</button></a>';
        }else{
          if($_COOKIE["userRole"] == 1){
            echo '<a href="addnews.php"><button class="btn btn-primary my-2"><i class="fas fa-plus"></i> Add News</button></a>';  
          }
          elseif($_COOKIE["userRole"] == 3){
            echo '<a href="create_ticket.php"><button class="btn btn-primary my-2"><i class="fas fa-plus"></i> Create Ticket</button></a>';  
          }
          echo '<a href="logout.php"><button class="btn btn-primary my-2"><i class="fas fa-sign-out-alt"></i> Logout</button></a>';  
        }
        ?>
        </div>
      </div>
</nav>