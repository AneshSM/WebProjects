<?php
session_start();
include 'db.php';

if (isset($_POST['username']) && isset($_POST['passw'])) {
    $username = $_POST['username'];
    $passw = $_POST['passw'];
    $a = 1;

    if (empty($username)) {
        header("Location:signup.php?error=username is required");
        exit();
    } else if (empty($passw)) {
        header("Location:signup.php?error=password is required");
        exit();
    } else if (preg_match("/^.*(?=.{8,}).*$/", $passw) === 0) {
        header("location:signup.php?error=* Password must be atleast 8 characters in length.");
        exit();
    } elseif (preg_match("/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $passw) === 0) {
        header("location:signup.php?error=* Must contain at least one upper case letter,lower case letter and one number.");
        exit();
    } else {

        $hpassw = password_hash($passw, PASSWORD_DEFAULT);
        $q = "SELECT `password` FROM `registered` WHERE `username`='$username'";
        $sql = mysqli_query($con, $q);
        if (mysqli_num_rows($sql) === 1) {
            $row = mysqli_fetch_assoc($sql);
            if (password_verify($passw, $row['password'])) {
                header("Location:login.php?succ=Already signed up");
                exit();
            }
        }
        else {

            $q1 = "INSERT INTO `registered`(`username`, `password`) VALUES ('$username','$hpassw')";
            $q2 = mysqli_query($con, $q1);
            if ($q2) {
                header("Location:login.php?succ=Signed in succefully");
                exit();
            } else {
                header('Location:signup.php?error=ERRoR1');
            }
        }
    }
}
