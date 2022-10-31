<?php
//start session
session_start();
 //the reset password user number session
 $changepass_number=$_SESSION['changepass_number'];
 $changepass_email=$_SESSION['changepass_email'];
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
    var new_validate=document.loginform.new.value;// get the username
    var confirm_validate=document.loginform.confirm.value; //get the password from the form
    //variable declaration that stores the password match string
    var pass_match = /^[A-Za-z0-9@_#]$/;

    if(new_validate=="" || new_validate.length < 8 ){
        alert("New Password field is required and must contain 8 characters");//error message
        document.getElementById("new").focus(); //specific textbox
        return false;
    }
    if( new_validate.match(pass_match)){
        alert("New Password field must contain letter, number and speial charater ($,_,@)");//error message
        document.getElementById("new").focus(); //specific textbox
        return false;
    }
    if(confirm_validate=="" || confirm_validate.length < 8 ){
        alert("confirm Password field is required and must contain 8 characters");//error message
        document.getElementById("confirm").focus(); //specific textbox
        return false;
    }
    if(confirm_validate.match(pass_match)){
        alert("confirm Password field must contain letter, number and speial charater ($,_,@)");//error message
        document.getElementById("confirm").focus(); //specific textbox
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
        <div class="mainpage" style="height:450px; width:500px; margin-left:100px; margin-right:0px;">
        <form action="" name="loginform" method="post" onsubmit="return validatefunction()" class="forms">
            <br>
            <h2 style="color:#808080; margin-left:20px;">SET NEW PASSWORD</h2><br>
            <hr style="margin-top:-20px;"> <!--horizontal line--> <br><br>
            <label for="" style="font-size:18px;">New password</label><br><br>
            <input type="password" name="new" id="new" placeholder="please enter the new password"><br><br>
            <label for=""  style="font-size:18px;">Confirm new password</label><br><br>
            <input type="password" name="confirm" id="confirm" placeholder="please enter the confirm password"><br>
            <input type="submit" class="submit" name="resetpass" style="width:37%;" value="Set Password">
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
    $new_pass=mysqli_real_escape_string($con, $_POST['new']);
    $confirm_pass=mysqli_real_escape_string($con, $_POST['confirm']); 
    
    //check if the new and confirm password are the same
    if($new_pass == $confirm_pass){
    $new=md5($new_pass); //password encrypt
    $confirm=md5($confirm_pass); //password encrypt
    //update password using the employee number and email address stored as session
    $selectemployee="UPDATE employee SET password='$new' where employee_number = '$changepass_number'";
    //run select query
    $runselectemployee=mysqli_query($con, $selectemployee);
    
    echo "<script>alert('$changepass_number account password successfully set')</script>";
    echo " <script>window.open('login.php','_self')</script>";
}
else{
    
    echo "<script>alert('new password and confirm password not match')</script>";
    echo " <script>window.open('login.php','_self')</script>";
}
}
?>