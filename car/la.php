<?php
session_start();
include 'db.php';
if (isset($_POST['username']) && isset($_POST['passw'])) {

    $username = $_POST['username'];
    $passw = $_POST['passw'];

    // $pattern = preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $passw);

    if (empty($username)) {
        header("Location:login.php?error=username is required");
        exit();
    } else if (empty($passw)) {
        header("Location:login.php?error=password is required");
        exit();
    } else if (preg_match("/^.*(?=.{8,}).*$/", $passw) === 0) {
        header("location:login.php?error=* Password must be atleast 8 characters in length.");
        exit();
    } elseif (preg_match("/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $passw) === 0) {
        header("location:login.php?error=* Must contain at least one upper case letter,lower case letter and one number.");
        exit();
    } else {
        $q = "SELECT `password`,`admin` FROM `registered` WHERE `username`='$username'";
        $sql = mysqli_query($con, $q);
        if (mysqli_num_rows($sql) === 1) {
            $row = mysqli_fetch_assoc($sql);
            if (password_verify($passw, $row['password'])) {
                if ($row['admin'] == "y") {
                    $_SESSION['username'] = $username;
                    $_SESSION['admin'] = 'y';
                    header('Location:admin.php');
                    exit();
                } else {
                    $_SESSION['username'] = $username;
                    header('Location:front.php');
                    exit();
                }
            } else {
                header("Location:login.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location:login.php?error=Incorrect username or password 1");
        }
    }
}
if (isset($_POST['name']) && isset($_POST['stars']) && isset($_POST['msg'])) {

    $name = $_POST['name'];
    $str = $_POST['stars'];
    $msg = $_POST['msg'];

    if (empty($name)) {
        header("Location:front.php?error=name is required");
        exit();
    } else if (empty($str)) {
        header("Location:front.php?error=rating is required");
        exit();
    } else if (preg_match("/^.*(?=.*[1-5]).*$/", $str) === 0) {
        header("location:front.php?error=rating must be out of 5.");
        exit();
    }
    //elseif (preg_match("/^.*(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $passw) === 0) {
    //     header("location:login.php?error=* Must contain at least one upper case letter,lower case letter and one number.");
    //     exit();
    // }
    else {
        $q = "UPDATE `reviews` SET `name`='$name',`star`='$str',`msg`='$msg' WHERE `username`='$_SESSION[username]'";
        if ($sql = mysqli_query($con, $q)) {
            header("location:front.php?succ=Review is added.");
        }

    }
}
// INSERT INTO `reviews`(`username`,`name`, `msg`, `star`) VALUES ('$name','$str','$msg','$_SESSION[username]
