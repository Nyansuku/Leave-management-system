<?php
//start session
session_start();
 //the reset password user number session
 $changepass_number=$_SESSION['changepass_number'];
 //database connection string
 $server="localhost"; //hosted in your local device
 $username="finalproject"; //user account
 $DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
 $database="lms"; //database name
 //database connection statement
 $con=mysqli_connect("$server","$username","$DBpassword","$database");
?>
<!--document type declaration -->
<!DOCTYPE html>
  <!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|LOGIN PAGE</title>
    <!--styles -->
    <style>
          *{/** general styles */
            margin:0; /** outer margin */
            padding:0; /** inner margin */
        }
        body{
            width:100%;
            background-color:#2b6777;
        }
        /** header section **/
        .header{   
        background-color: #f2f2f2;
        color:black; /** text color */
        height:70px;
        line-height:70px; /** the padding on the text */
        }
        .header h2{
            margin-left:100px;
            font-size: 23px;
        }
        /** main area **/
        .main{
            width:100%;
            height:auto;
        }
        /** sidebar section */
        .main .sidebar{
            width:25%;
            float:left;
        }
        /** sidebar list and link */
        .main .sidebar li a{
        color:black;
        font-size: 20px;
        line-height: 50px;
        text-decoration: none;
        margin-left:70px;
        }
        .main .sidebar li a:hover{
            background-color: grey;
            color:white;
            padding:10px 15px;
            text-transform: uppercase;
        }
        /** main content section */
        .main .content{
            width:75%;
            float:right;
        }
        .mainpage{
            margin-top:50px;
            background:white;
        }
        /** form styles */
        .forms label{
            font-size: 10px;
            margin-left:30px;
        }
        /** form input section */
        .forms input{
            width:80%;
            margin-bottom:20px;
            height:40px;
            border-radius:20px;
            margin-left:30px;
        }
        /** submit buttom styles */
        .forms .submit{
            background-color: #2b6777;
            color:white;
            font-size: 20px;
            text-align: center;
            margin:0 250px;
            font-weight:bolder;
            text-transform: uppercase;
            line-height: 40px;
            height:40px;
        }
        .forms p{
            margin-left:20px;
            font-size:18px;
        }

        </style>
        <!--end of styles-->
    <!--javascript start-->
    <script>
//general validate function
function validatefunction(){
    //check for empty fields
            //.value return value of the specified element
        //.focus makes the element active or highlight
    email=document.loginform.email.value; //get the password from the form
    
    if(email==""){
        alert("please enter the password"); //error message
        document.getElementById("email").focus(); //specific textbox
        return false;
    }
    //VALIDATE EMAIL FIELD
    if(email.indexOf("@")==-1 || email.indexOf(".")==-1){//check the email format for @, . and emptiness
        alert("Please enter a valid Email address"); //error message
        document.getElementById("email").focus();
        return false;
        }
}
    </script>
    <!--end of javascript-->
</head>
<body>  
<div class="header">
        <h2>ELM&PTS || Employee Leave Management And Progress Tracking System </h2>
    </div>
    <!--main section-->
    <div class="main">
        <!--main content area-->
        <div class="content">
        <div class="mainpage" style="height:300px; width:500px; margin-left:100px; margin-right:0px;">
        <form action="" name="loginform" method="post" onsubmit="return validatefunction()" class="forms">
            <br>
            <h2 style="color:#808080; margin-left:20px;">RESET PASSWORD </h2><br>
            <hr style="margin-top:-20px;"> <!--horizontal line--> <br><br></br>
             <label for=""  style="font-size:18px;">Please provide the Email Address</label><br><br>
            <input type="text" name="email" id="email" placeholder="Please enter the email address"><br>
            <input type="submit" class="submit" name="resetpass" style="width:36%;" value="Next">
            <br>
            <p><a style="color:black; text-decoration:none; font-size:20px;" href="index.php">Back</a></p>
        </form>
    </div>
        </div>
    </div>   
</body>
</html>
<?php
//on button click
if(isset($_POST['resetpass'])){
   
    //fetch database fields
      //mysqli_real_escape_string escapes special characters in a string for use in an SQL query
    //used before inserting value to the database as removes any special characters that may interfere with the query operations
    $useremail=mysqli_real_escape_string($con, $_POST['email']);

    //select the employee number and account must be activated
    $selectemployee="SELECT * from employee where emp_email='$useremail' AND account_status='Activated' AND employee_number='$changepass_number'";
    //run select query
    $runselectemployee=mysqli_query($con, $selectemployee);
    //check if employee exists
    $count=mysqli_num_rows($runselectemployee);
    //if user exists login
    if($count>0){
        //store the user number provided above as a session
        $_SESSION['changepass_email']=$useremail;

    echo "<script>alert('$useremail, Set Password')</script>";
    echo " <script>window.open('set_password.php','_self')</script>";
}
else{
    echo "<script>alert('failed, Provided information is incorrect')</script>";
    echo " <script>window.open('index.php','_self')</script>";
}
}
   

?>
?>