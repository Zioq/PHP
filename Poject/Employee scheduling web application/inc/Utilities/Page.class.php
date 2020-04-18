<?php

class Page
{

  public static $_title = "Please set this Title";
  public static  $errors = " ";
  public static $suc = " ";
  static function header()
  { ?>

    <!doctype html>
    <html lang="en">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="css/page.css">
      <title><?php echo self::$_title; ?></title>
    </head>

    <body>


    <?php }

  static function footer()
  { ?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>

    </html>
  <?php }

  static function notify($msg)
  {
  ?>
    <div class="alert alert-warning alert-dismissible text-center fade show fixed-top" role="alert">
      <?= $msg ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php }

  public static function signUp()
  { ?>
    <br>
    <br>
    <br>
    <form class="container w-50" action="" method="POST">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Admin ID</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="adminId">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Password</label>
        <div class="col-sm-6">
          <input required class="form-control" type="password" name="password">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Confirm password</label>
        <div class="col-sm-6">
          <input required class="form-control" type="password" name="confirmedPassword">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">First Name</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="firstName">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Last Name</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="lastName">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Email</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="email">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="phone">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 col-form-label">Company Name</label>
        <div class="col-sm-6">
          <input required class="form-control" type="text" name="companyName">
        </div>
      </div>
      <div class="form-group row">
        <div class="g-recaptcha" data-sitekey="6LfQ9ugUAAAAAPQALMpHj7qNCvNkpSSlrZKwHMVC"></div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit" name="action" value="createAdmin">Sign Up</button>

      </div>
    </form>

  <?php }


  static function showLogin()
  { ?>
    <div class="container text-center w-25">
      <H3>Please sign in </h3>
      <form method="POST" ACTION="">
        <div class="form-group">
          <label for="exampleInputUserName">User Name</label>
          <input type="text" class="form-control" name="username" placeholder="UserId">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <input class="btn btn-primary" type="submit" value="login">
        <a href="signup.php" class="btn btn-primary">Sign Up</a>
        <input type="hidden" name="action" value="login">

      </form>
    </div>
  <?php }


  static function showAdminInfo($admin)
  { ?>
    <div class="container text-center">
      <p>Welcome, <?= $admin->AdminUserId ?>!</p>
      <table class="table">
        <tr>
          <td>First name:</td>
          <td><?= $admin->FirstName ?></td>
        </tr>
        <tr>
          <td>Last name:</td>
          <td><?= $admin->LastName ?></td>
        </tr>
        <tr>
          <td>Phone:</td>
          <td><?= $admin->Phone ?></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><?= $admin->Email ?></td>
        </tr>
        <tr>
          <td>Company:</td>
          <td><?= $admin->CompanyName ?></td>
        </tr>
      </table>
      <a href="updateAdmin.php" class="btn btn-primary">Update Admin Info</a>
      <a href="assignschedule.php" class="btn btn-primary">Assign a Schedule</a>
      <a href="loggedout.php" class="btn btn-primary">Log out</a>
    </div>

  <?php }



  static function updateAdmin($admin)
  { ?>
    <div class="container w-50 mb-3">
      <p class="text-center">Leave all password fields blank if you are not changing it.</p>
      <form action="" method="POST">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Old password</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="oldPassword">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">New password</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="newPassword">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Confirm new password</label>
          <div class="col-sm-6">
            <input class="form-control" type="password" name="confirmedPassword">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">First Name</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="firstName" value="<?= $admin->FirstName ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Last Name</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="lastName" value="<?= $admin->LastName ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Email</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="email" value="<?= $admin->Email ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Phone</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="phone" value="<?= $admin->Phone ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-6 col-form-label">Company Name</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="companyName" value="<?= $admin->CompanyName ?>">
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-primary" type="submit" name="action" value="updateAdmin">Update</button>
          <!-- <a href="pro.corona.php" class="btn btn-primary">Home</a> -->
        </div>
      </form>
    </div>
  <?php }

  static function createJob()
  { ?>
    <div class="container my-5">
      <form class="form-inline justify-content-center" method="POST">
        <div class="form-group">
          <label>New job title:</label>
        </div>
        <div class="form-group mx-3">
          <input type="text" name="jobTitle">
        </div>
        <button class="btn btn-primary" type="submit" name="action" value="createJob">Create</button>
      </form>
    </div>
  <?php }

