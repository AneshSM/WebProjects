<?php 
include 'lheader.php';
include 'auth.php';
include 'db.php'; 
$U=$_SESSION['username'];
// if(isset($_GET['s'])){$c = $_GET['s'];}else if(isset($_GET['serv'])){$s = $_GET['serv'];}
$q="SELECT `name`, `addres`, `gender`, `place`, `mail`, `ph`, `dob` FROM `ordered` WHERE `username`= '$U'";
$r=mysqli_query($con,$q);
$col=mysqli_fetch_assoc($r);
?>
<br><br><br><br>
<section>
    <form class="f" action="lo.php" name="customer" method="POST" >
        <table class="t" cellpadding="2" width="20%"  cellspacing="2">
            <tr>
                <td colspan="4">
                    <center><font size=4><b>customer</b></font></center>
                </td>
            </tr>

            <tr>
                <td rowspan="1">name</td>
                <td rowspan="1"><input type="text" value="<?php echo $col['name'];?>" name="name"></td>
                <?php if(isset($_GET['s'])){$c = $_GET['s']; ?>
                <td rowspan="1">car</td>
                <td rowspan="1"><input name="cname" type="text" value="<?php echo $c; ?>" name="textnames"></td>
                <?php } ?>
                <?php if(isset($_GET['serv'])){$s = $_GET['serv']; ?>
                <td rowspan="1">service</td>
                <td rowspan="1"><input name="sname" type="text" value="<?php echo $s; ?>" name="textnames"></td>
                <?php } ?>
            </tr>

            <tr>
                <td>address</td>
                <td ><input type="text" name="add" value="<?php echo $col['addres'];?>" id="text"></td>
            
                <td>gender</td>
               
                <td> male <input type="radio" name="g" value="male">
                female <input type="radio" name="g" value="female"></td>
            </tr>
            <tr>
                <td>place</td>
                <td><input type="text" value="<?php echo $col['place'];?>" name="p" id="text"></td>

                <td>mail</td>
                <td><input type="email" value="<?php echo $col['mail'];?>" name="e" id="mail"></td>
            </tr>

            <tr>
                <td>mobile</td>
                <td><input type="number" value="<?php echo $col['ph'];?>" name="ph" id="mobileno"></td>
           
                <td>dob</td>
                <td><input type="date" value="<?php echo $col['dob'];?>" name="dob" id="dob"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="reset"></td>
                <td colspan="2"><input  type="submit" name="s" id="submit"></td>
            </tr>


        </table>
    </form>
    </section>
<section></section><section></section><br>
<section></section><section></section><br>
    <section class="a"></section>
<?php include 'bfooter.php';