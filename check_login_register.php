<?php 
session_start();
include('connectDB.php'); 

//check the post data for login.
if($_POST["username"] && $_POST["password"]){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$password2 = $_POST["password"];
	
	//check admin or user
	if(($username == "admin") && ($password2 == "secret")){
		$_SESSION['username']= "admin";
		header('Location:table/index.php');
	}
	else{
		//check the username and password from db
		//$db=connectDBRead();
		$sql="SELECT * FROM filmmembers WHERE name = '$username' AND PASSWORD = '$password'";
		//	$file = mysql_query($sql,$db);
		$file=mysql_query($sql, $conn);
		$row=mysql_fetch_array($file);
		
		//check the username and insert error message
		//$db=connectDBRead();
		$sql_name="SELECT * FROM filmmembers WHERE name = '$username'";
		//	$file_name = mysql_query($sql_name,$db);
		$file_name=mysql_query($sql_name, $conn);
		$row_name=mysql_fetch_array($file_name);
		
		if($row["memberID"]){
			$_SESSION['username']= $username;
			header('Location:index.php');
		}
		else{
			//wrong password
			if($row_name["memberID"]){
				$timestamp = date("Y-m-d H:i:s",time());
				$message = "User: $username with wrong password.";
				mysql_query("insert into filmerrors (errorID,timestamp,message) values ('','$timestamp','$message')");
			}
			//wrong username and wrong password
			else{
				$timestamp = date("Y-m-d H:i:s",time());
				$message = "Login Failed: Usernam-$username / Password-$password2.";
				mysql_query("insert into filmerrors (errorID,timestamp,message) values ('','$timestamp','$message')");
			}
			header('Location:login.php?login_fail=1');
		}
	}	
}
//check the post data for register.
else if($_POST["usernamesignup"] && $_POST["emailsignup"] && $_POST["passwordsignup"]){
	$username = $_POST["usernamesignup"];
	$password = md5($_POST["passwordsignup"]);
	$email = $_POST["emailsignup"];
	
	//check the username is already taken or not 
	//$db=connectDBRead();
	$sql="SELECT * FROM filmmembers WHERE name='$username'";
	//	$file = mysql_query($sql,$db);
    $file=mysql_query($sql, $conn);
    $row=mysql_fetch_assoc($file);
	if($row["memberID"]!=$user_pwd){
     	header('Location:register.php?register_fail=1');
	}
	else{
		mysql_query("insert into filmmembers (memberID,name,email,password) values ('','$username','$email','$password')");
		$_SESSION['username']= $username;
		header('Location:index.php');
	}

}
else{
	//jump to index.php
	header('Location:index.php');
}
?>