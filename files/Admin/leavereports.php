<!--start of php-->
<?php
//SESSION START
session_start();
$adminium=$_SESSION['adminum'];
//check is the user is logged in
if(!isset($adminium)){
    header('location:../login.php');
  }
//database connection details
$server="localhost"; //hosted in your local device
$username="finalproject"; //user account
$DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
$database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
//check connection
if ($con->connect_error) {
    //die same as exit or terminate
    die("Connection failed: " . $con->connect_error);
}
$num=1; //number th table records

?>
<!-- document type declaration  -->
<!DOCTYPE html>
<!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|leave management</title>
    <!--style-->
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
            color:#f2f2f2;
        }
        .main .sidebar li a{
        color:#f2f2f2;
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
            background-color:#2b6777;
            color:black;
            font-size:18px;
            font-weight:bold;
        }
        .row{
            width:95%;
        }
        .col1{
            width:20%;
            float:left;
            border-bottom:1px solid;
            box-shadow: 5px 10px #888888;
            height:70px;
            margin-left:20px;
        }
        </style>
        <script>
            //print content the specific section of the content
            function printcontent(printid){
                //variable that holds all the content of the page
                var restorepage=document.body.innerHTML;
                //variable that holds the content of the diviision id section only
                var printcontent=document.getElementById(printid).innerHTML;
               //assign the html body section to the printed equal to the print content page
                document.body.innerHTML=printcontent;
                window.print();
                //after print restore the document content
                document.body.innerHTML=restorepage;
            }
        </script>
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
                   <br>
                   <hr>
                </li><br><br>
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
        <?php
        //table numbering
        $num=1;
        //todays date
        $today=date('Y-m-d');
        //year
        $year=date('Y');
        //get the todays month
        $today_month=date('m');
        $next_month=(date('m')+1);
                //select from leave table
                $selectleave="select * from leavetbl where leave_start='$today' and leavestatus='approved'";
                //run select query
                $runleave=mysqli_query($con, $selectleave);
                $counttoday=mysqli_num_rows($runleave); //count the total number of leaves
                //this week leave start
                $thisweek="select * from leavetbl where week(leave_start)=week(now()) and leavestatus='approved'";
                $runcounthisweek=mysqli_query($con, $thisweek);
                $countthisweek=mysqli_num_rows($runcounthisweek); //count approved leaves for this week
                //this month
                $countthismonth="select * from leavetbl where MONTH(leave_start)='$today_month' and  leavestatus='approved'";
                $runcounthismonth=mysqli_query($con, $countthismonth);
                $countthismonth=mysqli_num_rows($runcounthismonth); //count approved leaves
                //next month
                $nextmonth="select * from leavetbl where MONTH(leave_start)='$next_month' and YEAR(leave_start)='$year' and  leavestatus='approved'";
                $runextmonth=mysqli_query($con, $nextmonth);
                $countnextmonth=mysqli_num_rows($runextmonth); //count pending leaves

                ?>
        <div class="content">
        <div style="margin-top:100px;"></div>
                <div style="margin-bottom:50px;">
                   <h2 style="margin-left:20px;">Employee On Leave</h2>  <br>
                   <h2 style="margin-left:520px;  margin-top:-40px;"> <a style="color:black; text-decoration:none;" href="returnreport.php"> Expected Employee Return Date</a></h2>
                   <div class="row">
                   <div class="col1">
                       <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color: #2b6777;"><?php echo $counttoday; ?></h5>
                       <h5 ><a href="leavereports.php"  style="text-weight:bolder; font-size:18px; color: #2b6777;">Today</a></h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color: #2b6777;"><?php echo $countthisweek; ?></h5>
                       <h5><a href="thisweek_reports.php"  style="text-weight:bolder; font-size:18px; color: #2b6777;">This Week</a></h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color: #2b6777;"><?php echo $countthismonth; ?></h5>
                       <h5><a href="thismonth_reports.php" style="text-weight:bolder; font-size:18px; color: #2b6777;">This Month</a></h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color: #2b6777;"><?php echo $countnextmonth; ?></h5>
                       <h5><a href="nextmonth_reports.php"  style="text-weight:bolder; font-size:18px; color: #2b6777;">Next Month</a></h5>
                   </div>

                   </div>
                </div>
                <br><br><br>
            
                <div id="printoption">
                <div style="margin-bottom:30px; padding:20px;">
                    <h2 style="float:left; color:black;">Employee on Leave Today</h2>
                    <div style="float:right; margin-right:150px;">
                    <!--search button -->
                    </div>
                </div>             
            <table id="employeetable" style="background-color:white;">
                <tr>
                    <th>ID</th>
                    <th>Employee Number</th>
                    <th>Employee Department</th>
                    <th>Leave Type</th>
                    <th>leave Start Date</th>
                    <th>Status</th>
                    <th>More Info</th>
                    
        </tr>
<tr>
<?php
        //fetch values from the database table
        while($rows=mysqli_fetch_array($runleave)){
            $number=$rows['employee_number'];
            $_SESSION['number']=$number;
        ?>
    <td><?php echo $num; ?></td>
    <td><?php echo $rows['employee_number'];  ?></td>
    <td><?php echo $rows['emp_dept'];  ?></td>
    <td><?php echo $rows['leavetype'] ; ?></td>
    <td><?php echo $rows['leave_start'] ; ?></td>
    <td><?php echo $rows['leavestatus'] ?></td>
    <td><a style=" font-weight:bold; color: rgb(4, 99, 99); text-decoration:none; padding:10px;" href="../action.php?directmoreinfo=<?php echo $rows['leaveid'];?>" >View Info</a></td>
                            </tr>
                            <?php 
                            $num++;
                            }
                           
                            ?>
            </table>
            </div>
            <button onclick="printcontent('printoption')" style="margin-left:450px; margin-top:20px; margin-bottom:20px; height:40px; line-height:40px; font-size:20px; width:200px; color:White; background-color:#2b6777;">Print Content</button>
        </div>
    </div>
</body>
</html>