<?php 
session_start();
include('connectDB.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Movie Reviews</title>
	<meta name="author" content="Administrator" />
<!--load logo-->		
	<link rel="shortcut icon" href="images/web_logo.png" /> 
<!--load css-->		
	<link rel="stylesheet" href="css/page_style.css" type="text/css" />

</head>
	
<body>

<div id="main">
<!--start page header-->	
	<div id="header">
		
		<!--load logo--> 
		<a href="index.php">
			<img src="images/logo.png" id="logo_title">
		</a>
		
		<!--show search box--> 
        <div id="search_box">
        	<form method="post" action="search.php" id="search">
  				<input name="search_name" type="text" size="40" placeholder="Search Movies" />
			</form>
			<!--show username after login--> 
			<p class="helow_user">
				<?php 
					if(isset($_SESSION['username'])){
						echo 'hello!&nbsp;&nbsp;&nbsp;'.$_SESSION['username']; 
					}
				?>
			</p>
        </div>       
        
        <!--show menu--> 
        <div id="menu">
        	<ul>
        		<li><a class="current" href="about_us.php">About Us</a></li>
        		<!---logout function-->
        		<?php 
					if(isset($_SESSION['username'])){
						echo "<li><a href='logout.php'>Logout</a></li>";
					}
					else{
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
            	<li><a href="index.php">Home</a></li>
            </ul>    	
        </div>
	</div>
<!--end page header-->	
	
	<div id="main_body">
		<div class="box">
			<div id="about_title">
				<h1>About Us</h1>
			</div>
			
			<h1 id="about_name">Cheng Jingwen</h1>
			<p>Tel:(+358)406784734</p>
			<p>Email: jcheng@student.oulu.fi</p>
		</div>
	</div>
	
</div>
<p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>
<p>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Valid CSS!" />
</a>
</p>
</body>
</html>

