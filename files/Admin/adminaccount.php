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
//connection
//database connection string
$server="localhost"; //hosted in your local device
$username="finalproject"; //user account
$DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
$database="lms"; //database name
//database connection statement
$con=mysqli_connect("$server","$username","$DBpassword","$database");
//front end table count
$num=1;
$num1=1;
//select the monthname and count the leaveid associated to the leave where year of application is 2022.
$selectss="SELECT MONTHNAME(leave_start) as mname,
   count(leaveid) as total from leavetbl 
   WHERE YEAR(leave_start)='2022'
    group by MONTH(leave_start)";
    //run query
 $run=mysqli_query($con, $selectss);
while($row=mysqli_fetch_array($run)){
    //store the fetched values in an array
    $shops[]= $row;
} 
//create array
 $b= array();
 //foreach loop is used to iterate (traverse) through the array values
 foreach ($shops as $shop) {
     //the array b is assiged the values total from the select query
  $b[]=$shop['total'];
  //return the string from the array b. input space between the values.
 $fnarry = implode(" \n",$b);
 } 
  //create array
  $a= array();
  //foreach loop is used to iterate (traverse) through the array values
  foreach ($shops as $shop2) {
      //the array b is assiged the values total from the select query
   $a[]=$shop2['mname'];
   //return the string from the array b. input space between the values.
  $montharray = implode(" \n",$a);
  }  
//select from the leave table
$searchquery="select * from leavetbl where leavestatus='pending'";
$search_result=mysqli_query($con, $searchquery);
$countnum=mysqli_num_rows($search_result);
?>
<!--document type declaration; this is an html page -->
<!DOCTYPE html>
<!--attribute used to identify the  language of the element's content. en for english and es for spanish-->
<html lang="en">
    <!--container that contains the page metadata-->
<head>
     <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|HOME PAGE</title>
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
        line-height:70px; /** distance between the text */
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
            color:#f2f2f2;
            float:left;
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
            background-color: #2b6777;
            color:black;
            font-weight:bold;
            padding-top:12px;
            font-size:18px;
            padding-bottom:12px;
            text-align:left;
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
        .col2{
            width:45%;
            float:left;
            border-bottom:1px solid;
            box-shadow: 5px 10px #888888;
            height:300px;
            border-radius:10px;
            background-color:white;
            margin-left:20px;
        }
        .col3{
            width:25%;
            float:left;
            margin-left:20px;
        }
        .canvass p{
            display: flex;
            margin-left:10px;
            font-size:18px;
            
        }

        </style>
    
</head>
<body onload="draw()">
<?php
//select from employee
    $select="select * from employee where employee_number='$adminium'";
    $run=mysqli_query($con, $select);
    //fetch fields
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
        <!--PHP TO FETCH INFO-->
        <?php
        $year=date('Y');
        //total active employee
        $countemp="select * from employee where account_status='activated'";
        $run_countemp=mysqli_query($con, $countemp);
        $active_employee=mysqli_num_rows($run_countemp);//count employee
        //total retirement this year
        $countemployee="select * from employee where retirement_year='$year'";
        $run_countemployee=mysqli_query($con, $countemployee);
        $count_retire=mysqli_num_rows($run_countemployee);//count employee
        //total department
        $countdept="select * from department";
        $run_countdept=mysqli_query($con, $countdept);
        $total_dept=mysqli_num_rows($run_countdept);
        //total approved leaves
        $countleave="select * from leavetbl where leavestatus='approved'";
        $run_countleave=mysqli_query($con, $countleave);
        $approved_leave=mysqli_num_rows($run_countleave);
        //select from user table
        $seluser="select * from user";
        $runseluser=mysqli_query($con, $seluser);
        ?>
        <!--main content area-->
        <div class="content">
        <div style="margin-bottom:50px; margin-top:70px;">
                   <h2 style="margin-left:20px;">Data Information</h2> 
                   <div class="row">
                   <div class="col1">
                       <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color:#2b6777;"><?php echo $active_employee; ?> </h5>
                       <h5 style="text-weight:bolder; font-size:18px; color:#2b6777;" >Total Active Employee</h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color:#2b6777;"><?php echo $total_dept; ?></h5>
                       <h5 style="text-weight:bolder; font-size:18px; color:#2b6777;" >Total Department</h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color:#2b6777;"><?php echo $approved_leave; ?></h5>
                       <h5 style="text-weight:bolder; font-size:18px; color:#2b6777;" >Total Leaves Approved</h5>
                   </div>
                   <div class="col1">
                   <h5 style="text-weight:bolder; font-size:20px; margin-top:20px; color:#2b6777;"><?php echo $count_retire; ?></h5>
                       <h5 style="text-weight:bolder; font-size:18px; color:#2b6777;" >Total Retirement in <?php echo date('Y'); ?></h5>
                   </div>

                   </div>  
                </div>
