<?php
        include 'db.php';
        include 'auth.php';
        $u=$_SESSION["username"];
    if(isset($_POST['s']) && isset($_POST['cname'])){
        $c= $_POST['cname'];  
        $n= $_POST['name'];
        $a= $_POST['add'];
        $g= $_POST['g'];
        $p= $_POST['p'];
        $e= $_POST['e'];
        $ph= $_POST['ph'];
        $d= $_POST['dob'];
        // UPDATE `ordered` SET `name`='$n',`addres`='$a',`gender`='$g',`place`='$p',`mail`='$e',`ph`='$ph',`dob`='$d',`cname`='$c' WHERE `username`='$u' 
        $q= " CALL `orde`('$u', '$n', '$a', '$g', '$p', '$e', '$ph', '$d', '$c');";
        // $q ="CALL `orde`('$u','$c')";
        if(mysqli_query($con,$q)){
            header("Location:ltabl.php?cname=$c & at=1");
        } 
    }
    if (isset($_POST['s']) && isset($_POST['sname'])) {
        $s =  $_POST['sname'];
        $n= $_POST['name'];
        $a= $_POST['add'];
        $g= $_POST['g'];
        $p= $_POST['p'];
        $e= $_POST['e'];
        $ph= $_POST['ph'];
        $d= $_POST['dob'];
        $q= "UPDATE `ordered` SET `name`='$n',`addres`='$a',`gender`='$g',`place`='$p',`mail`='$e',`ph`='$ph',`dob`='$d',`sname`='$s' WHERE `username`='$u' ";
        // $q ="CALL `orde`('$u','$c')";
        if(mysqli_query($con,$q)){
            header("Location:front.php?sname=$s & at=1");
        }
    }
?>