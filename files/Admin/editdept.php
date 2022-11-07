<?php 

//session start
session_start();
$adminium=$_SESSION['adminum'];
$department=$_SESSION['directeditdept'];
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

//select from dept table
$selectdept="select * from department where dept_name='$department'";
$rundept=mysqli_query($con, $selectdept);
$row=mysqli_fetch_array($rundept);
$deptname=$row['dept_name'];
$dept_id=$row['dept_id'];
$deptabbr=$row['dept_abbr'];
?>

<!-- document type declaration  -->
<!DOCTYPE html>
<!--system title displayed on the window tab -->
<html lang="en">
    <!--head section is the container of the page metadata-->
<head>
      <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|Edit Dept</title>
    <!--style link-->
    <link rel="stylesheet" href="style/style.css">
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
            background-color: #2b6777;
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
        <!--javascript-->
        <script>
//general validate function
function validatefunction(){
    //check for empty fields
    deptname=document.deptform.deptname.value;
    deptabbr=document.deptform.deptabbr.value;
    if(deptname==""){
        alert("please enter the department Name");
        document.getElementById("deptname").focus();
        return false;
    }
    if(deptabbr==""){
        alert("please enter the department Abbrevation");
        document.getElementById("deptabbr").focus();
        return false;
    }
    //if the values are inputted return true.
    var rtned =true;
}

    </script>
    <!--end of javascript-->
    <!--PHP SCRIPT START-->
    <?php
 //EDIT DEPARTMENT
if(isset($_POST['editdept'])){
    //TEXTBOX VALUES
    $name=$_POST['deptname'];
    $abbr=$_POST['deptabbr'];

    //INSERT INTO DEPARTMENT CODE
    $edit_Department="update department set dept_name='$name', dept_abbr='$abbr' where dept_id='$dept_id'";
    $run_editdept=mysqli_query($con, $edit_Department);
    if($run_editdept){
        echo "<script>alert('Department Updated Successfully')</script>";
        echo " <script>window.open('adddepartment.php','_self')</script>";
    }
    else{
        echo "<script>alert('Sorry, Failed To Update Department')</script>";
        echo " <script>window.open('adddepartment.php','_self')</script>";
    }

}
//Delete button
if(isset($_POST['delete'])){
    //TEXTBOX VALUES
    $name=$_POST['deptname'];
    $abbr=$_POST['deptabbr'];
    //delete script
    $deletedept="delete from department where dept_name='$name'";
    $rundelete=mysqli_query($con, $deletedept);
    if($rundelete){
        echo "<script>alert('Department Deleted Successfully')</script>";
        echo " <script>window.open('adddepartment.php','_self')</script>";
    }
}
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
        <div class="content" style="height:600px;">
        <div class="mainpage" style="width:600px; height:230px; margin-top:200px; margin-left:200px;">
        <form action="" name="deptform" method="post" onsubmit="return validatefunction()" class="forms">
            <br>
            <h3 style="color:#2d2d2d; margin-left:20px;">Edit  Department</h3><br><br>
            <table>
                <tr>
                    <td>
                    <label for="" style="font-size:18px;">Department Name</label><br><br>
            <input type="text" name="deptname" id="deptname" value=<?php echo $deptname;?> style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the department Name"><br> 
                    </td>
                    <td>
                    <label for="" style="font-size:18px;">Department Abbr</label><br><br>
            <input type="text" name="deptabbr" id="deptabbr" value=<?php echo $deptabbr;?> style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the department Abbrevation"><br>   
                    </td>
                </tr>
               
            </table>
            <div class="rows2">
                <div class="cols1">
                <input type="submit" class="submit" style="width:100px; margin-left:30px;" name="editdept" value="Edit">
                </div>
                <div class="cols1">
                <input type="submit" class="submit" style="width:100px; margin-left:20px;" name="delete" value="Delete">
                </div>
            </div>
           
        </form>
    </div>
</div>
</body>
</html>