<!DOCTYPE html>
<?php
//Initialize the session
session_start();
 
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<?php
require_once("connection.php");


		

		

		if(isset($_POST['submitform']))
		{
			$dir="upload/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];
             
			 $username=$_Get['username'];
			
			 $userid=$_GET["username"];
			 
			$userid=$_POST["userid"];
			
			$adrs=$_POST['adrs'];
			
             $cropname=$_POST["cropname"];
			$details=$_POST["details"];
			if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}

			   
				$query="insert IGNORE into crop (userid,cropname,image,details,adrs) values ('$userid','$cropname','$image','$details','$adrs')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				
                // Redirect to login page
                header("location: crop.php");
						

		}

?>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" type="text/css"  href="styles/minsty.css" /></link>

<link rel="stylesheet" href="css/style.css">


<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color:     ;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<div id="topp-shadow"></div>
<div id="topp">
<div class="navvbar">
  <a href="index2.php">Home</a>
  
  <div class="dropdowwn">
    <button class="dropbtn">Buy 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdowwn-content">
      <a href="#">manure/seeds</a>
      <a href="veg.php">fruits/vegetables
</a>
    </div>
  </div> <div class="dropdowwn">
    <button class="dropbtn">Sell 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdowwn-content">
      <a href="crop.php">product</a>
      <a href="#">Machine</a>
    </div>
  </div> 
  <a href="ongoing2.html">Ongoing Prices</a>
  <a href="#home">Trader</a>
  
  <a href="logout.php">logout</a></div></div>
<br><br><a href="index.html">
<img src="images/logo3.jpg" width="170" height="80" ALIGN="left" clear="left"> 

</a>
<br><br><br><br><br><br><br><br><br>

<!--<p>Resize the browser window to see the effect. When the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other.</p>
-->
<h2> fill the form </h2>
<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
  <!--<div class="row">
    <div class="col-25">
	
      <label for="username">username</label>
    </div>
    <div class="col-75">
      <input type="text" id="username" name="username" placeholder="Your usernamename..">
    </div>
  </div>-->
  <div class="row">
    <div class="col-25">
	
      <label for="username">username</label>
    </div>
    <div class="col-75">
     <input readonly type="text" id="userid" name="userid"  value="<?php echo htmlspecialchars($_SESSION["username"]); ?> ">
    </div>
  
  </form>
</div>
<?php
require_once("connection.php");

 
							$i=1;
							 $sql ="SELECT * FROM crop WHERE userid='".$_SESSION['username']."'";
							
							$qry=mysqli_query($con,$sql) or die(mysqli_error($con));

							while($row=mysqli_fetch_array($qry))
							{

					?>
					
</div>



  
  
					<div class="row">
  <div class="column" style="background-color:;">
   <img src="upload/<?php echo $row['image'];?>" width="250" height="250" align="left" clear="left">
     <!-- <h1><?php  echo $i;?> </h1>-->
	<h3>&emsp;&emsp;&emsp;&emsp;Crop Name: <?php echo $row['cropname'];?> </h3>
	
	<h3>&emsp;&emsp;&emsp;&emsp;Address: </h3><p><?php echo $row['adrs'];?> </p>
	
	<h3>&emsp;&emsp;&emsp;&emsp;Owner Name: <?php echo $row['userid'];?> </h3>
	
	<h4 >&emsp;&emsp;&emsp;&emsp;Details: </h4><br><p><?php echo $row['details'];?> </p>
	</div>	
	<?php
				 			$i++;
				 		}
				 ?>
  
</body>
</html>