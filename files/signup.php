<!-- document type declaration-->
<!DOCTYPE html>
<!--start of php-->
<?php
//database connection string
        $server="localhost"; //hosted in your local device
        $username="finalproject"; //user account
        $DBpassword="81dc9bdb52d04dc20036dbd8313ed055"; //password to the user account
        $database="lms"; //database name
        //database connection statement
        $con=mysqli_connect("$server","$username","$DBpassword","$database");
        //for the emplloyee number autoincrement
        $emp_select="select * from employee order by employee_number desc limit 1";
        $runemp_select=mysqli_query($con, $emp_select);
        //fetch values from database
        $rows=mysqli_fetch_array($runemp_select);
        //fetch the last employee number 
        $lastid=$rows['employee_number'];
        //split the employee number into string and number. extract the part of string after position 3
        $emp_num=substr($lastid,3); 
        //return the integer form of the variable
        $emp_num=intval($emp_num);
        //joins the EMP to the empnumber +1
        $emp_num="EMP".($emp_num+1); //combine the two strings
 
        //PHP CODE INSERT EMPLOYEE
               //on button click
               if(isset($_POST['signup'])){
                //mysqli_real_escape_string escapes special characters in a string for use in an SQL query
                //used before inserting value to the database as removes any special characters that may interfere with the query operations
                //textboxes values ike <script> tag</script> it reads a script tag as an input but not a code.removes the special character
               $empnumber=mysqli_real_escape_string($con, $_POST['empnumber']);
               $fname=mysqli_real_escape_string($con, $_POST['fname']);
               $oname=mysqli_real_escape_string($con, $_POST['oname']);
               $idnumber=mysqli_real_escape_string($con, $_POST['idnumber']);
               $phonenumber=mysqli_real_escape_string($con, $_POST['phonenumber']);
               $email=mysqli_real_escape_string($con, $_POST['email']);
               $gender=mysqli_real_escape_string($con, $_POST['gender']);
               //strtotime converts the inputted date into unix timestamp
               $dob=mysqli_real_escape_string($con, date('Y-m-d',strtotime($_POST['dob'])));
               $marital=mysqli_real_escape_string($con, $_POST['marital']);
               $pass1=mysqli_real_escape_string($con, $_POST['password1']);
               $pass2=mysqli_real_escape_string($con, $_POST['password2']);
               //image upload
               //$_file is a global variable ued to fetch uploaded files in a form
               //name is that of the actual file before submission 
               $profile=$_FILES['profile']['name']; //get the textbox name for the image
               $profile_tmp=$_FILES['profile']['tmp_name']; //temporary name for the image
               $folder="assets/profile_images/"; //folder to store the images
               //move the uploaded file to the new folder above
               move_uploaded_file($profile_tmp, $folder.$profile); //move the image to the created folder
               //check if employee information are unique
               //select from employee
               $select="select * from employee where employee_number='$empnumber'|| emp_email='$email'";
               $runselect=mysqli_query($con, $select);
               //count the number of entries
               //msqli_num_rows returns the number of rows of a return set
               $checkemployee = mysqli_num_rows($runselect);
               //if employee exists
               if($checkemployee>0){
                   //display message and redirect user
                   echo "<script>alert('Employee with such information exists')</script>";
                   echo " <script>window.open('signup.php','_self')</script>";
               }
               //if the employee does not exists
               else{
               //check if password and confirm password are the same
               if($pass1 == $pass2){
                   //hash password using MD5 Message-Digest algorithm 5
                   $hashpass=md5($pass1);
                   //if the password are the same insert into the table
               $insert_employee="insert into employee(employee_number,emp_email,first_name,other_name,idnumber,phone,gender,dob,marital_status,password,profile)
               values('$emp_num','$email','$fname','$oname','$idnumber','$phonenumber','$gender','$dob','$marital','$hashpass','$profile')";
               //run insert statement
               $run_insertemployee=mysqli_query($con, $insert_employee);
               if($run_insertemployee){
               //display message and redirect user
               echo "<script>alert('$fname, Added Successfully')</script>";
               echo " <script>window.open('login.php','_self')</script>";
               }
               }
               //if the passwords are not the same
               else{
               //display message and redirect user
               echo "<script>alert('Password Not Matching')</script>";
               echo " <script>window.open('signup.php','_self')</script>";       
            }
           }
       }