  static function listJobs($jobs)
  {
    echo '<div class="container w-50 text-center">
                  <table class="table">
                  <th colspan="2">Jobs created by me</th>';

    foreach ($jobs as $job) {
      echo '<tr>';
      echo '<td>' . $job->JobTitleName . '</td>';
      echo '<td><a href="?action=deleteJob&id=' . $job->JobTitleId . '">Delete</a></td>';
      echo '</tr>';
    }
    echo '</table></div>';
  }

  public static function assign($jobs, $shifts)
  { ?>
    <div class="container w-50 my-5">
      <form action="" method="POST">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Date</label>
          <div class="col-sm-9">
            <input class="form-control" type="date" name="date">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Shift</label>
          <div class="col-sm-9">
            <select class="form-control" name="shift">
              <?php foreach ($shifts as $shift) {
                echo '<option value="' . $shift->ShiftTimeId . '">' . $shift->ShiftOfWork . '</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Job</label>
          <div class="col-sm-9">
            <select class="form-control" name="job">
              <?php foreach ($jobs as $job) {
                echo '<option value="' . $job->JobTitleId . '">' . $job->JobTitleName . '</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-primary" type="submit" name="action" value="listEmployees">List available employees</button>
        </div>
      </form>
    </div>
  <?php }

  public static function listAvailableEmployees($employees)
  { ?>
    <div class="container w-75 my-3">
      <form method="POST">
        <table class="table">
          <tr>
            <td>*</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
          </tr>
          <?php
          foreach ($employees as $e) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="' . $e->EmployeeUserId . '" value="checked"</td>';
            echo '<td>' . $e->FirstName . '</td>';
            echo '<td>' . $e->LastName . '</td>';
            echo '<td>' . $e->Email . '</td>';
            echo '<td>' . $e->Phone . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
        <div class="text-center">
          <button class="btn btn-primary" name="action" value="assign">Confirm</button>
        </div>
      </form>
    </div>
  <?php }

  static function AddEmployee($jobTitle, $shiftTime, $days)
  {

  ?>
    <div class=employeeBody>
      <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="employeeForm">


          <div class="input-group-prepend">
            <label class="input-group-text" for="firtsName"> First Name</label>
            <input class="form-control" required type="text" value="" name="firstName">
          </div>
          <br>


          <div class="input-group-prepend">
            <label class="input-group-text" for="lastName"> Last Name</label>

            <input class="form-control" class="form-control" required type="text" value="" name="lastName">
          </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="userId"> User ID</label>

            <input class="form-control" required type="text" value="" name="userId">

          </div>
          <div style="color:rgb(242, 97, 97)" class="error"><?php echo self::$errors; ?> </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="password">password</label>

            <input class="form-control" required type="password" value="" name="password">
          </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="Phone">Phone</label>

            <input class="form-control" required type="number" value="" name="phone">
          </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="email">Email</label>

            <input class="form-control" required type="email" value="" name="email">
          </div>
          <br>
        </div>
        <table class="availTable">
          <tr>
            <th> Availability</th>
            <th> Morning</th>
            <th> Evening </th>
            <th> Night</th>

          </tr>

          <?php
          for ($a = 0; $a < count($days); $a++) {
            echo "<tr><td>" . $days[$a]->getDateOfWork();

            for ($s = 0; $s < count($shiftTime); $s++) {

              echo "<td>  <input type='checkbox' name=" . $days[$a]->getDayId() . "[]" . " value=" . $shiftTime[$s]->getShiftTimeId() . "> </td>";

              # code...
            }

            echo "</td></tr>";
          }






          ?>
        </table>
        <br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="JobTitle">Job Title</label>
          </div>
          <select class="se" name="JobTitle">

            <?php

            for ($i = 0; $i < count($jobTitle); $i++) {

              echo "<option value=" . $jobTitle[$i]->getJobTitleId() . ">" . $jobTitle[$i]->getJobTitleName() . "</option>";
            }
            ?>
          </select>
        </div>
        <br>



        <div style="color:rgb(61, 242, 154)" class="suc"><?php echo self::$suc; ?> </div> <br>


        <input class="btn btn-success" type="submit" value="Create">
        <input type="hidden" name="action" value="add">


      </form>
    </div>
  <?php


  }

  static function showOrganization($employee)
  {
    usort($employee, 'self::jobTilteCompare');



  ?>
    <div class="container my-5">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th> User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Job Title</th>

            <th> Delete</th>
            <th>Edit</th>


          </tr>
        </thead>

        <?php


        //var_dump($keys);

        for ($s = 0; $s < count($employee); $s++) {
          echo '<tr>';
          echo '<td>';
          echo $employee[$s]->getFirstName();
          echo '</td>';
          echo '<td>';
          echo $employee[$s]->getLastName();
          echo '</td>';
          echo '<td>';
          echo $employee[$s]->getEmployeeUserId();
          echo '</td>';
          echo '<td>';
          echo $employee[$s]->getEmail();
          echo '</td>';
          echo '<td>';
          echo $employee[$s]->getPhone();
          echo '</td>';
          echo '<td>';
          echo $employee[$s]->getJobTitleName();
          echo '</td>';
          echo ' <td><a href="?action=delete&id=' . $employee[$s]->getEmployeeUserId() . '">Delete</a></td>';
          echo ' <td><a href="?action=edit&id=' . $employee[$s]->getEmployeeUserId() . '">Edit</a></td>';

          echo '</tr>';

          # code...
        }
        ?>

      </table>
    </div>
  <?php    }

  static function jobTilteCompare($x, $y)
  {

    if ($x->getJobTitleId() < $y->getJobTitleId()) {
      return -1;
    } elseif ($x->getJobTitleId() > $y->getJobTitleId()) {
      return 1;
    } else {
      return 0;
    }
  }

  static function EditEmployeeForm($jobTitle, $shiftTime, $days, $employee, $empAvilability)
  {

  ?>

    <div class="employeeBody">
      <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"];  ?>">
        <div class="employeeForm">

          <div class="input-group-prepend">
            <label class="text-monospace" style="font-size:22px"><?php echo "UserId:" . $employee->getEmployeeUserId(); ?></label>
          </div>
          <br>

          <div class="input-group-prepend">
            <label class="input-group-text" for="firtsName"> First Name</label>
            <input type="text" value="<?php echo $employee->getFirstName(); ?>" name="EditfirstName">
          </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="lastName"> Last Name</label>
            <input class="form-control" required type="text" value="<?php echo $employee->getLastName(); ?>" name="EditlastName">
          </div>
          <br>
          <input class="form-control" required type="text" hidden value="<?php echo $employee->getEmployeeUserId(); ?>" name="EdituserId">

          <div class="input-group-prepend">
            <label class="input-group-text" for="Phone">Phone</label>

            <input class="form-control" required type="number" value="<?php echo  (int) $employee->getPhone() ?>" name="Editphone">
          </div>
          <br>
          <div class="input-group-prepend">
            <label class="input-group-text" for="email">Email</label>
            <input class="form-control" required type="email" value="<?php echo $employee->getEmail(); ?>" name="Editemail">
          </div>
          <br>

        </div>
        <table class="availTable">
          <tr>
            </th> Availability</th>
            </th> Morning</th>
            </th> Evening </th>
            </th> Night</th>

          </tr>

          <?php
          for ($a = 0; $a < count($days); $a++) {
            echo "<tr><td>" . $days[$a]->getDateOfWork();

            for ($s = 0; $s < count($shiftTime); $s++) {
              $shiftFlag = true;
              for ($c = 0; $c < count($empAvilability); $c++) {
                if ($days[$a]->getDayId() == $empAvilability[$c]->getDayId() && $shiftTime[$s]->getShiftTimeId() == $empAvilability[$c]->getShiftTimeId()) {
                  echo "<td>  <input type='checkbox' checked='true' name=" . $days[$a]->getDayId() . "[]" . " value=" . $shiftTime[$s]->getShiftTimeId() . "> </td>";
                  $shiftFlag = false;
                  break;
                } else {
                  $shiftFlag = true;
                }
                # code...
              }

              if ($shiftFlag == true) {

                echo "<td>  <input type='checkbox' name=" . $days[$a]->getDayId() . "[]" . " value=" . $shiftTime[$s]->getShiftTimeId() . "> </td>";
              }


              # code...
            }

            echo "</td></tr>";
          }






          ?>
        </table>
        <br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="JobTitle">Job Title</label>
          </div>
          <select class="se" name="EditJobTitle">

            <?php

            for ($i = 0; $i < count($jobTitle); $i++) {
              if ($employee->getJobTitleId() == $jobTitle[$i]->getJobTitleId()) {

                echo "<option selected  value=" . $jobTitle[$i]->getJobTitleId() . ">" . $jobTitle[$i]->getJobTitleName() . "</option>";
              } else {
                echo "<option value=" . $jobTitle[$i]->getJobTitleId() . ">" . $jobTitle[$i]->getJobTitleName() . "</option>";
              }
            }

            ?>
          </select>
        </div>
        <br>


        <input class="btn btn-success" type="submit" value="Update">
        <input type="hidden" name="action" value="edit">

      </form>
    </div>
  <?php













  }



  static function menubar()
  {
  ?>
    <div class="container text-center mb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">

            <li class="nav-item active">
              <a class="nav-link" href="AdminHomePage.php">Home </a>
            </li>




            <li class="nav-item active">
              <a class="nav-link" href="CreateEmployee.php">Add&nbsp;Employee </a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="AssignSchedule.php">Assign&nbsp;Schedule </a>
            </li>




            <li class="nav-item active">
              <a class="nav-link" href="LookUpShifts.php">Look&nbsp;UP&nbsp;Shifts </a>
            </li>




            <li class="nav-item active">
              <a class="nav-link" href="updateAdmin.php">Settings </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="loggedout.php">Log&nbsp;Out </a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  <?php
  }

  static function  pieChart($pie)
  {

  ?>
    <!-- Button trigger modal -->
    <div class="text-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Show job stats
      </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Organization Composition</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- pie chart code -->
            <div id="piechart">
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

              <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {
                  'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([

                    ['Task', 'Hours per Day'],
                    <?php
                    for ($g = 0; $g < count($pie); $g++) {
                      echo "['" . $pie[$g]->getJobTitleName() . "'," . $pie[$g]->getNumber() . "],";
                    }
                    ?>
                  ]);

                  // Optional; add a title and set the width and height of the chart
                  var options = {
                    'width': 450,
                    'height': 250
                  };

                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
              </script>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


  <?php
  }

  static function showCalenderEmployee($eventData, $emp)
  {
    //var 
    $monthName = date("F");
    $year = date("o");
    $daysInmonth = date("t");
    $firstDay = date(date("w", mktime(0, 0, 0, date("n"), 1, date("Y"))));



    // first day basically tell which day like monday tuesday etc is on 1st of tht month, eventData is a stored data in csv file 
    $numerPrintFlag = false;
    $daycounter = 0;
    $newMonthDayCounter = 0;
    $weekdays = ["Sunday", "Monday", "Tuesday", "Wednessday", "Thursday", "Friday", "Saturday"];

    echo '<div class="calender">' . $emp->getFirstName() . "'s schedule for month of " . $monthName . "(" . $year . ")";
    echo '</div>';

    //printing wek days using array

    echo '<TABLE    class="calenderTable table table-bordered" >';
    echo '<TR>';
    foreach ($weekdays as $week)
      echo '<TD>' . $week;
    echo '</TD>';
    echo '</TR>';
    for ($i = 0; $i < 7; $i++) {
      echo '<TR>';
      for ($c = 0; $c <= 6; $c++) {
        if ($i == 0 && $c == $firstDay) { //finding place in table to put 1st on the bases of firstdate
          $numerPrintFlag = true;
        } else if ($daycounter == $daysInmonth) { //as soon as daycounter which print date is equal to number of days in month stop printing
          $numerPrintFlag = false;
        }
        if ($numerPrintFlag == true) {
          $daycounter++;
          if (isset($eventData) && !empty($eventData)) {
            $dayprintflag = false;

            for ($s = 0; $s < count($eventData); $s++) {
              $eventDateSplit = explode('-', $eventData[$s]->getDate());

              if ($eventDateSplit[0] == $year && $eventDateSplit[1] == date("n") && $eventDateSplit[2] == $daycounter) {
                if ($s + 1 < count($eventData)) {
                  $eventDateSplit1 = explode("-", $eventData[$s + 1]->getDate());
                  if ($eventDateSplit1[0] == $year && $eventDateSplit1[1] == date("n") && $eventDateSplit1[2] == $daycounter) {
                    if ($s + 2 < count($eventData)) {
                      $eventDateSplit2 = explode("-", $eventData[$s + 2]->getDate());
                      if ($eventDateSplit2[0] == $year && $eventDateSplit2[1] == date("n") && $eventDateSplit2[2] == $daycounter) {
                        echo '<TD  style="background-color:rgb(207, 252, 210)">' . $daycounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork() . " & " . $eventData[$s + 2]->getShiftOfWork();
                        echo '</TD>';
                        $dayprintflag = true;
                        break;
                      } else {
                        echo '<TD  style="background-color:rgb(207, 252, 210)">' . $daycounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork();
                        echo '</TD>';
                        $dayprintflag = true;
                        break;
                      }
                    } else {
                      echo '<TD  style="background-color:rgb(207, 252, 210)">' . $daycounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork();
                      echo '</TD>';
                      $dayprintflag = true;
                      break;
                    }
                  } else {
                    echo '<TD  style="background-color:rgb(207, 252, 210)">' . $daycounter . "-" . $eventData[$s]->getShiftOfWork();
                    echo '</TD>';
                    $dayprintflag = true;
                    break;
                  }
                } else {
                  echo '<TD  style="background-color:rgb(207, 252, 210)">' . $daycounter . "-" . $eventData[$s]->getShiftOfWork();
                  echo '</TD>';
                  $dayprintflag = true;
                }
              } else {
                $dayprintflag = false;
              }
            }
            if ($dayprintflag == false) {
              echo '<TD>' . $daycounter;
              echo '</TD>';
            }
          } else {

            echo '<TD>' . $daycounter;
            echo '</TD>';
          }
        }
        //
        else {
          if ($i == 0) {

            echo '<TD class=empty>';
            echo '</TD>';
          } else {
            $newMonthDayCounter++;
            if (isset($eventData) && !empty($eventData)) {
              $Newdayprintflag = false;

              for ($s = 0; $s < count($eventData); $s++) {
                $neweventDateSplit = explode('-', $eventData[$s]->getDate());

                if ($neweventDateSplit[0] == $year && $neweventDateSplit[1] == date("n") + 1 && $neweventDateSplit[2] == $newMonthDayCounter) {
                  if ($s + 1 < count($eventData)) {
                    $neweventDateSplit1 = explode("-", $eventData[$s + 1]->getDate());
                    if ($neweventDateSplit1[0] == $year && $neweventDateSplit1[1] == date("n") + 1 && $neweventDateSplit1[2] == $newMonthDayCounter) {
                      if ($s + 2 < count($eventData)) {
                        $neweventDateSplit2 = explode("-", $eventData[$s + 2]->getDate());
                        if ($neweventDateSplit2[0] == $year && $neweventDateSplit2[1] == date("n") + 1 && $neweventDateSplit2[2] == $newMonthDayCounter) {
                          echo '<TD  style="background-color:rgb(224, 242, 170)">' . $newMonthDayCounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork() . " & " . $eventData[$s + 2]->getShiftOfWork();
                          echo '</TD>';
                          $Newdayprintflag = true;
                          break;
                        } else {
                          echo '<TD  style="background-color:rgb(224, 242, 170)">' . $newMonthDayCounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork();
                          echo '</TD>';
                          $Newdayprintflag = true;
                          break;
                        }
                      } else {
                        echo '<TD  style="background-color:rgb(224, 242, 170)">' . $newMonthDayCounter . "-" . $eventData[$s]->getShiftOfWork() . " & " . $eventData[$s + 1]->getShiftOfWork();
                        echo '</TD>';
                        $Newdayprintflag = true;
                        break;
                      }
                    } else {
                      echo '<TD  style="background-color:rgb(224, 242, 170)">' . $newMonthDayCounter . "-" . $eventData[$s]->getShiftOfWork();
                      echo '</TD>';
                      $Newdayprintflag = true;
                      break;
                    }
                  } else {
                    echo '<TD  style="background-color:rgb(224, 242, 170)">' . $newMonthDayCounter . "-" . $eventData[$s]->getShiftOfWork();
                    echo '</TD>';
                    $Newdayprintflag = true;
                  }
                } else {
                  $Newdayprintflag = false;
                }
              }
              if ($Newdayprintflag == false) {
                echo '<TD class="empty">' . $newMonthDayCounter;
                echo '</TD>';
              }
            } else {

              echo '<TD class="empty" >' . $newMonthDayCounter;
              echo '</TD>';
            }
          } //el

        }
      }
      echo '</TR>';
    }
    echo '</TABLE>';
  }

  static function Employemenubar()
  {
  ?>
    <div class="container text-center mb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">


            <li class="nav-item active">
              <a class="nav-link" href="loggedout.php">Log&nbsp;Out </a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  <?php
  }
  static function lookupShifts($jobs)
  {
  ?>
    <div class="container w-25 my-5">
      <form action="" method="POST">


        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Job</label>
          <div class="col-sm-9">
            <select class="form-control" name="job">
              <?php foreach ($jobs as $job) {
                echo '<option value="' . $job->JobTitleId . '">' . $job->JobTitleName . '</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="text-center">
          <button class="btn btn-primary" type="submit" name="action" value="listEmployees">List available employees</button>
        </div>
      </form>
    </div>
  <?php



  }
  public static function listAvailableEmployeesLookUp($employees)
  { ?>
    <div class="container w-75 my-3">
      <form method="POST">
        <table class="table">
          <tr>
            <td>*</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
          </tr>
          <?php
          foreach ($employees as $e) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="' . $e->EmployeeUserId . '" value="checked"</td>';
            echo '<td>' . $e->FirstName . '</td>';
            echo '<td>' . $e->LastName . '</td>';
            echo '<td>' . $e->Email . '</td>';
            echo '<td>' . $e->Phone . '</td>';
            echo '</tr>';
          }

          ?>
        </table>
        <div class="container w-50 my-5">
          <form action="" method="POST">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">From Date</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" required name="fromdate">
              </div>
              <label class="col-sm-3 col-form-label">TO Date</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" required name="todate">
              </div>
            </div>

            <div class="text-center">
              <button class="btn btn-primary" name="action" value="lookEmployee">Give Schedule</button>
            </div>
          </form>
        </div>

      <?php }
    static function showShiftsTable($employees)
    {
      ?>

        <div class="container w-75 my-3">
          <!-- <form method="POST"> -->
          <table class="table">
            <tr>

              <td>First Name</td>
              <td>Last Name</td>
              <td>Date</td>
              <td>Shift Time</td>
              <td>Edit</td>
              <td>Delete</td>
            </tr>
            <?php
            foreach ($employees as $em) {
              foreach ($em as $e) {
                echo '<tr>';
                echo '<td>' . $e->FirstName . '</td>';
                echo '<td>' . $e->LastName . '</td>';
                echo '<td>' . $e->Date . '</td>';
                echo '<td>' . $e->ShiftOfWork . '</td>';
                echo ' <td><a href="?action=delete&id=' . $e->AssignedShiftId . '">Delete</a></td>';
                echo ' <td><a href="?action=edit&id=' . $e->AssignedShiftId . '">Edit</a></td>';
                echo '</tr>';
              }
            }

            ?>
          </table>
          <div class="text-center">
            <a href="AdminHomePage.php" class="btn btn-primary">Back</a>
          </div>




        <?php





      }
      static function editShift($shifts, $emp)
      {
        ?>
          <div class="container w-25 my-5">
            <form action="" method="POST">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">User Id</label>
                <div class="col-sm-9">
                  <?php echo $emp->EmployeeUserId; ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9">
                  <input class="form-control" value="<?php echo $emp->Date; ?>" type="date" name="date">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Shift</label>
                <div class="col-sm-9">
                  <select class="form-control" name="shift">
                    <?php foreach ($shifts as $shift) {
                      if ($emp->ShiftTimeId == $shift->ShiftTimeId) {
                        echo '<option selected value="' . $shift->ShiftTimeId . '">' . $shift->ShiftOfWork . '</option>';
                      } else {
                        echo '<option  value="' . $shift->ShiftTimeId . '">' . $shift->ShiftOfWork . '</option>';
                      }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="text-center">
                <input type="hidden" name="AssignedShiftId" value="<?php echo $emp->AssignedShiftId; ?>">
                <button class="btn btn-primary" type="submit" name="action" value="editShift">Update</button>
              </div>
            </form>
          </div>
      <?php


      }
    }
