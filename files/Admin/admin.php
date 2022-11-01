<?php
//session start
//session is used to store information that is used in different pages
//sesssion can be destored hence store information temporarily.
session_start();
$adminium=$_SESSION['adminum'];
//check is the user is logged in
if(!isset($adminium)){
    header('location:../login.php');
  }
//database connection string
$server="localhost"; //hosted in your local device
$username="finalproject"; //user account
$DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
$database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
?>
<!--document type declaration; this is an html page -->
<!DOCTYPE html>
<!--attribute used to identify the  language of the element's content. en for english and es for spanish-->
<html lang="en">
    <!--container that holds the page metadate-->
<head>
     <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|HOME PAGE</title>
    <style>
          /** body style**/
          *{
            margin:0; /** outer spacing */
            padding:0; /** inner spacing */
        }
        body{
            width:100%;
            background-image: url('../assets/pictures/backs1 (2).jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        /** header section **/
        .header{
        background-color: rgb(4, 99, 99);
        color:white;
        height:70px;
        line-height:70px;
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
        .main .sidebar{
            width:25%;
            float:left;
        }
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
        .main .content{
            width:75%;
            float:right;
        }
        .mainpage{
            margin-top:50px;
            background:white;
        }
        .forms label{
            font-size: 10px;
            margin-left:30px;
        }
        .forms input{
            width:80%;
            margin-bottom:20px;
            height:30px;
            margin-left:30px;
        }
        .forms .submit{
            background-color: rgb(4, 99, 99);
            color:white;
            font-size: 20px;
            text-align: center;
            margin:0 385px;
            font-weight:bolder;
            text-transform: uppercase;
            line-height: 40px;
            height:40px;
        }
        .forms p{
            margin-left:20px;
            font-size:18px;
        }
        .account{
            background-color:white;
            width:800px;
            margin:auto;
            height:400px;
        }
        .accountlinks a{
            color:rgb(4, 99, 99);
            font-size:20px;
            line-height:40px;
            text-decoration:none;
        }
        </style>
</head>
<body>
<?php
//select from the employee table
    $select="select * from employee where employee_number='$adminium'";
    //run the select query
    $run=mysqli_query($con, $select);
    //fetch values from employee table
    $row=mysqli_fetch_array($run);
    $fullname=$row['first_name']. $row['other_name'];
    $email_address=$row['emp_email'];
    ?>
    <!--header section-->
    <div class="header">
        <h2>Employee Leave Management & Progress Tracking System</h2>
    </div>
    <!--main section-->
    <div class="main">
        <div style="margin-top:100px;"></div>
       <div class="account">
        
       <h2 style=" line-height:50px; margin-left:50px;">Welcome <?php echo $fullname; ?></h2>
       <br><br>
       <div>
           <div style="float:left;">
            <img src="../assets/pictures/admin1.png" style='width:230px; height:200px; margin-left:50px;'>
        
           </div>
           
      <div style="float:right; margin-right:100px;">
            <h1>Adminstration Account</h1>
            <p style="margin-left:25px; margin-top:10px; margin-bottom:10px; font-size:20px;">From Your Account You Can:</p>
            <ul class="accountlinks">
                <li><a href="">Employee Management(View, Update)</a></li>
                <li><a href="">Leave Management(View, Update)</a></li>
                <li><a href="">Resign Management( View, Update)</a></li>
                <li><a href="">Department Management(View, Update, Delete)</a></li>
                <form action="" method="post">
                <li><a href="request.php">Do You Want Continue? (Y/N) </a></li>
                <input type="text" placeholder="Y/N" name="continue" style="width:80px; height:20px; margin-left:30px;">
                </form>
                <?php
                if(isset($_POST['continue'])){
                    $continue=$_POST['continue'];
                    //if the value is Y
                    if($continue==Y){
                        //redirect to user account
                        echo "<script>window.open('adminaccount.php','_SELF')</script>";
                    }
                    else{
                        //logout
                        echo "<script>window.open('adlogout.php','_SELF')</script>";
                    }

                }
                ?>
            </ul>
      </div>
       </div>

</div>
</body>
</html>