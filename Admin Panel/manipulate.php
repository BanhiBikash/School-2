<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
//importing connection  
require_once('config.php');

if(isset($_GET['k']) && isset($_GET['id']))
{
    $id=$_GET['id'];
    $k=$_GET['k'];

    if($k=='review'){

        $sql="SELECT `reviewed` FROM `tbl_notice`  WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt=='0')
        {

        $sql="UPDATE `tbl_notice` SET `reviewed`='1' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }

        if($stmt=='1')
        {
        $sql="UPDATE `tbl_notice` SET `reviewed`='0' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }
    }

    else if($k=='urgent')
    {

        $sql="SELECT `urgent` FROM `tbl_notice`  WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt=='0')
        {
        $sql="UPDATE `tbl_notice` SET `urgent`='1' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }

        if($stmt=='1')
        {
        $sql="UPDATE `tbl_notice` SET `urgent`='0' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }
    }

    else if($k=='hide')
    {

        $sql="SELECT `hide` FROM `tbl_notice`  WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt=='0')
        {
        $sql="UPDATE `tbl_notice` SET `hide`='1' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }

        if($stmt=='1')
        {
        $sql="UPDATE `tbl_notice` SET `hide`='0' WHERE  `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
        }
    }

    else if($k=='delete')
    {
        $sql="DELETE FROM `tbl_notice` WHERE `Notice no.`='$id'";
        $stmt=mysqli_query($conn,$sql);

        if($stmt)
        {
            header("location :admin-notice.php");
        }
    }
}

else{
    header("location :login.php");
}
?>