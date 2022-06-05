<?php
include("connection.php");


$rollno = $_GET['rollno'];
$key = $_GET['key'];
$classid = $_GET['classid'];
$classname = $_GET['classname'];
$marksid = $_GET['marksid'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($key == 'pre_test'){
        echo "key is pre_test";
        $pre_test = $_POST['pre_test'];
        echo $pre_test;
        $sql = "update marks set pre_test = '$pre_test' where marks_id = '$marksid'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");

    }
    elseif($key == 'note_book'){
        echo "key is note_book";
        $note_book = $_POST['note_book'];
        $sql = "update marks set note_book = '$note_book' where marks_id = '$marksid'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    }
    elseif($key == 'subj_int'){
        echo "key is subj_int";
        $subj_int = $_POST['subj_int'];
        $sql = "update marks set subj_int = '$subj_int' where marks_id = '$marksid'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    }
    elseif($key == 'half_yearly'){
        echo "key is half_yearly";
        $half_yearly = $_POST['half_yearly'];
        $sql = "update marks set half_yearly = '$half_yearly' where marks_id = '$marksid'";
        $result = mysqli_query($con,$sql);
        header("Location: result.php?classid=$classid&rollno=$rollno&classname=$classname");
    };
    
    
  

}
echo $rollno;
echo $key;
?>