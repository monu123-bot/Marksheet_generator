
<?php
$username = "monu";
$password = "";
$server = "localhost";
$database = "marksheet";
$con = mysqli_connect($server,$username,$password,$database);
if(!$con){
    echo "connection unsuccessful";
}

?>