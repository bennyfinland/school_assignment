<?php 
session_start();
include('connectDB.php'); 

//check the post data. if get data, insert into db
if($_POST["rating"] && $_POST["comment_title"] && $_POST["comment"] && $_POST["filmID"] && $_POST["memberID"] && $_POST["time"]){
	$rating = $_POST["rating"];
	$comment_title = $_POST["comment_title"];
	$comment = $_POST["comment"];
	$time = $_POST["time"];
	$filmID = $_POST["filmID"];
	$memberID = $_POST["memberID"];
	mysql_query("insert into filmreviews (reviewID,memberID,reviewTitle,stars,review,filmID,timestamp) values ('','$memberID','$comment_title','$rating','$comment','$filmID','$time')");
	//back to review.php
	echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";	
}
//if not get data, jump back the index.php
else{
	//show wrong message and back to review.php
	echo "<script>alert('All the fields must be filled in!!!');history.back()</script>";
}

?>