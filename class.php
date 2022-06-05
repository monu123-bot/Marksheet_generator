<?php
    include("connection.php");
    $classname = $_GET['classname'];
     $classid = $_GET['classid'];
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="class.css">
            <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Page for class <?php echo $classname ?></title>
</head>
<body>
    <div id="main_div" >
   
     <?php
     // query for fetching students of that class
     $sql = "select * from student,stu_class where student.student_id = stu_class.student_id and stu_class.class_id = '$classid' ";
     $result = mysqli_query($con,$sql);
     ?>
      <br>
      <h5> Students Data of class <?php echo $classname ?></h5>
      <br>
     <table id="table"  class="table">
     <thead id="table_head" > 
       <tr>
         <th scope="col">Roll no.</th>
         <th scope="col">Name</th>
         <th scope="col">Father's Name</th>
         <th scope="col">DOB</th>
         <th>Address</th>
      <th>View </th>
    
       </tr>
     </thead>
     <tbody>
         <?php
         
    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {
            ?>
  
    <tr>
      <th scope="row"><?php echo $row['student_id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['fathers_name'] ?></td>
      <td><?php echo $row['dob'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><a href="result.php?classid=<?php echo $classid ?>&rollno=<?php echo $row['student_id']?>&classname=<?php echo $classname ?>">see result</a></td>
      
    </tr>
   
 
         <?php
            
        };
        


    }; 
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>