
<?php
session_start();
//database connection string
$server="localhost"; //hosted in your local device
$username="finalproject"; //user account
$DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
$database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
//on button click
if(isset($_POST['employeelogin'])){
    //fetch database fields
      //mysqli_real_escape_string escapes special characters in a string for use in an SQL query
    //used before inserting value to the database as removes any special characters that may interfere with the query operations
    $username=mysqli_real_escape_string($con, $_POST['usname']);
    $pass=mysqli_real_escape_string($con, $_POST['password']); 
    //password hashing
    $password=md5($pass); //password encrypt
    $answer=$_SESSION['answer']; //correct answer stored as session
    $user_answer=$_POST['answer']; //the user answer from the textbox

if($answer == $user_answer){
    //select from employee
    $selectemployee="select * from employee where employee_number='$username' AND password='$password' AND account_status='Activated'";
    //run select query
    $runselectemployee=mysqli_query($con, $selectemployee);
    //check if employee exists
    $count=mysqli_num_rows($runselectemployee);
    //if user exists login
    if($count>0){
//store employee number as session
while ($row = mysqli_fetch_assoc($runselectemployee)) {
    //fetch the type
    $type=$row['employee_type'];
    //if admin type 1
    if($type==1){
    $fullname=$row['first_name']. $row['other_name'];
    $number22=$row['employee_number'];
    $_SESSION['adminum']=$row['employee_number'];
    //redirect to respective page
    //display message and redirect user
    echo "<script>alert('$fullname, Welcome Admin')</script>";
    echo " <script>window.open('admin/admin.php','_self')</script>";
    }
    //if employee type 0
    else{
    $fullname=$row['first_name']. $row['other_name'];
    $number22=$row['employee_number'];
    $_SESSION['employeenum']=$row['employee_number'];
    //redirect to respective page
    //display message and redirect user
    echo "<script>alert('$fullname, Welcome To Your Account')</script>";
    echo " <script>window.open('employee/employeeaccount.php','_self')</script>";
}
}
    }
    //error if 
    else{
//display message and redirect user
echo "<script>alert('Failed to login, Try Again')</script>";
echo " <script>window.open('login.php','_self')</script>";
    }
}
else{
//display message and redirect user
echo "<script>alert('wrong calculation; try again')</script>";
echo " <script>window.open('login.php','_self')</script>";
}
}

?>