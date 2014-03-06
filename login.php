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
    <link rel="stylesheet" type="text/css" href="css/style3.css" />

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
        		<li><a href="about_us.php">About Us</a></li>
        		<!---logout function-->
        		<?php 
					if(isset($_SESSION['username'])){
						echo "<li><a href='logout.php'>Logout</a></li>";
					}
					else{
						echo "<li><a class='current' href='login.php'>Login</a></li>";
					}
				?>
            	<li><a href="index.php">Home</a></li>
            </ul>    	
        </div>
	</div>
<!--end page header-->	
	
	<div id="container_demo" >
		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        
        <!--login form-->
    	<div id="wrapper">
           
        	<div id="login" class="animate form">
            	<form  action="check_login_register.php" method="post">
            	<?php
            		if(isset($_SESSION['username'])){
            			echo'<h1> '.$_SESSION['username'].' you already logged in </h1>';
            		}
					else{
						echo '<h1>Log in</h1>'; 
                	
                		if($_GET["login_fail"] && $_GET["login_fail"]==1){
                			echo '<p class="login_fail">Authentication Failed</p>
                			      <p class="login_fail">Please enter your username and password.</p>';
                		}
                		
						//show login form         
                    	echo '<p> 
                    			<label for="username" class="uname" data-icon="u" > Your email or username </label>
                        		<input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                    		  </p>
                    		  <p> 
                        	  	<label for="password" class="youpasswd" data-icon="p"> Your password </label>
                        		<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                    		  </p>
                    		  <p class="login button"> 
                    		  	<input type="submit" value="Login" /> 
							  </p>
                    		  <p class="change_link">
								Not a member yet ?
							  	<a href="register.php" class="to_register">Join us</a>
							  </p>';
					}
				?>	 
                	
                </form>
            </div>
		</div>
		<!--end login form-->
		
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

