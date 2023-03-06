<!DOCTYPE html>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
//$host="localhost"; // Host name
//$username="root"; // Mysql username
//$password="Secret@321"; // Mysql password
//$db_name="inventory"; // Database name
//$tbl_name="customer"; //Table name

// Connect to server and select databse.
//mysql_connect("$host", "$username", "$password")or die("can't establish connection with db");
//mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
//$myusername=$_POST ['username'];
//$myusername = $_SESSION['user'];
//$mypassword=$_POST ['password'];
//$cname=$_POST['CName'];
//$userid=$_POST['userid'];
//To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);
 require_once("connection.php");
 //$username=$_Get['username'];
			
	//		 $userid=$_GET["username"];
			 
		//	$userid=$_POST["userid"];
			
		//$query ="SELECT * FROM crop WHERE userid='$userid'";
		//$result = mysql_query($sql) or die(mysql_error());
        //$numrows = mysql_num_rows($result);
		//mysql_query($sql) or die(mysql_error());
//mysqli_query($con,$query) or die(mysqli_error($con));
		?>
		<?php
		require_once("connection.php");

		if(isset($_POST['submitform']))
		{
			$dir="upload/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];
            // $username=$_Get['username'];
			$username=$_Get['username'];
			
			 $userid=$_GET["username"];
			 
			$userid=$_POST["userid"];
			
			
			if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}

				$query="insert IGNORE into `crop` (`id`,`file`) values ('','$image')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				echo "File Uploaded Suucessfully ";

		}

?>
	<html>	
	<head>
	
	</head>
	<body>
	
		<?php
							$i=1;
							$sql ="SELECT * FROM crop WHERE userid='$userid'";
							//$sql="select * from `crop`";
							$qry=mysqli_query($con,$sql) or die(mysqli_error($con));

							while($row=mysqli_fetch_array($qry))
							{

					?>
					
					<img src="upload/<?php echo $row['image'];?>" style="width:100%">
  <h1>NAME: <?php echo $row['name'];?></h1>
  
  <p><b>Place: </b><?php echo $row['place'];?></p>
  <p><b>Phonenumber:</b> <?php echo $row['phonenumber'];?></p>
  <p ><b>About: </b><?php echo $row['about'];?></p>
  
  <?php
				 			$i++;
				 		}
				 ?>
				 
					</body>
					
					</html>