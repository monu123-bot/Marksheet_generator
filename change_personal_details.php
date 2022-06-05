<?php
include("connection.php");


$rollno = $_GET['rollno'];
$key = $_GET['key'];
$classid = $_GET['classid'];
$classname = $_GET['classname'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($key == 'sname'){
        echo "key is sname";
        $sname = $_POST['sname'];
        echo $sname;
        $sql = "update student set name = '$sname' where student_id = '$rollno'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");

    }
    elseif($key == 'fname'){
        echo "key is fname";
        $fname = $_POST['fname'];
        $sql = "update student set fathers_name = '$fname' where student_id = '$rollno'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    }
    elseif($key == 'address'){
        echo "key is address";
        $address = $_POST['address'];
        $sql = "update student set address = '$address' where student_id = '$rollno'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    }
    elseif($key == 'rollno'){
        echo "key is rollno";
        $roll = $_POST['roll'];
        $sql = "update student set name = '$roll' where student_id = '$rollno'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    }
    
    
    elseif($key == 'dob'){
        echo "key is dob";
        $dob = $_POST['dob'];
        $sql = "update student set dob = '$dob' where student_id = '$rollno'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    };

}
echo $rollno;
echo $key;
?>