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
 //captcha start code
$first_value=rand(1,20); //create variable that holds random number between 1 to 20
$second_value=rand(1,20); //create a variable that holds a random number between 1 to 20
$operators=array("+","-","*"); //array of operators
//this creates the index of the operator array it starts from 0 to the last counted element represented by -1
$operator=rand(0,count($operators)-1); 
//displays the randomly selected operator
$operator=$operators[$operator];
//answer is intialized to 0.
$answer=0;
//branching through the operator option
switch($operator){
    case "+":
        $answer=$first_value + $second_value;
        break; //terminate the statemet( stop execution)
    case "-":
        $answer=$first_value - $second_value;
        break; //terminate the statemet( stop execution)
    case "*":
        $answer=$first_value * $second_value;
        break; //terminate the statemet( stop execution)

}
//the answer is stored as session
$_SESSION['answer']=$answer;
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
        .row{
            width:100%;
        }
        .row .col{
            width:30%;
            float:left;
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
    password=document.loginform.password.value; //get the password from the form
    // answer_validate=document.loginform.answer.value; //get the password from the form
    if(usname==""){
        alert("please enter the username");//error message
        document.getElementById("usname").focus(); //specific textbox
        return false;
    }
    if(password==""){
        alert("please enter the password"); //error message
        document.getElementById("password").focus(); //specific textbox
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
        <div class="mainpage" style="height:500px; width:500px; margin-left:100px; margin-right:0px;">
        <form action="process.php" name="loginform" method="post" onsubmit="return validatefunction()" class="forms">
            <br>
            <h2 style="color:#808080; margin-left:20px;">EMPLOYEE LOGIN</h2><br>
            <hr style="margin-top:-20px;"> <!--horizontal line--> <br><br>
            <label for="" style="font-size:18px;">Employee Number</label><br><br>
            <input type="text" name="usname" id="usname" placeholder="enter the employee number"><br><br>
            <label for=""  style="font-size:18px;">password</label><br><br>
            <input type="password" name="password" id="password" placeholder="enter the password"><br>
            <p style="margin-left:290px;"><a style="color:red;" href="reset_password.php">Forgot Password?</a></p>
            <!-- captcha code section -->
            <label for=""  style="font-size:18px;">Captcha Code</label><br>
            <div class="row">
                <div class="col">
                    <p style=" margin-left:30px; margin-top:10px;">
                        <!-- displays the randomly generated value and operator -->
                    <?php echo $first_value . " " .$operator . " " .$second_value . " ="; ?>
                    </p>
                </div>
                <div class="col" style=" margin-left:-85px; width:100px;">
                    <input type="text" style="border-radius:0; height:25px; margin-top:10px;" name="answer" id="answer">
                </div>
            </div>
          <!--end of captcha code section -->
            <input type="submit" class="submit"  name="employeelogin" style="width:36%; margin-top:-50px;" value="Login">
            <br><br>
            <p>Don't Have An Account? <a href="signup.php">Create One Here</a></p>
        </form>
    </div>
        </div>
    </div>   
</body>
</html>