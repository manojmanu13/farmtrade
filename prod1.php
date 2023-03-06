<?php
		require_once("connection.php");

		if(isset($_POST['submitform']))
		{
			$dir="upload/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];
            // $username=$_Get['username'];
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
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #6CAB36;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
* {
  box-sizing: border-box;
  
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 30px;
  border:1px solid #ddd;
  border-radius: 10px;
}
.column img{
padding:20px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the buttons */

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the buttons */

.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #666;
  cursor: pointer;
  border-radius: 10px;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color:#6CAB36;
  color: white;
}
.btn.atv {
  background-color:#6CAB36;
  color: white;
  padding: 12px 16px;
}
.btn.atv:hover {
  background-color: #666;
}

</style>
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

			<!--<div>
						<h1>File Upload with PHP and MySQLI</h1>

						<form action="" method="post" enctype="multipart/form-data">
							
							Upload Images/File : <input type="file" name="uploadfile">

						   </br>
						   
						    <button type="submit" name="submitform">Upload</button>
						</form>
			</div>
-->

			<div>
					<h2>all crops </h2>
<div id="btnContainer">
   <button class="btn active" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn " onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
 <br><br><br>
</div>
					
  
  
					<?php
							$i=1;
							$sql="select * from `prod`";
							$qry=mysqli_query($con,$sql) or die(mysqli_error($con));

							while($row=mysqli_fetch_array($qry))
							{

					?>
					
</div>



  
  
					<div class="row">
  <div class="column" style="background-color:;">
   <img src="upload/<?php echo $row['image'];?>" width="250" height="250" align="left" clear="left">
     <!-- <h1><?php  echo $i;?> </h1>-->
	<h3>&emsp;&emsp;&emsp;&emsp;Manure/Seeds Name: <?php echo $row['prodname'];?> </h3>
	
	<h3>&emsp;&emsp;&emsp;&emsp;Address: </h3><p><?php echo $row['adrs'];?> </p>
	
	<h3>&emsp;&emsp;&emsp;&emsp;Owner Name: <?php echo $row['userid'];?> </h3>
	<!--
	<h4 >&emsp;&emsp;&emsp;&emsp;Details: </h4><br><p><?php echo $row['details'];?> </p>
	-->
	<br><br>
	<center>
	<button class="btn active"onclick="myFunction()">View Details</button>
  </center>
  
  
  
  
  
  
					<!--<img src="upload/<?php echo $row['file'];?>" width="500" height="500">
   
     <h1><?php  echo $i;?> </h1>
	<h2><?php echo $row['username'];?></h2>
	
  <button class="btn atv" 	>Contact </button> 
  
							<tr>
									<td><?php  echo $i;?></td>
									<td><img src="upload/<?php echo $row['file'];?>" width="500" height="500"></td>
									<td><?php echo $row['username'];?> contact<td>
									<td><input type="submit" name="show" id="show" value="Upvote"><p class='id-img'></td>
							</tr> -->
							
							<script>
$('.spimg').on('click',function(){
   
  $(this).next('no').text($no);
});
</script>

				 <?php
				 			$i++;
				 		}
				 ?>
				 
					</table>
			</div>
<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
	
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<script>
function myFunction() {
  alert("Please login to check the details");
}
</script>
</body>
</html>