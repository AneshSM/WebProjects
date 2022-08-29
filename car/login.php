<?php
include 'bheader.php'; 
include 'blnav.php';
?>
<section><section></section></section>
<br>
<section class="hello">
  <div class="s">
    <form action="la.php" method="post">
    <h1>Login page</h1>
    <?php if(isset($_GET['succ'])){ ?>
      <p style="color: green;" class="succ"><?php echo $_GET['succ']; ?></p>
      <?php } ?>
      <label for="">Username</label>
      <input type="text" name="username" />
      <br />
      <br />
      <label for="">Password</label>
      <input type="password" name="passw" />
      <?php if(isset($_GET['error'] )){ ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <br />
      <button type="submit" name="log" value="submit">login</button>
    </form>
    </div>
</section>

<br>
<?php include 'bfooter.php'; ?>



