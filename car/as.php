<?php
include 'auth.php';
include 'db.php';

if (isset($_POST['add'])&& isset($_POST['sn']) && isset($_POST['sd']) && isset($_POST['si']) && isset($_POST['sp'])) {
    $sn=$_POST['sn'];
    $sd=$_POST['sd'];
    $si= $_POST['si'];
    $sp=$_POST['sp'];
    $q = "INSERT INTO `services`(`sname`, `sdisc`, `sicon`, `sprice`) VALUES ('$sn','$sd','$si','$sp')";
    if (mysqli_query($con, $q)) {
        header("Location:as.php?suc1=Added succesfully");
    }
} 

include 'aheader.php';
?>
<section class="a">
<h2>service details</h2>
    <form action="as.php" method="POST">
            <table class ="tb">
                <tr>
                    <th>sname</th>
                    <th>desc</th>
                    <th>icon</th>
                    <th>price</th>
                </tr>
                    <tr>
                        <td><input name="sn" type="text"></td>
                        <td><input name="sd" type="text"></td>
                        <td><input name="si" type="text"></td>
                        <td><input name="sp" type="text"></td>
                    </tr>
            </table>
            <button style="     font-size: 15px;
        background-color:#ffee80;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;padding:1rem" class="add" name="add" type="submit">ADD</button>
    </form>
    <?php if (isset($_GET['suc1'])) {
    echo "<h3>" . $_GET['suc1'] . "</h3>";

}?>

</section>

<?php

include 'fixedfooter.php';
?>
