<?php
require_once("connection.php");


		

		

		if(isset($_POST['submitform']))
		{
			
             $username=$_Get['username'];
			
			 $userid=$_GET["username"];
			 
			$userid=$_POST["userid"];
			
			$place=$_POST['place'];
			
             $name=$_POST["name"];
			$about=$_POST["about"];
			$phonenumber=$_POST["phonenumber"];
			   
				$query="insert IGNORE into trader (userid,name,about,phonenumber,place) values ('$userid','$name','$about','$phonenumber','$place')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				
                // Redirect to login page
                header("location: rtr.php");
						

		}

?>
<!DOCTYPE html>
<html>
<head>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" type="text/css"  href="styles/minsty.css" /></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css"  href="styles/minsty.css" /></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
	<title>File Upload to Database</title>
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
      <a href="prod1.php">manure/seeds
</a>
      <a href="dis.php">fruits/vegetables
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
  <a href="tr.php">Trader</a>
  <a href="regst.php">Register</a>
  <a href="login.php">login</a>


</div></div><br><br><br><a href="index.html">
<img src="images/logo4.png" width="170" height="80" ALIGN="left" clear="left"> </a>



<br><br><br><br><br><br><br><br><br><br>





<html>
<head>

<style>
/* Create two equal columns that floats next to each other */
.column {
 

}




.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 max-width: 33%;
  margin: auto;
  text-align: center;
  font-family: arial;
  float:left ;
   padding: 10pt 10pt 10pt 10pt;
  
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #6CAB36;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}


</style>
</head>
<body>
<?php
							$i=1;
							$sql="select * from `trader`";
							$qry=mysqli_query($con,$sql) or die(mysqli_error($con));

							while($row=mysqli_fetch_array($qry))
							{

					?>
<!--<h2 style="text-align:center">User Profile Card</h2>-->
<div class="row">
  <div class="column" style="background-color:;">
<div class="card">
  <img src="upload/<?php echo $row['image'];?>" width="450" height="400" ">
  <h1>NAME: <?php echo $row['name'];?></h1>
  
  <p><b>Place: </b><?php echo $row['place'];?></p>
  <p><b>Phonenumber:</b> <?php echo $row['phonenumber'];?></p>
  <p ><b>About: </b><?php echo $row['about'];?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  
  <p><button></button></p>
  <p><button></button></p>
</div></div>
<?php
				 			$i++;
				 		}
				 ?>
				 
</body>
<script>
// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}
</script>
</html>
