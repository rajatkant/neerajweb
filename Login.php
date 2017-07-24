<html>
<body>
<?php
include("DBConnection.php");
session_start(); //It is advised to open a session in the beginning
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
if (empty($_POST['username']) || empty($_POST['password'])) //This is the way to validate inputs using PHP code but here we are using javascript validations so it is not necessary 
{
echo "Please enter the correct Username and Password";
header("location: LoginForm.php");//You will be sent to Login.php for re-login
} 
$usernameLogn = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[]
$passwordLogin = $_POST["password"];
$myusername = stripslashes($usernameLogn); // stripslashes() is used to clean up data retrieved from an HTML form
$mypassword = stripslashes($passwordLogin);
$myusername = mysqli_real_escape_string($db,$_POST['username']); // Escapes special characters in a string for use in an SQL statement
$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
$query = "SELECT * FROM users WHERE username = '$myusername' and password = PASSWORD('$mypassword')"; //Fetching all the records with input credentials
$result = mysqli_query($db,$query);
$count = mysqli_num_rows($result);
if($count == 1)
{
$_SESSION['username']=$myusername; //Storing the username value in session variable so that it can be retrieved on other pages 
//Optional code - if you want to maintain records of logged in users, use following two lines
$qry = "UPDATE users SET logged_in=1, last_login=CURRENT_TIMESTAMP() WHERE username ='$myusername'"; // to maintain Logged-in Status
$res = mysqli_query($db,$qry);
mysqli_close($db); //To close MySQL database connection
header("location: UserProfile.php"); // user will be taken to profile page
}
else
{
echo "<br>Incorrect username or password"; 
?>
<br><a href="LoginForm.php">Try Login</a>
<?php 
} 
}
?>
</body> 
</html>
