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
	<link href="css/rater-star.css" rel="stylesheet"/>
<!--load js-->		
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/rater-star.js"></script>
	
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
	
	<div id="main_body">
		<div id="review_box">
		
			<h1>
			<?php	
				if($_GET['film_title']){
					echo $_GET['film_title'];
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					
					$film_title = $_GET['film_title'];
					$filme_id = $_GET['film_id'];
					//  $db_star =connectDBRead();			
					$sql_star = 'SELECT AVG(stars) FROM filmreviews WHERE filmID = '.$filme_id.'';
 					//$file_star = mysql_query($sql_star ,$db_star);
					$file_star = mysql_query($sql_star ,$conn);
					while($row_star = mysql_fetch_array($file_star)){
						$film_star = floor($row_star[0]);
						
						//check star number and show star image	
						if($film_star){
						echo '<input type="hidden" name="get_star" id="get_star" value="'.$_GET['film_star'].'"/>';
						}
						if($film_star==1){
							echo '<img src = "images/star.png" class="show_star">';
						}
						if($film_star==2){
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
						}
						if($film_star==3){
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
						}
						if($film_star==4){
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
						}
						if($film_star==5){
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
							echo '<img src = "images/star.png" class="show_star">';
						}
					}

				}
			?>
			</h1>
			
			<span class="comments-link">
			<?php
				if($_GET['film_review']){
					echo $_GET['film_review'];
				}
			?>
			</span>
		</div>
		
		<?php 
			if($_GET['film_id']){
				$filme_id = $_GET['film_id'];
				//$db=connectDBRead();			
				$sql = 'select * from FILMreviews where filmID = '.$filme_id.'';
				//$file = mysql_query($sql,$db);
				$file = mysql_query($sql,$conn);
				while($row = mysql_fetch_array($file)){		
				
					//$db_name =connectDBRead();			
					$sql_name = 'select name from FILMmembers where memberID = '.$row[memberID].'';
 					//$file_name = mysql_query($sql_name ,$db_name);
					$file_name = mysql_query($sql_name,$conn);
					$row_name = mysql_fetch_array($file_name);

		  			//show review content form
					echo '<div class="user_review_box">
						  	<div class="user_review_content">
								<h1>
									'.$row[reviewTitle].'';
									
								echo '</h1>
							</div>';
					echo '<p>'.$row[review].'</p><br>
						  <h1>By :&nbsp&nbsp'.$row_name[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$row[timestamp].'</h1>
					      </div>';		  
				}
			}
		?>	
	
					
					
				
			
		<?php
			if(isset($_SESSION['username'])){
				echo '<div id="reply">
						<div id="reply_content">
							<h1>Leave a Reply Us</h1>
						</div>
						<form id="commentform" method="post" action="review_insert.php">
							<div id="star_rating"></div>
							<input type="hidden" name="rating" value="" />
							<input type="hidden" name="memberID" value="'.$_SESSION["username"].'" />
							<input type="hidden" name="filmID" value="'.$_GET["film_id"].'" />
							<input type="hidden" name="time" value="'.date("Y-m-d H:i:s",time()).'" />
							
							<script type="text/javascript">
							var options	= {		
								value	: $("#get_star").attr("value"),			
								after_click	: function(ret) {
									$("#star_rating + input").val(ret.number);
								}					
							}
							$("#star_rating").rater(options);
							</script>
							
							<p>Your Title</p>
							<textarea tabindex="5" rows="1" cols="58" name="comment_title"></textarea>
							<p>Your comment</p>
							<textarea tabindex="5" rows="10" cols="58" name="comment"></textarea>
							<br><br>
							<input class="comment_button " type="submit" value="Submit" tabindex="5" onfocus="this.blur();">
						</form>
					</div>';
				}	
		?>
		
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

