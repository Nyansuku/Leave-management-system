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
    $moreinfo=$_SESSION['directmoreinfo'];
    //retirement age
    $retirement=55;
    //fetch information from the employee table in relation with the session variable
    $selectleave="select * from leavetbl where leaveid='$moreinfo'";
    //run select query
        $run=mysqli_query($con, $selectleave);
        //fetch information
        while ($row = mysqli_fetch_assoc($run)){

            $email=$row['emp_email'];
            $dept=$row['emp_dept'];
            $number=$row['employee_number'];
            $status=$row['leavestatus'];
            $leave=$row['leavetype'];
            $start=date('d-m-Y', strtotime($row['leave_start']));
            $days=$row['num_of_days'];
            $end=date('d-m-Y', strtotime($row['leave_end']));
            $remarks=$row['remarks'];
            $approved_days=$row['approved_days'];
            $returndate=date('d-m-Y', strtotime($row['return_date']));

        }
    ?>
    <!-- document type declaration  -->
<!DOCTYPE html>
<!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|Leave Details</title>
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
                height:40px;
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
            .row{
                width:250px;
            }
            .col{
                width:50px;
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
            
            <h1 style="color:#2d2d2d; margin-top:50px; margin-bottom:30px; margin-left:50px;">View Leave Details</h1>
            
            <div class="mainpage" style="width:850px; height:500px; margin-top:-10px; margin-left:20px; margin-bottom:40px;">
            
            <form action="" class="forms" method="post" name="updateform" id="updateform" onsubmit="return validatefunction();" >
            <table>
                <tr>
                    <td>
                        <label for="" style="font-size:20px;">Email Address</label><br><br>
                        <input type="text" name="email" value="<?php echo $email;  ?>"  id="email" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee Number" readonly><br>
                    </td>
                    <td>
                        <label for="" style="font-size:20px;"> Employment number</label><br><br>
                        <input type="text" name="number" value="<?php echo $number;  ?>" id="number" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address" readonly><br>
                    </td>
                    <td>
                        <label for="" style="font-size:20px;"> Employment Department</label><br><br>
                        <input type="text" name="dept" value="<?php echo $dept;  ?>" id="dept" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address" readonly><br>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="" style="font-size:20px;">Leave Type</label><br><br>
                        <input type="text" name="leavetype" id="leavetype" value="<?php echo $leave; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the Employee Number" readonly><br>
                    </td>
                    <td>
                        <label for="" style="font-size:20px;">Requested Start Date</label><br><br>
                        <input type="text" name="from" id="from" value="<?php echo $start;  ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address" readonly><br>
                    </td>
                    <td>
                        <label for="" style="font-size:20px;">Requested End Date</label><br><br>
                        <input type="text" name="to" id="to"  value="<?php echo $end;?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="enter the employee email address" readonly><br>
                    </td>
                </tr>
                <tr><td colspan="12"><p style="margin-bottom:20px; font-size:20px; margin-left:350px;"> Admin Remarks</p></td></tr>
                <tr>
                    <td>
                        <label for="" style="font-size:20px;">Leave Status</label><br><br>
                        <input type="text" name="remarks" id="remarks" value="<?php echo $status; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="HR remarks" readonly><br>
                    </td>
                    <td>
                        <label for="" style="font-size:20px;">Admin Remarks</label><br><br>
                        <input type="text" name="remarks" id="remarks" value="<?php echo $remarks; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="HR remarks" readonly><br>
                    </td>
                    <td>
                    <label for="" style="font-size:20px;">Approved By</label><br><br>
                    <input type="text" value="<?php echo $email_address; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="Approved Days" readonly><br>
                  
                    </td>  
                </tr>      
                <tr>
                <td>
                        <label for="" style="font-size:20px;">Approved Number of Days</label><br><br>
                        <input type="text" name="remarks" id="remarks" value="<?php echo $approved_days; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="HR remarks" readonly><br>
                    </td>
                    <td>
                    <label for="" style="font-size:20px;">Reporting Back Date</label><br><br>
                    <input type="text" value="<?php echo $returndate; ?>" style="border-left:0; width:250px; border-top:0; border-right:0;" placeholder="Approved Days" readonly><br>
                    </td>  
                    </td> 
                </tr>                     
</table>     
            </form>
        </div>
            </div>
        </div>
    </body>
    </html>