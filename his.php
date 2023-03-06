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
 $username=$_Get['username'];
			
			 $userid=$_GET["username"];
			 
			$userid=$_POST["userid"];
			
		$sql ="SELECT * FROM crop WHERE userid='$userid'";
		$result = mysql_query($sql) or die(mysql_error());
        $numrows = mysql_num_rows($result);
		mysql_query($sql) or die(mysql_error());
mysqli_query($con,$query) or die(mysqli_error($con));
		?>
<html>
<script type="text/javascript">
window.setTimeout("location=('mainfunctions/SessionExpire.html');",600000);
</script>
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<head>
<link rel="stylesheet" href="admin.css">
<title>Inventory | Home Page</title>
<?php if (isset($_SESSION['user']))
    echo strtoupper("". $_SESSION['user']); ?></p>
<?php	//$user = $_SESSION['user'];
	//echo strtoupper("$user");
?>
<?php include 'user/user.php'; ?>
<body align="center" >
<style>
body {
  background-image: url("images/home.png");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<div class="navbar">
<a><img src="images/logo2.png" width="" height=""></a>
  <a href="http://demoportal.net/index0.php"><img src="images/hh1.jpg" width="30" height="30"></a>
</div>
</head>
<html>
<body>
<article>
      <tbody>
        
			<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
		
		
	</head>
		<header>
			<h1>Invoice History</h1>
			<address contenteditable>
				<p>CME-Christ University</p>
				<p>Block II, 2nd floor<br>koramangala, bangalore</p>
				<p>8892599791</p>
			</address>
			<span><img alt="Inventory Easy" src="images/logo2.png" height="25%"></span>
		</header>  
			<div>  
            <form align="center">
<div class="left_info">
		<table>
		
	      <br>
	      
		</table>
		</div>	
<table class="neta">
<?php
          while( $row = mysql_fetch_assoc( $result ) ){
	    ?>
		<form align="center" action="http://demoportal.net/first2.php" method="post">
		        <tr>
					<th><span >Vendor</span></th>
					<td><input value="<?php echo $row['userid'];?>"  name="userid"></td>
				</tr>
				<tr>
					<th><span >Contact</span></th>
					<td><input value="<?php echo $row['cropname'];?>"  name="cropname"></td>
				</tr>
		</table>		
			<!--<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span>01</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><?php $today = date("d M Y"); ?>
					<?php echo "<font color= 'blue'> $today </font>" ?>
<br>	
<!--<?php echo " $today " ?>-->
					</span></td>
				</tr>
			</table>-->
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Item</span></th>
						<th><span >Description</span></th>
						<th><span >Rate</span></th>
						<th><span >Quantity</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
				<?php
				for($i=0; $i<$numrows;$i++)
				{
				?>
				
					<tr>
						<td><a class="cut">-</a><input contenteditable placeholder='Product code' value="<?php echo $row['Item'];?>" name="Item"  type="text"/></td>     
						<td><input contenteditable placeholder='Details' value="<?php echo $row['Description'];?>" name="Description"  type="text"/></td>
						<td></span><input contenteditable placeholder='Rate' value="<?php echo $row['Rate'];?>" name="Rate"  type="text"/></td>
						<td><input contenteditable placeholder='Quantity' value="<?php echo $row['Quantity'];?>" name="Quantity"  type="text"/></td>
						<td><input contenteditable placeholder='Price' value="<?php echo $row['Price'];?>" name="Price"  type="text"/></td>
					</tr>
				
                <?php	
				}
				?>
         <?php
        }
        ?>
				</tbody>
			</table>
			<a class="add">+</a>
			 <div class="left_btn">
      		<button class="mah_btn" type="submit" name="submit">Save</button>
      		<button class="mah_btn" onClick="window.location.reload();return false;">Reset</button>
			<button class="mah_btn" onClick="window.print();return false;">Print</button>
      </div>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
		
    </script>

					<td><span data-prefix>Rs</span><span>600.00</span></td>
				</tr>
			</table>
			<br style="clear: both;" /><p>&nbsp;</p>
		</article>
		</form>
</div>
      </tbody>
    </body>
    </html>