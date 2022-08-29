<?php
include 'auth.php';
include 'db.php';
$q = "SELECT*FROM `cars`";
$query = mysqli_query($con, $q);

include 'aheader.php';
?>
<section class="a">
    <h2>CAR DETAILS CURRENTLY AVAILABLE IN DATABASE</h2>
            <table class ="tb"  >
                <tr>
                    <th>Serial No</th>
                    <th>name</th>
                    <th>desc</th>
                    <th>price</th>
                    <th>model</th>
                    <th>type</th>
                    <th>year</th>
                    <th>image</th>
                    <th>colour</th>
                    <th>speed</th>
                    <th>fuel</th>
                </tr>
                   <?php $count=1;
                    while($row=mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['cdisc']; ?></td>
                            <td><?php echo $row['cprice']; ?></td>
                            <td><?php echo $row['cmodel']; ?></td>
                            <td><?php echo $row['ctype']; ?></td>
                            <td><?php echo $row['cyear']; ?></td>
                            <td><?php echo $row['cimg']; ?></td>
                            <td><?php echo $row['ccolour']; ?></td>
                            <td><?php echo $row['cspeed']; ?>Kmpl</td>
                            <td><?php echo $row['cfuel']; ?></td>

                            
                        </tr>
                    <?php $count++; } ?>

            </table>
            </section>
<?php

include 'bfooter.php';
?>

