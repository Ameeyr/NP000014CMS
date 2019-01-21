<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
        require 'common/head.php';
    ?>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
     <header>

    <?php
        require 'common/nav.php';
    ?>
        
    </header>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <main role="main">
    <div class="container marketing">
          <hr class="featurette-divider">
        <!-- START THE FEATURETTES -->

        <div class="row featurette">
          <div class="col-md-6">
            <h1 class="display-4">Container Management System.</h1>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-6">

          <form action="inc/database.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="text" class="form-control" name="from" placeholder="Departure Port" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="to" placeholder="Arrival Port" required>
            </div>
            <div class="form-group">
              
              <select class="form-control" id="exampleFormControlSelect1" name="status" placeholder="Status" required>
                <option>On Route</option>
                <option>Delevered</option>

              </select>
            </div>
            <!-- <div class="form-group">
              <input type="text" class="form-control" name="status" placeholder="Status">
            </div> -->
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1" name="contNo">
                    <?php
                        include 'inc/config.php'; 
                        $sql = mysqli_query($link, "SELECT * FROM container WHERE status='Delevered';");
                        while ($row = $sql->fetch_assoc()){
                            unset($name,$cid,$status);
                            $name = $row['name'];
                            $cid = $row['cid'];
                            $status = $row['status'];
                            //echo "<option value=\"container\">" . $row['cid'] . "</option>";
                            echo '<option name=contNo value="'.$cid.'">'.$name.'</option>';
                        }
                    ?>
                </select>
            </div>

            <button type="submit" value="Submit" name="save" class="btn btn-primary btn-block">Submit</button>
          </form>
          
          </div>
        </div>

        <hr class="featurette-divider">
    </div>

      <!-- FOOTER -->
    <?php
        require 'common/footer.php';
    ?>
</main>


</body>
</html>