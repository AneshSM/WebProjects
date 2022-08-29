<?php
include 'auth.php';
include 'db.php';
if (isset($_POST['n']) && isset($_POST['d']) && isset($_POST['p']) && isset($_POST['m']) && isset($_POST['t']) && isset($_POST['y']) && isset($_POST['i'])&& isset($_POST['c']) && isset($_POST['s'])) {
    $q = "INSERT INTO `cars`(`cname`, `cdisc`, `cprice`, `cmodel`, `ctype`, `cyear`, `cimg`,`ccolour`, `cspeed`,`cfuel`) VALUES ('$_POST[n]','$_POST[d]','$_POST[p]','$_POST[m]','$_POST[t]','$_POST[y]','$_POST[i]','$_POST[c]','$_POST[s]','$_POST[f]')";
    if (mysqli_query($con, $q)) {
        header("Location:ac.php?suc=Added succesfully");
    }
}
include 'aheader.php';

?>
<section class="a">
<h2>car details</h2>
    <form action="ac.php" method="POST">
            <div style="padding:0mm; padding-right:unset">
            <table  class ="tb"  >
                <tr>
                    <th>name</th>
                    <th>desc</th>
                    <th>price</th>
                    <th>model</th>
                    <th>type</th>
                    <th>Year</th>
                    <th>Image</th>
                    <th>Colour</th>
                    <th>Speed</th>
                    <th>Fuel</th>
                </tr>
                    <tr>
                        <td><input name="n" type="text"></td>
                        <td><input name="d" type="text"></td>
                        <td><input name="p" type="text"></td>
                        <td><input name="m" type="text"></td>
                        <td><input name="t" type="text"></td>
                        <td><input name="y" type="text"></td>
                        <td><input name="i" type="text"></td>   
                        <td><input name="c" type="text"></td> 
                        <td><input name="s" type="text"></td> 
                        <td><input name="f" type="text"></td> 
                    </tr>
            </table>
            <center><button style="     font-size: 15px;
        background-color:#ffee80;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;padding:1rem" class="add" type="submit">ADD</button></center>
    </form>
    <?php if (isset($_GET['suc'])) {
    echo "<h3>" . $_GET['suc'] . "</h3>";

}?>

</section>
<?php

include 'fixedfooter.php';
?>

