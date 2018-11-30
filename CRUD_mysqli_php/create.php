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

        if(isset($_POST['submit'])) {
          $name =  mysqli_real_escape_string($db->link, $_POST['name']);
          $email = mysqli_real_escape_string($db->link, $_POST['email']);
          $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

          if($name == '' || $email == '' || $skill == '') {
            $error = "Field must not be empty";
          }
          else {
            $query = "insert into tbl_user(name, email, skill) values('$name', '$email', '$skill')";

            $create = $db->insert($query);
          }
        }
      ?>

      <div class="contentsection contemplate clear">
        <div class="maincontent clear">
              
              <?php 
                if(isset($error)) {
                  echo "<span style='color:red'>".$error."</span>";
                }
              ?>

              <form action="create.php" method="post">
                <table class="tblone">
                  <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="Please enter a name:"></td>
                  </tr>

                  <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" placeholder="Please enter a email:"></td>
                  </tr>
                  
                  <tr>
                    <td>Skill</td>
                    <td><input type="text" name="skill" placeholder="Please enter a skill:"></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                        <input type="reset" value="Cancel">
                    </td>
                  </tr>
                </table>
              </form>

              <a href="index.php">Go back</a>
        </div>

      </div>

      <?php
        include 'inc/footer.php';
      ?>
  </body>

</html>
