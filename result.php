<?php 
      include("connection.php");

      //getting classid, rollno and classname  
      $classid = $_GET['classid'];
      $rollno = $_GET['rollno'];
      $classname = $_GET['classname'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="result.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

  <title> Result for class
    <?php echo $classname ?> and Roll no.
    <?php echo $rollno ?>
  </title>
</head>

<body>

  <br>
  <br>


  <div id="maindiv">
    <br>
    <h1 id="school_name">Amardeep Public School</h1>
    <p id="school_address"><b>Mathura Nagar Firozabad </b></p>
    <br>

    <h4 id="academic_performance_text">Academic performance</h4>
    <br>
    <!-- this div contains personal information of student -->
    <div id="personal_information" class="d-flex justify-content-around">
      <?php 
         $sql = "select * from student where student_id = '$rollno' ";
         $result = mysqli_query($con,$sql);
         if ($result->num_rows > 0) { 
          $row = $result->fetch_assoc()
           ?>

      <div id="personal_information_left">
        <form
          action="change_personal_details.php?rollno=<?php echo $rollno ?>&key=sname&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>"
          method="post">
          <div> <label> <b>Student's Name:</b> </label> <input class="input_academic" type="text" name="sname"
              id="snametext" placeholder="<?php echo $row['name'] ?>"></div>
          <button id="snamebtn" class="change_btn" type="submit">+</button>
        </form>

        <form
          action="change_personal_details.php?rollno=<?php echo $rollno ?>&key=address&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>"
          method="post">
          <div> <label> <b>Address: </b> </label> <input class="input_academic" type="text" name="address" id=""
              placeholder="<?php echo $row['address'] ?>"></div>
          <button class="change_btn" type="submit">+</button>
        </form>
        <div> <label> <b>Roll No.</b> </label> <input class="input_academic" type="number" name="roll" id=""
            placeholder="<?php echo $row['student_id'] ?>"></div>

      </div>

      <div id="personal_information_right">

        <form
          action="change_personal_details.php?rollno=<?php echo $rollno ?>&key=fname&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>"
          method="post">
          <div> <label> <b>Father's Name:</b> </label> <input class="input_academic" type="text" name="fname" id=""
              placeholder="<?php echo $row['fathers_name'] ?>"></div>
          <button class="change_btn" type="submit">+</button>
        </form>


        <form
          action="change_personal_details.php?rollno=<?php echo $rollno ?>&key=dob&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>"
          method="post">
          <div> <label> <b>D.O.B.:</b> </label> <input class="input_academic" type="text" name="dob" id=""
              placeholder="<?php echo $row['dob'] ?>"></div>
          <button class="change_btn" type="submit">+</button>
        </form>
        <div> <label> <b> Class:</b></label> <input class="input_academic" type="number" name="class" id=""
            placeholder="<?php echo $classname ?>"></div>



      </div>


      <?php  } 
       ?>



    </div>
    <br>
    <!-- this div contains marks of student -->
    <div id="marks_table_div">
      <table id="marks_table" class="table">
        <thead>
          <tr id="marks_table_tr">
            <th scope="col" class="table_col">Subjects</th>
            <th scope="col" class="table_col">PER. TEST (10)</th>
            <th scope="col" class="table_col">NOTE BOOK (5)</th>
            <th scope="col" class="table_col">SUBJECT ENR. (5)</th>
            <th scope="col" class="table_col">HALF YEARLY (80)</th>
            <th scope="col" class="table_col">MARKS OBT. (100)</th>
            <th scope="col" class="table_col">GRADE</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              //query for fetching subjectwise marks of student 
              $sql1 = "select * from stu_marks_sub sms,marks m,subject s where m.marks_id = sms.marks_id and s.subject_id = sms.subject_id and sms.student_id = '$rollno'";
              $result1 = mysqli_query($con,$sql1);
              
              if ($result1->num_rows > 0) {
                // output data of each row
        
                while($row1 = $result1->fetch_assoc()) {
                    // calculating sum of all marks for column marks obtained out of 100 
                    $sum = $row1['pre_test'] + $row1['note_book'] + $row1['subj_int'] + $row1['half_yearly'];

                    //<!-- finging grade -->
                    $grade = '';

                    if ($sum>91){
                      $grade = 'A1';
                    }
                    elseif($sum > 81 && $sum <= 90){
                      $grade = 'A2';
                    }
                    elseif($sum > 71 && $sum <= 80){
                      $grade = 'B1';
                    }
                    elseif($sum > 61 && $sum <= 70){
                      $grade = 'B2';
                    }
                    elseif($sum > 51 && $sum <= 60){
                      $grade = 'C1';
                    }
                    elseif($sum > 41 && $sum <= 50){
                      $grade = 'C2';
                    }
                    elseif($sum > 33 && $sum <= 40){
                      $grade = 'D';
                    }
                    else{
                      $grade = 'E';
                    }
                    ?>

          <tr>
            <!-- block displaying subject -->
            <th class="marks_row" scope="row">
              <?php echo $row1['name'] ?>
            </th>
            <form
              action="change_marks_details.php?rollno=<?php echo $rollno ?>&key=pre_test&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>&marksid=<?php echo $row1['marks_id']?>"
              method="post">
              <!-- block displaying marks in pre_test -->
              <td class="marks_block"><input class="input_marks" type="number" name="pre_test" id=""
                  placeholder="<?php echo $row1['pre_test'] ?> "> <button class="change_btn" type="submit">+</button>
              </td>

            </form>
            <form
              action="change_marks_details.php?rollno=<?php echo $rollno ?>&key=note_book&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>&marksid=<?php echo $row1['marks_id']?>"
              method="post">

              <!-- block displaying marks in note_book -->
              <td class="marks_block"><input class="input_marks" type="number" name="note_book" id=""
                  placeholder="<?php echo $row1['note_book'] ?> "><button class="change_btn" type="submit">+</button>
              </td>

            </form>
            <form
              action="change_marks_details.php?rollno=<?php echo $rollno ?>&key=subj_int&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>&marksid=<?php echo $row1['marks_id']?>"
              method="post">
              <!-- block displaying internal marks -->
              <td class="marks_block"><input class="input_marks" type="number" name="subj_int" id=""
                  placeholder="<?php echo $row1['subj_int'] ?> "><button class="change_btn" type="submit">+</button>
              </td>

            </form>
            <form
              action="change_marks_details.php?rollno=<?php echo $rollno ?>&key=half_yearly&classid=<?php echo $classid ?>&classname=<?php echo $classname ?>&marksid=<?php echo $row1['marks_id']?>"
              method="post">

              <!-- block displaying half yearly marks -->
              <td class="marks_block"><input class="input_marks" type="number" name="half_yearly" id=""
                  placeholder="<?php echo $row1['half_yearly'] ?> "> <button class="change_btn" type="submit">+</button>
              </td>

            </form>
            <!-- block displaying total marks in this subject -->
            <td class="marks_block"><input class="input_marks" type="number" name="" id=""
                placeholder="<?php echo $sum ?> "> </td>
            <!-- block displaying grade in this subject -->
            <td class="marks_block"><input class="input_marks" type="number" name="" id=""
                placeholder="<?php echo $grade ?> "> </td>
          </tr>


          <?php 
                };
              }
              else{
                echo "No subject allotted  ";
              };
              ?>


        </tbody>
      </table>
    </div>
    <br>
    <div id="extra_text1">
      <p>Class Teacher's remarks :.............................</p>
      <small>Promoted to Class : Mass Promotion due to COVID-19</small>
    </div>
    <br>
    <br>

    <div id="extra_text2" class="d-flex justify-content-between">
      <div style="font-size: 0.8rem;"> <small>Place & Date </small> </div>
      <div style="font-size: 0.8rem;"> <small>Signature of Class Teacher</small> </div>
      <div style="font-size: 0.8rem;"> <small>Signature of Principal</small> </div>
    </div>
    <br>
    <hr>
    <div id="instruction_div">

      <h5 style="color: #004080;">Instruction</h5>
      <small>Grading scale for scholastic areas: Grades are awarded on a 8- point grading scale as follows-</small>
      <table id="instruction_table" class="table">
        <thead>
          <tr id="instruction_table_tr">
            <th class="table_col" scope="col">Marks Range</th>
            <th class="table_col" scope="col">Grade</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="marks_row" scope="row">91-100</th>
            <td class="marks_block">A1</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">81-90</th>
            <td class="marks_block">A2</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">71-80</th>
            <td class="marks_block">B1</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">61-70</th>
            <td class="marks_block">B2</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">51-60</th>
            <td class="marks_block">C1</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">41-50</th>
            <td class="marks_block">C2</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row">33-40</th>
            <td class="marks_block">D</td>


          </tr>
          <tr>
            <th class="marks_row" scope="row"> 0-33 </th>
            <td class="marks_block">E <small>(Needs improvement)</small></td>


          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <br>

  </div>

  <br>
  <br>

</body>

</html>