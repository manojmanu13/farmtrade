<html>
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="images/logo1.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarmTrade</title>
    <link rel="stylesheet" type="text/css"  href="styles/bootstrap-337.min.css" /></link>
	<link rel="stylesheet" type="text/css"  href="styles/minsty.css" /></link>

    <link rel="stylesheet" type="text/css"  href="font-awsome/css/font-awesome.min.css" /></link>
<link rel="stylesheet" type="text/css"  href="styles/style.css" /></link>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div id="topp-shadow"></div>
<div id="topp">
<div class="navvbar">

  <a href="index.html">Home</a>
  
  <div class="dropdowwn">
    <button class="dropbtn">Buy 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdowwn-content">
      <a href="dis.php">manure/seeds
</a>
      <a href="farpg.html">fruits/vegetables
</a>
    </div>
 <!-- </div> <div class="dropdowwn">
    <button class="dropbtn">Sell 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdowwn-content">
      <a href="#">product</a>
      <a href="#">Machine</a>
    </div>-->
  </div> 
  <a href="ongoing.html">Ongoing Prices</a>
  <a href="#home">Trader</a>
  <a href="regst.php">Register</a>
  <a href="login.php">login</a>

<!--<form align="right">
  <input type="text" name="searchh" placeholder="Search..">
</form> -->

</div></div>



<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #6CAB36;
  overflow-x: hidden;
  padding-top: 20px;
  box-shadow: 2px 2px 2px grey;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #f1f1f1;
  display: block;
}

.sidenav a:hover {
  color: black;
}

.main {
  margin-left: 250px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<br><br><br><br>
  &emsp;&emsp;&emsp;&emsp;
<div class="sidenav" style="display:none" id="mySidenav">
<button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()"><br><br><br>Close &times;</button>
  <a href="profile2.php"><i class="fa fa-fw fa-user"></i> Profile</a><br>
 
  <a href="rtr.php"><i class="fa fa-fw fa-registered"></i> Register as Trader</a><br>
  <a href="his1.php"><i class="fa fa-fw fa-history"></i> History</a><br>
  
  <a href="cont.html"><i class="fa fa-fw fa-address-book"></i> Contact</a>
</div></div>

<div id="main">

<div class="w3-teal">
  <button id="openNav"  onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Fill the form to register as trader</h1>
	
  </div>
</div>









</body>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "26%";
  document.getElementById("mySidenav").style.width = "25%";
  document.getElementById("mySidenav").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidenav").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</html>



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
			
			$place=$_POST['place'];
			
             $name=$_POST["name"];
			$about=$_POST["about"];
			$phonenumber=$_POST["phonenumber"];
			   if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}
				$query="insert IGNORE into trader (userid,name,about,phonenumber,place,image) values ('$userid','$name','$about','$phonenumber','$place','$image')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				
                // Redirect to login page
                header("location: rtr.php");
						

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
<h2> fill the form to sell your crop</h2>
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
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="name">Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
     <label for="place">place</label>
    </div>
    <div class="col-75">
  
     <input  type="text" id="place" name="place"  placeholder="Your place... "> 
	 </div>
  </div>
  <div class="row">
    <div class="col-25">
     <label for="phonenumber">Phonenumber</label>
    </div>
    <div class="col-75">
  
     <input  type="text" id="phonenumber" name="phonenumber"  placeholder="Your phonenumber... "> 
	 </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="image">image</label>
    </div>
    <div class="col-75">
      <input type="file" id="image" name="uploadfile" placeholder="Your crop name..">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-25">
      <label for="about">Details</label>
    </div>
    <div class="col-75">
      <textarea id="about" name="about" placeholder="Write about you.." style="height:200px"></textarea>
    </div>
  
  <br><br>
  <input type="submit" name="submitform" value="submit">
 </div>
  </div>
  <br><br><br><br><br><br><br><br><br>
  <!--<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
  --></form>
</div>

</body>
</html>

