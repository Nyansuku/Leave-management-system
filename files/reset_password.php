<?php
//start session
session_start();
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
    usname=document.loginform.usname.value;// get the username
    if(usname==""){
        alert("please enter the username");//error message
        document.getElementById("usname").focus(); //specific textbox
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
            <h2 style="color:#808080; margin-left:20px;">RESET PASSWORD</h2><br>
            <hr style="margin-top:-20px;"> <!--horizontal line--> <br><br></br>
            <label for="" style="font-size:18px;">Please provide the Employee Number</label><br><br>
            <input type="text" name="usname" id="usname" placeholder="Please enter the employee number"><br><br>
            
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
    $username=mysqli_real_escape_string($con, $_POST['usname']);

    //select the employee number and account must be activated
    $selectemployee="SELECT * from employee where employee_number='$username' AND account_status='Activated'";
    //run select query
    $runselectemployee=mysqli_query($con, $selectemployee);
    //check if employee exists
    $count=mysqli_num_rows($runselectemployee);
    //if user exists login
    if($count>0){
        //store the user number provided above as a session
        $_SESSION['changepass_number']=$username;

    echo "<script>alert('$username, One More Step')</script>";
    echo " <script>window.open('reset_password2.php','_self')</script>";
}
else{
    echo "<script>alert('failed, Please provide a correct employee number')</script>";
    echo " <script>window.open('index.php','_self')</script>";
}
}
   

?>