<div>
    
    <br><br><br>
    <hr><br><br>
    <center>
        <h2>  <?php echo date('Y'); ?> Monthly Leave application from <?php echo $a['0']; ?> To <?php echo end($a);?></h2>
        <div class="canvass">
            <br>
                    <?php
               echo "<input type='text' class='form-control' id='num' value='$fnarry'>";
                ?>
            <br>
            <br>
            <br>
            <canvas id="myCanvas" style="border:1px solid #c3c3c3; width:500px;"></canvas>
            <h3 style="text-align: center; padding-top: 20px;">MONTHS</h3>
            
          </div>
    </center>
</div>

                <div style="margin-top:50px;">
                    <h3>Latest Leave Applications</h3>
                </div>
        <!--LATEST LEAVES-->
        <table id="employeetable" style="background-color:white;  margin-top:20px; margin-bottom:50px;">
                <tr>
                    <th>ID</th>
                    <th>Employee Number</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Leave Type</th>
                    <th>Status</th>
                </tr>
                <?php
        //fetch values from the database table
        while($rows=mysqli_fetch_array($search_result)){
            $number=$rows['employee_number'];
            $_SESSION['number']=$number;
        ?>
<tr>
    <td><?php echo $num; ?></td>
    <td><?php echo $rows['employee_number'];  ?></td>
    <td><?php echo $rows['emp_email'];  ?></td>
    <td><?php echo $rows['emp_dept'];  ?></td>
    <td><?php echo $rows['leavetype'] ; ?></td>
    <td><?php echo $rows['leavestatus'] ?></td>

                            </tr>
                            <?php 
                            $num++;
                            } 
                            ?>
            </table>
           
          
    </div>
</body>
<script>


    function draw(){
        // Accepting and seperating comma seperated values
        var n = document.getElementById("num").value.split(/\s/); //split with a space /s
        var canvas = document.getElementById('myCanvas');
        var ctx = canvas.getContext('2d'); //return the drawing context of canvas 2d images
        var width= 18; // bar width, rectangle
        var X = 10; // first bar position from the left margin. at 10th cordinate
    
        // Filling the Rectangle based on the input values
        //for loop iterate through all the values provided in the text box
        for (var i =0; i<n.length; i++) {
                     //fillstyle property is used to set the gradient, color, pattern used to fill the drawing.
            ctx.fillStyle = '#000'; //fill the drawing with the color.
            //h is the height of a specific bar.
            var h = n[i] * 5;  //to make the bars visible multiply the height by 5
            //fillrect is used to draw the rectangle
            //it accepts the height, width, X(position of the first bar), Y position(cordinate)
            //canvas.height - h the y cordinate (total canvas height-height of the specific bar gives the Y cordinate)
            ctx.fillRect(X,canvas.height - h,width,h);
            X +=  width+15; //inccrement the X position by the width +15 (25+15)
            // Text to display Bar number
            ctx.fillStyle = 'black';
            ctx.fillText(+n[i],X-30,canvas.height - h -10);      
        }
    }
</script>
</html>