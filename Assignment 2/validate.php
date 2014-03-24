<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 	page loaded
<?php
    echo ("potatoe");
	$host="localhost"; // Host name 
	$username="Admin"; // Mysql username 
	$password="admin"; // Mysql password 
	$db_name="Users"; // Database name 
	$tbl_name="admin"; // Table name 
	
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	// username and password sent from form 
	$myusername=$_POST['usernametxt']; 
	$mypassword=$_POST['passwordtxt']; 
	
	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
	
	// Register $myusername, $mypassword and redirect to file ".php"
	session_register("myusername");
	session_register("mypassword"); 
	header("location:index.html");
	}
	else {
	echo "Wrong Username or Password";
	}
?>
</body>
</html>