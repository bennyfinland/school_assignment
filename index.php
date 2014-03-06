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
    <script type="text/javascript" src="js/script.js"></script>

<!--show images-->	
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

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
            	<li><a class="current" href="index.php">Home</a></li>
            </ul>    	
        </div>
   
	</div>
<!--end page header-->
	
<!--start main body--> 
	<div id="main_body">
		<!--show images by using jquery--> 
		<div id="ads">
			<div class="slider-wrapper theme-default">
          		<div id="slider" class="nivoSlider">
                	<img src="images/toystory.jpg" />
                	<img src="images/up.jpg"  />
                	<img src="images/walle.jpg" />
                	<img src="images/nemo.jpg" />
            	</div>
			</div>	
			
		</div>
	  
	</div>
<!--end main body--> 

<!--start main content--> 
	<div id="main_content">
		
		<!--start main left--> 
		<div id="main_left">	
    		<ul id="holder">
			
			<!--get movie title from db, star number and show how much people comment this movie-->
			<?php 
				//$db=connectDBRead();			
				$sql = "SELECT * FROM filmfilms";
			//	$file = mysql_query($sql,$db);
				$file = mysql_query($sql,$conn);
				while($row = mysql_fetch_array($file)){
				  
				  //  $db_total =connectDBRead();			
					$sql_total = 'SELECT COUNT(*) FROM filmreviews WHERE filmID = '.$row[filmID].'';
 					//$file_total = mysql_query($sql_total ,$db_total );
					$file_total = mysql_query($sql_total ,$conn);
					$row_total = mysql_fetch_array($file_total);
				  
				    //  $db_star =connectDBRead();			
					$sql_star = 'SELECT AVG(stars) FROM filmreviews WHERE filmID = '.$row[filmID].'';
 					//$file_star = mysql_query($sql_star ,$db_star);
					$file_star = mysql_query($sql_star ,$conn);
					$row_star = mysql_fetch_array($file_star);
					$floor_star = floor($row_star[0]);
				  
					echo '<li>
						  	<div class="review_box">
								<a href="review.php?film_title='.$row[filmTitle].'&amp;film_review='.$row_total[0].'&amp;film_id='.$row[filmID].'&amp;film_star='.$floor_star.'">
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
			?>	
				
    		</ul>		
		</div>
		<!--end main left-->

		<!--start main right-->
		<div id="main_right">
			
			<!--show register button-->
			<div class="button-wrapper-large">
				<a href="register.php" class="a-btn">
					<span class="a-btn-text">Get an account</span>
					<span class="a-btn-icon-right"><span></span></span>
				</a>
			</div>
			
			<!--show Highest rated movies-->
			<div class="rate_box">
				<div class="rate_title">
					<h1>Highest rated movies</h1>
				</div>
				<ul>
				<!--get data from db and sort it-->	
				<?php 
					//$db = connectDBRead();			
					$sql = 'SELECT * FROM filmreviews GROUP BY filmID HAVING count(filmID) >1 LIMIT 5';
 					//$file = mysql_query($sql ,$db);
					$file = mysql_query($sql ,$conn);
					while($row = mysql_fetch_array($file)){
				  		//$db_rate = connectDBRead();
						$sql_rate = 'SELECT * FROM filmfilms WHERE filmID = '.$row['filmID'].'';
 						//$file_rate = mysql_query($sql_rate ,$db_rate);
						$file_rate = mysql_query($sql_rate ,$conn);
						$row_rate = mysql_fetch_array($file_rate);
						
						
						$sql_total = 'SELECT COUNT(*) FROM filmreviews WHERE filmID = '.$row[filmID].'';
 						//$file_total = mysql_query($sql_total ,$db_total );
						$file_total = mysql_query($sql_total ,$conn);
						$row_total = mysql_fetch_array($file_total);
					
				  	echo '<li>
							<a href="review.php?film_title='.$row_rate[filmTitle].'&film_review='.$row_total[0].'&film_id='.$row_rate[filmID].'">
								'.$row_rate[filmTitle].'
							</a>
						  </li>';			  
					}
				?>	
				</ul>
			</div>
				
		</div>
		<!--start main right-->
		
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