?>
<!--attribute used to identify the  language of the element's content. en for english and es for spanish-->
<html lang="en">
    <!--head section is the container of this page metadata-->
<head>
    <!--system title displayed on the window tab -->
    <title>LMS & PROGRESS TRACKING|SIGNUP PAGE</title>
    <style>
  *{/** general styles */
      margin:0; /** outer spacing */
      padding:0; /** inner spacing */
  }
  body{
      width:100%;
      background-color:#2b6777; /** hex color code */
  }
  /** header section **/
  .header{
  background-color: #f2f2f2;
  color:black; /** text color */
  height:70px; /** text padding height */
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
  /** sidebar section */
  .main .sidebar{
      width:25%;
      float:left;
  }
  /** sidebar links list */
  .main .sidebar li a{
  color:black;
  font-size: 20px;
  line-height: 50px;
  text-decoration: none;
  margin-left:70px;
  }
  .main .sidebar li a:hover{/** on hovering, moving the mouse on the links */
      background-color: grey;
      color:white;
      padding:10px 15px;
      text-transform: uppercase;
  }
  /** main section area */
  .main .content{
      width:75%;
      float:right;
  }
  .mainpage{
      margin-top:50px;
      background:white;
  }
  /** form section */
  .forms label{
      font-size: 10px;
      margin-left:30px;
  }
  /** form input section */
  .forms input{
      width:80%;
      margin-bottom:20px;
      height:40px;
      margin-left:30px;
  }
  .forms .submit{
      background-color:#2b6777;;
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

  </style>
          <!--end of style-->
    <!--javascript start-->
    <script>
            //validate date function
            //.focus highlight  or activate the textbox
            //.value gets the value of the textbox using the id
            //accepts text separated by slashes, dob must be less than today and must be numerical
        function validateDate(){
        //Getting the date Entered
        dob=document.getElementById("dob").value;
        //Whether it is of the format dd-mm-yyyy and also if it is empty
        //indxof js function search for the value - in the string. it returns -1 if the value is not present
        if(dob.indexOf("-")==-1){ //must contain the slash 
        alert("Date must be entered and of the format (dd-mm-yyy)");
        document.getElementById("dob").focus();
        return false;
        }
        //the split method divide the string into array of strings. it returns a new array using the - as the separator.
        datecomponent=dob.split("-");
        //Ensuring the date components are of correct length
        //datecomponent[0] first array element, date. datecomponent[1] is the second array element, month. and the datecomponent[2] is the third element,year.
        if(datecomponent[0].length<1 || datecomponent[1].length<1|| datecomponent[2].length<4){ //use array index
        alert("Date must be of the format (dd-mm-yyyy)");
        document.getElementById("dob").focus();
        return false;
        }
        //isnan is not number checks if the value given is a number.
        //Check is the date entered is of type integer
        if(isNaN(datecomponent[0])||isNaN(datecomponent[1])||isNaN(datecomponent[2])){
        alert("Date components must be intergers and must be of the format (dd-mm-yyyy)");
        document.getElementById("dob").focus();
        return false;
        }
        //new creates an instance of the date object.
        //compare the entered date and today
        var today=new Date(); //Todays Date
        var givendt=new Date(); //variable for getting the entered date
        givendt.setFullYear(datecomponent[2],datecomponent[1]-1,datecomponent[0]);//The function setFullYear Set the year (optionally also month and day yyyy,mm,dd)
        //Comparing the dates
        //check if the given date is greater than today's date
        if(givendt>today){
        alert("Date of Birth cannot be greater than today");
        document.getElementById("dob").focus();
        return false;
        }
        return true;
        }
        //general validate function
        function validatefunction(){
        //check for empty fields
        //.value return value of the specified element
        //.focus makes the element active or highlight
        empnumber=document.registerform.empnumber.value;
        fname=document.registerform.fname.value;
        oname=document.registerform.oname.value;
        idnumber=document.getElementById("idnumber").value;
        phonenumber=document.getElementById("phonenumber").value;
        email=document.registerform.email.value;
        gender=document.getElementById("gender").options.selectedIndex;
        marital=document.getElementById("marital").options.selectedIndex;
        profile=document.registerform.profile.value;
        password1=document.registerform.password1.value;
        password2=document.registerform.password2.value;
        //variable declaration that stores the password match string
        // var pass_match = /^[A-Za-z0-9@_#]$/;
        //employee number validation
        if(empnumber==""){ //empty employee number field
        alert("please enter the employee number"); //error message
        document.getElementById("empnumber").focus();
        return false;
        }
        //first name validation
        if(fname==""){ //first name empty field
        alert("please enter the first name field"); //error message
        document.getElementById("fname").focus();
        return false;
        }
        //other name validation
        if(oname==""){ //empty other name field
        alert("please enter the other names field"); //error message
        document.getElementById("oname").focus();
        return false;
        }
        //idnumber number validation
        if(isNaN(idnumber) || idnumber==""){ //check if the idnumber field is empty or interger
        alert("Please enter valid id number"); //error message
        document.getElementById("idnumber").focus();
        return false;
        }
        //idnumber length validation
        if(idnumber.length!=8 ){ //check the length of the idnumber field
        alert("Id Number length must be 8 characters"); //error message
        document.getElementById("idnumber").focus();
        return false;
        }
        //phone number number validation
        if(isNaN(phonenumber) || phonenumber==""){ //check if the phonenumber field is empty or integer
        alert("Please enter valid phone number"); //error message
        document.getElementById("phonenumber").focus();
        return false;
        }
        //Phone number length validation
        if( phonenumber.length!=10){ //check the length of phone number
        alert("Phone Number length must be 10 character");//error message
        document.getElementById("phonenumber").focus();
        return false;
        }
        //VALIDATE EMAIL FIELD
        if(email="" || email.indexOf("@")==-1 || email.indexOf(".")==-1){//check the email format for @, . and emptiness
        alert("Please enter a valid Email address"); //error message
        document.getElementById("email").focus();
        return false;
        }
        //gender selection validation
        if(gender==0){//check if the gender is selected
        alert("You Must Select the Gender"); //error message
        document.getElementById("gender").focus();
        return false;
        }
        //marital status selection validation
        if(marital==0){//check if marital status is selected
        alert("Please Select the Marital Status Field");//error message
        document.getElementById("marital").focus();
        return false;
        }
        //profile picture validation
        if(profile==""){//check if the profile section is uploaded
        alert("Profile Field is Required");//error message
        document.getElementById("profile").focus();
        return false;
        }
        //password validation
        if (password1== "" || password1.length < 6) { 
            alert("Password must atleast contain an uppercase,lowercase,number and any of the special symbols #,@,-");
            document.getElementById("password1").focus();
             return false; }
        
        if (password2=="" || password2.length < 6){ 
            alert("Password must atleast contain an uppercase,lowercase,number and any of the special symbols #,@,-");
            document.getElementById("password2").focus();
             return false; 
            }
        }
        
        </script>
        <!--end of javascript-->
</head>
<body>
<div class="header">
        <h2>ELM&PTS || Employee Leave Management And Progress Tracking System.</h2>
    </div>
    <!--main section-->
    <div class="main">
        <!--main content area-->
        <div class="content">
        <div class="mainpage" style="height:750px; width:850px; margin-left:-100px;">
        <form action="" class="forms" onsubmit="return validatefunction()" enctype="multipart/form-data" method="post" name="registerform">
            <br>
            <h2 style="color:#808080; margin-left:20px;">Complete this form for Member Registration</h2><br>
            <hr style="margin-top:-20px;"> <br><br>
            <table style="width:800px;">
            <!--First table row-->
                <tr>
                    <td>
                    <label for="" style="font-size:18px;">Employee Number</label><br><br>
                    <input type="text" name="empnumber" value="<?php echo $emp_num; ?>" readonly id="empnumber" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the Employee Number"><br>  
                    </td>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">First Name</label><br><br>
                    <input type="text" name="fname" id="fname" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the first name"><br>
                    </td>
                    <td style="width:266px;" >
                    <label for=""  style="font-size:18px;">Other Names</label><br><br>
                    <input type="text" name="oname" id="oname" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the other name"><br>
                    </td>
                </tr>
                <!--second row-->
                <tr><td colspan="20"><h3 style="margin-bottom:20px; margin-left:300px;"> Contact Information</h3></td></tr>

                <tr>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Phone Number</label><br><br>
                    <input type="text" name="phonenumber" id="phonenumber" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the Phone Number"><br>
                    </td>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Id Number</label><br><br>
                    <input type="text" name="idnumber" id="idnumber" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the username"><br>
                    </td>
                    <td style="width:266px;" >
                    <label for="" style="font-size:18px;">Email Address</label><br><br>
                    <input type="text" name="email"  id="email" style="border-left:0; width:200px; border-top:0; border-right:0;" style="width:200px;" placeholder="enter the Email Address"><br>
                    </td>
                </tr>
                <tr><td colspan="12"><h3 style="margin-bottom:20px; margin-left:300px;"> Other Information</h3></td></tr>
                <!--the third row-->
                <tr>

                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Gender</label><br><br>
                    <select id="gender" name="gender" style="border-left:0; margin-left:20px; border-bottom:2px solid grey; width:200px; border-top:0; border-right:0; margin-left:30px; height:35px;" >
                    <option>Choose the Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                    </td>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Marital Status</label><br><br>
                    <select id="marital" name="marital" style="border-left:0; margin-left:20px; border-bottom:2px solid grey; width:200px; border-top:0; border-right:0; margin-left:30px; height:35px;" >
                    <option value="">Choose The Marital Status</option>
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>
                </select><br>
                    </td>
                    <td style="width:266px;" >
                    <label for="" style="font-size:18px;">Date Of Birth</label><br><br>
                    <input type="text" name="dob" placeholder="dd-mm-yyyy" onmouseout="validateDate()" style="border-left:0; width:200px; border-top:0; border-right:0;" id="dob">
                    </td>
                </tr>
                <!--Login Credentials-->

                <tr><td colspan="12"><h3 style="margin-bottom:20px; margin-top:10px; margin-left:300px;">Login Credentials Information</h3></td></tr>

                <tr>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Profile Picture</label><br><br>
                    <input type="file" name="profile"  style="border-left:0; width:200px; border-top:0; border-right:0;" id="profile"><br>
                    </td>
                    <td style="width:266px;">
                    <label for="" style="font-size:18px;">Password</label><br><br>
                    <input type="password" name="password1" id="password1" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="enter the password"><br>
                    </td>
                    <td style="width:266px;" >
                    <label for="" style="font-size:18px;">Confirm Password</label><br><br>
                    <input type="password" name="password2" id="password2" style="border-left:0; width:200px; border-top:0; border-right:0;" placeholder="confirm the password"><br>
                    </td>
                </tr>
            </table>
           
            <input type="submit" class="submit" style="width:230px; margin-top:20px;" name="signup" value="Create An Account">
            <p>Already Have An Account<a href="login.php"> Login Here.</a></p>
        </form>
    </div>
        </div>
    </div>
</body>
</html>