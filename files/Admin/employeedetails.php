<?php
    //SESSION START
    session_start();
    $adminium=$_SESSION['adminum'];
    //check is the user is logged in
    //check is the user is logged in
if(!isset($adminium)){
    header('location:../login.php');
  }
    //database connection
    $server="localhost"; //hosted in your local device
        $username="finalproject"; //user account
        $DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
        $database="lms"; //database name
    //database connection statement
    $con=mysqli_connect("$server","$username","$DBpassword","$database");
    $employeenum=$_SESSION['directupdateemployee']; //session variable that stores the employee information
    //retirement age
    $retirement=55;
    //fetch information from the employee table in relation with the session variable
    $selectemployee="select * from employee where employee_number='$employeenum'";
    //run select query
        $run=mysqli_query($con, $selectemployee);
        //fetch information
        while ($row = mysqli_fetch_assoc($run)){
        //fetch columns
        $fullname=$row['first_name']. " " .  $row['other_name'];
        $number=$row['employee_number'];
        $email=$row['emp_email'];
        $profile=$row['profile'];
        $dept=$row['department'];
        $id=$row['idnumber'];
        $dob=date('d-m-Y', strtotime($row['dob']));;//fetch date from database
        $datedob=date('Y-m-d', strtotime($row['dob']));
        $todate=date("Y-m-d");
        $age = date_diff(date_create($datedob), date_create($todate))->format("%y");
        $phone=$row['phone'];
        $empdate=date('d-m-Y', strtotime($row['employment_date']));
        $type=$row['emp_type'];
        $position=$row['emp_role'];
        $periods=$row['employment_period'];
        $num=$row['leave_days'];
        $termination=$row['retirement_year'];
        $leavedays=$row['leave_days'];
        $category=$row['emp_category'];
        }
    ?>

    <!-- document type declaration  -->
<!DOCTYPE html>
<!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|Employee details</title>
        <!--style link-->
        <link rel="stylesheet" href="style/style.css">
        <style>
            /** body style**/
            *{
                margin:0;
                padding:0;
            }
            body{
                background-color:#2b6777;
                width:100%;
            }
            /** header section **/
            .header{
            background-color: #f2f2f2;
            color:black;
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
                color:white;
            }
            .main .sidebar li a{
            color:white;
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
                background-color:#C8D8E4;
            }
            .mainpage{
                margin-top:50px;
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
            .rows2{
                width:100%;
            }
            .cols1{
                width:45%;
                float:left;
            }

            </style>
           
    </head>
    <body>

    <body>
    <?php
    $select="select * from employee where employee_number='$adminium'";
    $run=mysqli_query($con, $select);
    $row=mysqli_fetch_array($run);
    $fullname=$row['first_name']. $row['other_name'];
    $email_address=$row['emp_email'];
    ?>
        <!--header section-->
        <div class="header">
            <h2>ELM&PTS || Welcome Admin: <?php echo $fullname; ?></h2>
        </div>

        <!--main section-->
        <div class="main">
            <!--sidebar-->
            <div class="sidebar">
                <div style="margin-top:100px;"></div>
                <!--unordered list for the links-->
                <ul>
                    <li>
                    
                    <br>
                    <h3 style="margin-left:70px;">Admin</h3>
                    <p style="margin-left:70px; font-size:18px;"><?php echo $adminium; ?></p>
                    <br>
                    <p  style="margin-left:70px; font-size:18px;"> <?php echo $email_address; ?></p>
                    </li>
                    <br><hr><br>
                    <li> <a href="adminaccount.php">Dashboard</a></li>
                    <li> <a href="adddepartment.php">Add Department</a></li>
                    <li> <a href="employeemanagement.php">Employee Management </a></li>
                    <li> <a href="leavemanagement.php">Leave Management</a></li>
                    <li> <a href="leavereports.php">Leave Reports</a></li>
                    <li> <a href="resigntion.php">Resignation Management</a></li>
                    <li> <a href="progress.php">Progress</a></li>
                    <li> <a href="adlogout.php">Logout </a></li>
                </ul>
            </div>
        
            <!--main content area-->
            <div class="content">
            
            <h1 style="color:#2d2d2d; margin-top:50px; margin-left:50px;">View Employment Information</h1>
            
            <div class="mainpage" style="width:850px; height:500px; margin-top:-10px; margin-left:20px; margin-bottom:40px;">
            
            <form action="" class="forms" method="post" name="updateform" id="updateform" onsubmit="return validatefunction();" >
            <table>
                <br>
                <tr>
                    <td>
                        <label for="" style="font-size:18px;">Email Address</label><br><br>
                        <input type="text" name="usname" id="usname" readonly value='<?php echo $email; ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee Number"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;"> Employment number</label><br><br>
                        <input type="text" name="email" value='<?php echo $number; ?>' readonly id="email" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;"> id Number</label><br><br>
                        <input type="text" name="email" id="email"  readonly value='<?php echo $id ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label for="" style="font-size:18px;">Full Name</label><br><br>
                        <input type="text" name="usname" value='<?php echo $fullname; ?>' id="usname" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee Number"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;"> Date Of Birth</label><br><br>
                        <input type="text" name="email" id="email" readonly value='<?php echo $dob; ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;"> Phone Number</label><br><br>
                        <input type="text" name="email" value='<?php echo $phone; ?>' readonly id="email" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>   
                </tr>
                <tr>
                    <td colspan="3">
                        <h3 style="margin-left:300px; color:grey; line-height:70px;">Employement Information</h3>
                    </td>
                </tr>
                <tr>
                <td>
                        <label for="" style="font-size:18px;">Employee age</label><br><br>
                        <input type="text" name="age" id="age" readonly readonly value='<?php echo $age; ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;">Employee Date</label><br><br>
                        <input type="text" name="usname" readonly value='<?php echo $empdate; ?>' id="usname" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee Number"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;">Department</label><br><br>
                        <input type="text" name="email" readonly id="email" value='<?php echo $dept; ?>'style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                    
                </tr>
                <tr>
                <td>
                        <label for="" style="font-size:18px;">Employement position</label><br><br>
                        <input type="text" name="email" id="email" readonly value='<?php echo $position; ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;">Employment Type</label><br><br>
                        <input type="text" name="dept" id="dept" value='<?php echo $type;?> for <?php echo $periods; ?> Years' readonly style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee department"><br>
                    </td>
                    <td>
                        <label for="" style="font-size:18px;">Expected Termination Year</label><br><br>
                        <input type="text" name="dept" readonly value='<?php echo $termination; ?>' id="dept" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee department"><br>
                    </td>
                    
                    
                </tr>

                <tr>
                <td>
                        <label for="" style="font-size:18px;">Employment Category</label><br><br>
                        <input type="text" name="dept" id="dept" value='<?php echo $category;?>' readonly style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee department"><br>
                    </td>
                <td>
                        <label for="" style="font-size:18px;">Employement Annual Leave Days</label><br><br>
                        <input type="text" name="email" id="email" readonly value='<?php echo $leavedays; ?>' style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address"><br>
                    </td>
                     
                </tr>
</table>     
            </form>
        </div>
            </div>
        </div>
    </body>
    </html>