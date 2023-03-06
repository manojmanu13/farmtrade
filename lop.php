<?php
$username="root"; // Mysql username
$password=""; // Mysql password
$host="localhost"; // Host name
$db_name="example1"; // Database name
$tbl_name="ex1"; // Table name

//MySQL_connect("$host", "$username", "$password")or die("cannot connect");
//MySQL_select_db("$db_name")or die("cannot select DB");
// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("can't establish connection with db");
mysqli_select_db($con,"$db_name")or die("cannot select DB($con)");

// username and password sent from form
//$myusername=$_POST ['username'];
//$myusername = $_SESSION['user'];
//$mypassword=$_POST ['password'];
$username=$_POST['username'];
$password=$_POST['password'];


$sql = "SELECT * FROM $tbl_name WHERE username = '$username' AND password = ('$password')";
$result = mysqli_query($sql,$c) or die(mysqli_error($sql));
$numrows = mysqli_num_rows($result,$c);



if($numrows == 1)
{
		header("location:index.html");
		}

else {
     
	echo "<script> alert('Wrong Username or Password'); 
    window.location='index.html';
    </script>";
	}

?>