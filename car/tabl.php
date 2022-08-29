<?php include 'bheader.php';
include 'blsnav.php';
include 'db.php';
if(isset($_GET['cname'])){
    // $_SESSION['cname'] = $_GET['cname'];
    $q = "SELECT * FROM `cars` WHERE  `cname` = '$_GET[cname]'";
$query = mysqli_query($con, $q);
}
?> 
    <section class="a">
    <div >
    <?php while($row=mysqli_fetch_assoc($query)){?>
    <table>
    
        <tr>
            <th class ="i" rowspan="6"><img src="images/<?php echo $row['cimg'] ?>" alt=""></th>
        </tr>
        <!-- <tr><h1><td><?php echo $row['cname']; ?></td></h1></tr> -->
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
    <?php } ?>
    </div>
    <div>
    <center><a  href="login.php?" class="btn">Order</a></center>
    </div>
    <div>
    <center><a  href="bfront.php?" class="btn">Home</a></center>
    </div>
    </section>
<?php
    include 'bfooter.php';
?>