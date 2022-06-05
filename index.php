<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <title>Home</title>
</head>

<body>

    <h1>Please choose a class</h1>

    <br>

    <?php
    include("connection.php");
    // fetching classes
    $sql = "SELECT  * FROM class ";
    $result = mysqli_query($con,$sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

    <button class='btn btn-primary' type="submit">
        <a style="color:white;text-decoration:none"
            href="class.php?classid=<?php echo $row['class_id'] ?>&classname=<?php echo $row['name'] ?>">
            <!-- displaying classes -->
            <?php echo $row['name'] ?>
        </a>
    </button>
    <?php
            
        };

    };      

    ?>

</body>

</html>
<style>
    body {
        align-items: center;
        text-align: center;
        margin-top: 20vh;
    }
</style>