<?php
include 'auth.php';
include 'db.php';
$q = "SELECT * FROM `ordered`";
$query = mysqli_query($con, $q);


 

include 'aheader.php';

?>
<section style="padding: 14rem;" class="a">

    <h2>ORDER SUMMARY</h2>
            <table class ="tb"  >
                <tr>
                    <th>SL No</th>
                    <th>order No</th>
                    <th>customer name</th>
                    <th>car name</th>
                    <th>servive name</th>
                    <th>Mail</th>
                    <th>address</th>
                    <th>phone no</th>
                    <!-- <th>Price</th> -->
                </tr>
                   <?php $count = 1;
while ($row = mysqli_fetch_assoc($query)) {?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['oid']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td><?php echo $row['addres']; ?></td>
                            <td><?php echo $row['ph']; ?></td>
                            <!-- <td><?php echo $row['ph']; ?></td> -->
                        </tr>
                    <?php $count++;}?>

            </table>
            </section>
<?php

include 'bfooter.php';
?>



