
<?php
//Start of session, the session will include all the created sessions
session_start();
unset($_SESSION['adminum']);//destroy user session
header("Location:../login.php"); //redirect user 
?>