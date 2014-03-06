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
	<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/styles.css" type="text/css"  />
<!--load js-->		
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="js/script2.js"></script>


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
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
            	<li><a href="index.php">Home</a></li>
            </ul>    	
        </div>
	</div>
<!--end page header-->		

<!--start main content-->	
	<div id="main_content">
		<!--show rearch result: movie title, star, comment-->
		<div id="main_left">	
    		<ul id="holder">
			
			<?php 
			//check the post data
			if($_POST["search_name"]){
				$search_name = $_POST["search_name"];
				
				//$db=connectDBRead();			
				$sql = "SELECT * FROM filmfilms WHERE filmTitle LIKE '%$search_name%'";
			//	$file = mysql_query($sql,$db);
				$file = mysql_query($sql,$conn);
				while($row = mysql_fetch_array($file)){
				  
				  //  $db_total =connectDBRead();			
					$sql_total = 'SELECT COUNT(*) FROM filmreviews WHERE filmID = '.$row[filmID].'';
 					//$file_total = mysql_query($sql_total ,$db_total );
					$file_total = mysql_query($sql_total ,$conn);
					$row_total = mysql_fetch_array($file_total);
				  
				  	//get average star number for db
				    //  $db_star =connectDBRead();			
					$sql_star = 'SELECT AVG(stars) FROM filmreviews WHERE filmID = '.$row[filmID].'';
 					//$file_star = mysql_query($sql_star ,$db_star);
					$file_star = mysql_query($sql_star ,$conn);
					$row_star = mysql_fetch_array($file_star);
					$floor_star = floor($row_star[0]);
				  
					echo '<li>
						  	<div class="review_box">
								<a href="review.php?film_title='.$row[filmTitle].'&film_review='.$row_total[0].'&film_id='.$row[filmID].'&film_star='.$floor_star.'">
									<h1>
										'.$row[filmTitle].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
									
									//check star number and show star image		
									if($floor_star==1){
										echo '<img src = "images/star.png" class="show_star">';
									}
									if($floor_star==2){
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
									}
									if($floor_star==3){
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
									}
									if($floor_star==4){
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
									}
									if($floor_star==5){
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
										echo '<img src = "images/star.png" class="show_star">';
									}
									echo '</h1>
									<div class="star"></div>
								</a>';
							
					echo '<span class="comments-link">'.$row_total[0].'</span>
							</div>
						  </li>';			  

				}
			}
			//if not get data, jump back the index.php
			else{
				header('Location:index.php');
			}
			?>	
				
    		</ul>		
		</div>
		
	</div>	
<!--end main content-->		
		
		
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

