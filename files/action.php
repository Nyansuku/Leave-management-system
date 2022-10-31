<?php
//session start
session_start();
//CONNECTION TO DATABASE
//database connection
$server="localhost"; //hosted in your local device
$username="finalproject"; //user account for mysql 
$DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; ////password to the user account
$database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
$today_date=date('Y-m-d');

//REdirect HR to moreinfo page
//update leave information
if(isset($_GET['directmoreinfo'])){
  //value from checkbox
  $directmoreinfo= $_GET['directmoreinfo'];
//select from leave
$selectl="select * from leavetbl where leaveid='$directmoreinfo'";
$runselect=mysqli_query($con, $selectl);
//fetch values from the leave table
$fetch=mysqli_fetch_array($runselect);
$employeenumber=$fetch['employee_number'];
$leavestatus=$fetch['leavestatus'];
//store the value in the session variable status
$_SESSION['directmoreinfo']=$_GET['directmoreinfo'];
$_SESSION['employeenumber']=$employeenumber;
//if the leave status is approved or disapproved
if($leavestatus=="approved" || $leavestatus=="disapproved"){
  echo "<script>alert('Employee Leave Information already activated,  View Leave details')</script>";
  echo " <script>window.open('admin/leavedetails.php','_self')</script>";
}
//if the leave status is empty
else{
//redirect
echo "<script>window.open('admin/moreinfo.php','_self')</script>";  
}
}
 //redirect the employee management to update employee page
if(isset($_GET['directupdateemployee'])){
    //value from checkbox
    $directupdateemployee= $_GET['directupdateemployee'];
  //store the value in the session variable status
  $_SESSION['directupdateemployee']=$_GET['directupdateemployee'];
  //select
$selectemployee="select * from employee where employee_number='$directupdateemployee'";
$run_employee=mysqli_query($con, $selectemployee);
//fetch the information from employee table
$fetch_employee=mysqli_fetch_array($run_employee);
$employee_status=$fetch_employee['account_status'];
//if the employee status is activatd
if($employee_status=='Activated'){
  echo "<script>alert('Employee Information already activated,  View Employee details')</script>";
  echo " <script>window.open('admin/employeedetails.php','_self')</script>";
}
//if the employee status is not activated
else{
  //redirect
  echo "<script>window.open('admin/updateemployee.php','_self')</script>";  
 }
}

 
 //redirect the resign 
if(isset($_GET['directresign'])){
  //value from checkbox
  $directresign= $_GET['directresign'];
//store the value in the session variable status
$_SESSION['directresign']=$_GET['directresign'];
//select
$selectresign="select * from resign where employee_number='$directresign'";
$run=mysqli_query($con, $selectresign);
$fetch_resign=mysqli_fetch_array($run);
$resign_status=$fetch_resign['statuss'];
if($resign_status=='approved' || $resign_status=="disapproved"){
  echo "<script>alert('Resign Information already activated,  View resign details')</script>";
  echo " <script>window.open('admin/resigndetails.php','_self')</script>";
}
else{
//redirect
echo "<script>window.open('admin/updateresign.php','_self')</script>";  
}
}

 //redirect to the edit department page
if(isset($_GET['directeditdept'])){
  //value from checkbox
  $directeditdept= $_GET['directeditdept'];
//store the value in the session variable status
$_SESSION['directeditdept']=$_GET['directeditdept'];
//redirect
echo "<script>window.open('admin/editdept.php','_self')</script>";  
}

//DEACTIVATE EMPLOYEE
if(isset($_GET['deactivate'])){
  //value from checkbox
  $deactivate= $_GET['deactivate'];
  //update table employeee
  $emp_deactivate="update employee set account_status= 'Deactivated' where employee_number='$deactivate'";
  $run_deactivate=mysqli_query($con, $emp_deactivate);
  //
  echo "<script>alert('account status deactivated')</script>";
  echo " <script>window.open('admin/employeemanagement.php','_self')</script>";
}
//redirect employee to update leave information page
if(isset($_GET['empupdateleave'])){
  //value from checkbox
  $empupdateleave= $_GET['empupdateleave'];
  //select from the leave table based on the leave id 
  $selectleave="select * from leavetbl where leaveid='$empupdateleave'";
  $runselectleave=mysqli_query($con, $selectleave);
  //fetch values from the leave table
  $leaverow=mysqli_fetch_array($runselectleave);
  $status=$leaverow['leavestatus'];
  //if the leave status is not pending do not update
  if($status == 'pending'){
  //fetch the daterequested
  $request_date= new DateTime($leaverow['daterequested']); //DateTime($_POST['start']);
    $now = new DateTime(); //today date
    //date diff finds the date differnce between two dates
    $updatedays = date_diff($now, $request_date) ->format('%a days %h hours');
    //employee can update leave within interval of 2 days
    if($updatedays>2){
      //cant not update imformation
      echo "<script>alert('Cant Update Account')</script>";
  echo " <script>window.open('employee/leaveinformation.php','_self')</script>";
    }
    else{
      //redirect to the update page
      $_SESSION['empupdateleave']=$_GET['empupdateleave'];
//redirect
echo "<script>window.open('employee/updateleave.php','_self')</script>";  
    }
  }
  else{
    echo "<script>alert('Cant Update, Leave Information Already Updated.')</script>";
    echo " <script>window.open('employee/leaveinformation.php','_self')</script>"; 
  }

}

//delete leave request
if(isset($_GET['deleteleave'])){
  //value from checkbox
  $deleteleave= $_GET['deleteleave'];
  $deleteleave="delete from leavetbl where leaveid='$deleteleave'";
  $rundelete=mysqli_query($con, $deleteleave);
  if($rundelete){
    echo "<script>alert('Leave Request Deleted Successfully')</script>";
    echo " <script>window.open('employee/leaveinformation.php','_self')</script>";
}
}

//download file
//if the download option is set or clicked
if(!empty($_GET['downloadfile'])){
  //the filename
  /// the basename returns the filename
  $fileName  = basename($_GET['downloadfile']);
  //define file path to the file
  $filePath  = "assets/resignfiles/".$fileName;
  //if the filename is not empty and the file exists on the defined path
  if(!empty($fileName) && file_exists($filePath)){
      //define header
      //content disposition explains how the content should be displayed in the browser: as either an attachement to be downloaded or part of webpage.
      header("Content-Disposition: attachment; filename=$fileName");
      //read file 
      //reads a file and writes it to the output buffer
      //output buffer temporary location in the memory that holds data before display
      readfile($filePath);
      exit;
  }
  else{
      echo "file not exit";
  }
}

?>