<!doctype html>
<html>
  <head>
      <link href="style.css" rel="stylesheet">
  </head>

  <body>
      <?php
        include 'inc/header.php';
        include 'config.php';
        include 'Database.php';
      ?>

      <?php
        $db = new Database();
        $query = "select * from tbl_user";

        $read = $db->select($query);
      ?>

      <div class="contentsection contemplate clear">
        <div class="maincontent clear">
              
              <?php 
                if(isset($_GET['msg'])) {
                  echo "<span style='color:green'>".$_GET['msg']."</span>";
                }
              ?>
              <table class="tblone">
                <tr>
                  <th width="10%">Serial</th>
                  <th width="35%">Name</th>
                  <th width="25%">Email</th>
                  <th width="15%">Skill</th>
                  <th width="15%">Action</th>
                </tr>

                <?php if($read) {?>
                  
                  <?php $i = 1; while($row = $read->fetch_assoc()) { ?>
                    <tr>
                      <td><?php echo $i++?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['skill'];?></td>
                      <td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
                    </tr>
                  <?php }?>

                <?php } else {?>
                  <h2>Data isn't available</h2>
                <?php }?>

              </table>
            
              <a href="create.php">Create</a>
        </div>

      </div>

      <?php
        include 'inc/footer.php';
      ?>
  </body>

</html>
