<?php
include 'bheader.php'; 
include 'bsnav.php';
?>
<section><section></section></section>
<br><section class="hello">
  <div class="s">
    <form action="sa.php" method="post">
      <h1>Sign UP</h1>
      <?php if (isset($_GET['succ'])) {?>
      <p style="color: green;" class="succ"><?php echo $_GET['succ']; ?></p>
      <?php }?>
      <label for="">Username</label>
      <input type="text" name="username" />
      <br />
      <br />
      <label for="">Password</label>
      <input type="password" name="passw" />
      <?php if (isset($_GET['error'])) {?>
      <p class="error"><?php echo $_GET['error']; ?></p>
      <?php }?>
      <br />
      <button type="submit" value="submit">Sign UP</button>
    </form>
  </div>
</section>
<br>
<?php include 'bfooter.php'; ?>



<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="sa.php" method="post">
      <h1>Sign UP</h1>
      <?php if (isset($_GET['succ'])) {?>
      <p style="color: green;" class="succ"><?php echo $_GET['succ']; ?></p>
      <?php }?>
      <label for="">Username</label>
      <input type="text" name="username" />
      <br />
      <br />
      <label for="">Password</label>
      <input type="password" name="passw" />
      <?php if (isset($_GET['error'])) {?>
      <p style="color: tomato;" class="error"><?php echo $_GET['error']; ?></p>
      <?php }?>
      <br />
      <button type="submit" value="submit">Sign UP</button>
      <p>Have an account? <a href="login.php">Login</a></p>
    </form>
  </body>
</html> -->
