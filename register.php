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
    <link rel="stylesheet" type="text/css" href="css/style4.css" />

</head>
	
<body>

<div id="main">
<!--start page header-->	
	<div id="header">
		
		<!--load logo--> 
		<a href="index.php">
			<img src="images/logo.png" id="logo_title" alt="logo_title" />
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
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
            	<li><a href="index.php">Home</a></li>
            </ul>    	
        </div>
	</div>
<!--end page header-->	

<!--show register form-->	
	<div id="container_demo" >       
    	<div id="wrapper">

            <div id="register" class="animate form">
            	<form  action="check_login_register.php" method="post"> 
            	<?php
            		if(isset($_SESSION['username'])){
            			echo'<h1> You already have an account </h1>';
            		}
					else{
						echo '<h1> Sign up </h1>'; 
                	
                		if($_GET["register_fail"] && $_GET["register_fail"]==1){
                			echo '<p class="login_fail">Register Failed</p>
                			      <p class="login_fail">The username has already been taken.</p>';
                		}
                		
                   		//show register form
                    	echo '<p> 
                    		<label for="usernamesignup" class="uname" >Your username</label>
                        	<input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                    	</p>
                   	 	<p> 
                   	    	<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                        	<input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                   		</p>
                    	<p> 
                        	<label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                        	<input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                    	</p>                            
                    	<p class="signin button"> 
							<input type="submit" value="Sign up"/> 
						</p>';
					}
                ?>	
                </form>
            </div>
						
		</div>
	</div>  
<!--end register form-->			
		
		
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

