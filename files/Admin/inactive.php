
<?php
//session start
session_start();
$adminium=$_SESSION['adminum'];
//check is the user is logged in
if(!isset($adminium)){
    header('location:../login.php');
  }
  //connection variable
  $server="localhost"; //hosted in your local device
  $username="finalproject"; //user account
  $DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
  $database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
?>

<!-- document type declaration  -->
<!DOCTYPE html>
<!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|Inactive employee</title>
    <style>
          /** body style**/
          *{
            margin:0;
            padding:0;
        }
        body{
            background-color: #2b6777;
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

        #employeetable{
            width:100%;
            margin-bottom:30px;
            border-collapse:collapse;
        }
        #employeetable td, #employeetable th{
            padding:10px;
            border:1px solid #ddd;
            line-height:40px;
        }
        #employeetable tr:nth-child(even){
            background-color: #f2f2f2;
            line-height:40px;
        }
        #employeetable tr:hover{
            background-color:#ddd;
        }
        #employeetable th{
            padding-top:12px;
            padding-bottom:12px;
            text-align:left;
            background-color: #2b6777;
            color:black;
            font-size:20px;
            font-weight:bold;
        }
        </style>

    <!--PHP SCRIPT START-->
    <?php
    //this year
    $year=date('Y');
    //select from employee where retirement yer is equal to this year
    $selectretire="select * from employee where account_status='Deactivated'";
    $run_selectretire=mysqli_query($con, $selectretire);
    $num=1;
    ?>
    <!--PHP SCRIPT END-->
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
                </li><br><hr><br>
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
        <div class="content" style="height:580px;">
        <div style="margin-top: 95px;"> 
            <div style="float:left; margin-left:300px;">
                <h3>
                    <a href="progress.php" style="color:black; text-decoration:none;"> Retired Employee</a>
                </h3>
            </div>
            <div style="float:right; margin-right:150px;">
            <h3>
                <a href="inactive.php" style="color:black; text-decoration:none;"> Deactivated Employee</a>
            </h3>
            </div>
        </div>     
    
                <div>
    <h2 style="margin-top:120px; color:black; margin-left:20px; margin-bottom:20px;">Inactive Employee  <?php echo $year; ?></h2>
    <table id="employeetable" style="background-color:white;">
                <tr>
                    <th>ID</th>
                    <th>Employee Number</th>
                    <th>Department</th>
                    <th>Email Address</th>
                    <th>FullName</th>
                    <th>Position</th>
                    
                </tr>
               <?php
        //fetch values from the database table
        while($rows=mysqli_fetch_array($run_selectretire)){
        ?>
<tr>
    <td><?php echo $num; ?></td>
    <td><?php echo $rows['employee_number'];  ?></td>
    <td><?php echo $rows['department']; ?></td>
    <td><?php echo $rows['emp_email'];  ?></td>
    <td><?php echo $rows['employee_number'];  ?></td>
    <td><?php echo $rows['emp_role'] ?></td>


                            </tr>
                            <?php 
                            $num++;
                            } 
                            ?>
            </table>
</div>
        </div>
</body>
</html>