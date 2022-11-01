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
//database connection variable
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
    <!--head attribute is a container that holds the metadata of the page-->
<head>
     <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|Add Department</title>
    <style>
          /** body style**/
          *{
            margin:0; /** margin is outer spacing */
            padding:0; /** padding is inner spacing */
        }
        body{
            background-color:#2b6777; /**--hex color code**/
            width:100%;
        }
        /** header section **/
        .header{
        background-color: #f2f2f2;
        color:black;
        height:70px;
        line-height:70px; /**sets the distance between the lines of text */
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

        #employeetable{
            width:95%;
            margin-left:20px;
            margin-bottom:30px;
            border-collapse:collapse; /** set the border into one a single border */
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
        <!--javascript-->
        <script>
            //print content the specific section of the content
            function printcontent(printid){
                //variable that holds all the content of the Html page
                var restorepage=document.body.innerHTML;
                //variable that holds the content of the division id section only (the div to be printed)
                var printcontent=document.getElementById(printid).innerHTML;
               //assign the html body section to the printed equal to the print content page
                document.body.innerHTML=printcontent;
                //print the content of the currrent window
                window.print();
                //after print restore the document content
                document.body.innerHTML=restorepage;
            }
//general validate function
function validatefunction(){
    //check for empty fields
    //.value return the specific values based ont the provided id
    //.focus highlight an element or makes it active
    deptname=document.deptform.deptname.value;
    deptabbr=document.deptform.deptabbr.value;
    //check if the department name is empty
    if(deptname==""){
        alert("please enter the department Name");
        document.getElementById("deptname").focus();
        return false;
    }
    //ccheck if the department abbreviation is empty
    if(deptabbr==""){
        alert("please enter the department Abbrevation");
        document.getElementById("deptabbr").focus();
        return false;
    }
}

    </script>
    <!--end of javascript-->

    <!--PHP SCRIPT START-->
    <?php
//isset if a variable is set.
//if the button is clicked
//$_post is a global variable that is used to fetch values from a from with the method post
//form method explains how the form data is sent (post or get)
if(isset($_POST['dept'])){
    //TEXTBOX VALUES
    $name=$_POST['deptname'];
    $abbr=$_POST['deptabbr'];

    //INSERT INTO DEPARTMENT CODE
    $insert_Department="insert into department(dept_name, dept_abbr) values('$name','$abbr')";
    //run the insert query
    $run_insertdept=mysqli_query($con, $insert_Department);
    if($run_insertdept){
        echo "<script>alert('Department Added Successfully')</script>";
        echo " <script>window.open('adddepartment.php','_self')</script>";
    }
    else{
        echo "<script>alert('Sorry, Failed To Add Department')</script>";
        echo " <script>window.open('adddepartment.php','_self')</script>";
    }

}
    ?>
    <!--PHP SCRIPT END-->
</head>
<body>
<?php
//selecy from the employee table
    $select="select * from employee where employee_number='$adminium'";
    $run=mysqli_query($con, $select);
    //fetch information from employee table
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
        <!--main content area-->
        <div class="content">
        <div class="mainpage" style=" width:700px; height:230px; margin-left:120px;">
        <form action="" name="deptform" method="post" onsubmit="return validatefunction()" class="forms">
            <br>
            <h2 style="color:#2d2d2d; margin-left:20px;">Add New Department</h2><br><br>
            <table>
                <tr>
                    <td>
                    <label for="" style="font-size:18px;">Department Name</label><br><br>
            <input type="text" name="deptname" id="deptname" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the department Name"><br> 
                    </td>
                    <td>
                    <label for="" style="font-size:18px;">Department Abbr</label><br><br>
            <input type="text" name="deptabbr" id="deptabbr" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the department Abbrevation"><br>   
                    </td>
                </tr>
                <tr>
                    <td colspan="10">
                    <input type="submit" class="submit" style="width:200px; margin-left:30px;" name="dept" value="Add Department">
                    </td>
                </tr>
            </table>
           
        </form>
    </div>
    <?php
                //Select from the employee table
                $select="select * from department";
                $run_select=mysqli_query($con, $select);
                //Count all entries
                $count=mysqli_num_rows($run_select);
                $num=1;
                ?>
                <div>
                    <div id="printoption">
    <h2 style="margin-top:50px; color:black; margin-left:20px;">Total Registered Departments: <?php echo $count?> </h2>
    <br>
    <div style="color:black; float:right; margin-right:100px; margin-bottom:20px; margin-top:-20px;">
    </div>
    
    <table id="employeetable" style="background-color:white;">
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Abbreviation</th>
                    <th>Action</th>
                    
                </tr>
               <?php
        //fetch values from the database table
        while($rows=mysqli_fetch_array($run_select)){
        ?>
<tr>
    <td><?php echo $num; ?></td>
    <td><?php echo $rows['dept_name'];  ?></td>
    <td><?php echo $rows['dept_abbr'];  ?></td>
    <td><a style=" font-weight:bold; background-color:#2b6777; color:black; text-decoration:none; padding:10px;" href="../action.php?directeditdept=<?php echo $rows['dept_name'];  ?>" >Edit</a></td>

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