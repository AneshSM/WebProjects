<?php include 'lheader.php';
include 'db.php';
include 'auth.php';
if(isset($_GET['at'])=='1'){?>
    <script>alert("Ordered Succesfully")</script>
<?php }
if(isset($_GET['cname'])){
    // $_SESSION['cname'] = $_GET['cname'];
    $q = "SELECT * FROM `cars` WHERE  `cname` = '$_GET[cname]'";
    $query = mysqli_query($con, $q);}
?> 
    <section class="a">
    <div >
        <?php 
            $q ="SELECT `admin` FROM `registered` WHERE `username`= '".$_SESSION['username']."'";
            $q1=mysqli_query($con,$q);
            $ro=mysqli_fetch_assoc($q1); 
            while($row=mysqli_fetch_assoc($query)){
        ?>
        <table>
            <th><h1><?php echo $row['cname']; ?></h1></th>
        </table>
    <table>
    
        <tr>
            <th class ="i" rowspan="6"><img src="images/<?php echo $row['cimg'] ?>" alt=""></th>
        </tr>
        <!-- <tr><h1><td></td></h1></tr> -->
        <tr>
            <th width="30%">   ECONOMY   </th>
            <th width="30%">   PERFORMANCE   </th>
           
        </tr>
        <tr>
            <td ><?php echo $row['cfuel']; ?></td>
            <td><?php echo $row['cspeed']; ?>Kmpl</td>
        <tr>
            <td><?php echo $row['ctype']; ?></td>
            <td><?php echo $row['ccolour']; ?></td>
        </tr>
      <tr></tr>
      <tr></tr>
      <tr></tr>

      
    </table>
    <table>
    <tr><td class="i" width="100%" rowspan="6"><?php echo $row['cdisc']; ?></td></tr>
    </table>
    
    </div>
    <div>
    <?php if($ro['admin']=='n'){ ?>
    <center><a  href="cus.php?s=<?php echo $row['cname']; ?>" class="btn">Order</a></center>
    <?php } ?>
    </div>
    <div>
    <?php } ?>
    <center><a  href="front.php" class="btn">Home</a></center>
    </div>
    </section>
<?php
    include 'bfooter.php';


?>