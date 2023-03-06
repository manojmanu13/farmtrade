<html>
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $phonenumber= $address = "";
$username_err = $password_err = $confirm_password_err = $phonenumber_err = $address_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
	//validate phonenumber
    if(empty(trim($_POST["phonenumber"]))){
		$phonenumber_err ="please enter valid phonenumber.";
	}
        elseif(strlen(trim($_POST["phonenumber"]))<10){
	    $phonenumber_err="phonenumber must have 10 characters.";
      }else{
	  $phonenumber=trim($_POST["phonenumber"]);
    }
	//validate address
	if(empty(trim($_POST["address"]))){
		$address_err ="please enter valid address.";
	}
        elseif(strlen(trim($_POST["address"]))<2){
	    $address_err="please enter your address.";
      }else{
	  $address=trim($_POST["address"]);
	  }
	  
    // Validate confirm password
    /*if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    /
    /*/ // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($phonenumber_err) && empty($address_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, phonenumber, address) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password,$param_phonenumber,$param_address);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //$param_password =$password;
		   $param_phonenumber= $phonenumber;
			$param_address=$address;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
    <link rel="stylesheet" type="text/css"  href="styles/bootstrap-337.min.css" /></link>
    <link rel="stylesheet" type="text/css"  href="font-awsome/css/font-awesome.min.css" /></link>
	<link rel="stylesheet" type="text/css"  href="styles/bootstrap-337.min.css" /></link>
    <link rel="stylesheet" type="text/css"  href="font-awsome/css/font-awesome.min.css" /></link>
<style>
.btn.atv {
  background-color:#6CAB36;
  color: white;
  padding: 12px 16px;
}
.navvbar {
    overflow: hidden;
    background-color: #6CAB36;
    /*font-family: fantasy;*/
	padding-left:450px;
	color: white;
	font-family: "Lato", sans-serif;
	box-shadow: 2px 2px 2px grey;
}

.navvbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	
	
	
}

.dropdowwn {
    float: left;
    overflow: hidden;
	
}

.dropdowwn .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
	box-shadow: 2px 4px 4px #000000;
	
}

.navvbar a:hover, .dropdowwn:hover
 .dropbtn {
    box-shadow: 2px 4px 4px #000000;
	background-color: #387180;
	
}

.dropdowwn-content {
    display: none;
    position: absolute;
    background-color: #387180;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	box-shadow: 2px 4px 4px #000000;
}

.dropdowwn-content a {
    float: none;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	
}

.dropdowwn-content a:hover {
    background-color: #6CAB36;
	
}

.dropdowwn:hover .dropdowwn-content {
    display: block;
}


input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  padding-right:30px;
}


input[type=text]:focus {
  width: 40%;
}
</style>
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


</div>
<img src="images/logo3.jpg" width="170" height="80" ALIGN="left" clear="left"> <center>
</div>
<br>
<br><br>
<br><br>
<br>
<center><!-- center Begin-->
                 
              <h2>Register a new account</h2>   
                  
                   
                   
                   
                   
                 
                 
                 <center> <!-- center Finish-->
                
                    
					
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($phonenumber_err)) ? 'has-error' : ''; ?>">
                <label>Your Contact Number</label>
                <input type="text" name="phonenumber" class="form-control" value="<?php echo $phonenumber; ?>">
                <span class="help-block"><?php echo $phonenumber_err; ?></span>
            </div>
			
			
			<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Your Contact Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>
			
			
			
            <!--<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"> <?php echo $confirm_password_err; ?> </span>
            </div>-->
			
			
                    	
                    
                    
                     
                      <div class="form-group">
                <input type="submit" class="btn atv" value=" Register">
              
            </div>
                        <br><br><br>
                  
                 
                 
                 
                 </form><!-- Form Finish-->
                
                
                </div><!-- Box-header Finish-->
                
                
                
                
                
            </div><!-- Box Finish-->
            
            
            
        </div><!-- col-md-9 Finish-->
        
        </div><!-- container Finish-->
        
    </div><!--#content Finish-->
		   </body>
		   </html>