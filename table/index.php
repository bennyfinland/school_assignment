<?php 
session_start();
include('../connectDB.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Flexigrid</title>
<link rel="stylesheet" type="text/css" href="css/flexigrid.css" />
<script type="text/javascript" src="jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="flexigrid.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#flex1").flexigrid
			(
			{
			url: 'post2.php',
			dataType: 'json',
			colModel : [
				{display: 'errorID', name : 'errorID', width : 40, sortable : true, align: 'center'},
				{display: 'timestamp', name : 'timestamp', width : 130, sortable : true, align: 'center'},
				{display: 'message', name : 'message', width : 330, sortable : true, align: 'center'},
				],
		
			searchitems : [
				{display: 'errorID', name : 'errorID'},
				],
			sortname: "errorID",
			sortorder: "asc",
			usepager: true,
			title: 'Error Message',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
			height: 255
			}
			);   
});
function sortAlpha(com){ 
			jQuery('#flex1').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
			jQuery("#flex1").flexReload(); 
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#flex2").flexigrid
			(
			{
			url: 'post3.php',
			dataType: 'json',
			colModel : [
				{display: 'memberID', name : 'memberID', width : 60, sortable : true, align: 'center'},
				{display: 'name', name : 'name', width : 130, sortable : true, align: 'center'},
				{display: 'email', name : 'email', width : 130, sortable : true, align: 'center'},
				],
		
			searchitems : [
				{display: 'memberID', name : 'memberID'},
				],
			sortname: "memberID",
			sortorder: "asc",
			usepager: true,
			title: 'Filmmembers',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
			height: 255
			}
			);   
});
function sortAlpha(com){ 
			jQuery('#flex2').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
			jQuery("#flex2").flexReload(); 
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#flex3").flexigrid
			(
			{
			url: 'post4.php',
			dataType: 'json',
			colModel : [
				{display: 'reviewID', name : 'reviewID', width : 60, sortable : true, align: 'center'},
				{display: 'memberID', name : 'memberID', width : 60, sortable : true, align: 'center'},
				{display: 'reviewTitle', name : 'reviewTitle', width : 250, sortable : true, align: 'center'},
				{display: 'stars', name : 'stars', width : 60, sortable : true, align: 'center'},
				{display: 'timestamp', name : 'timestamp', width : 120, sortable : true, align: 'center'},
				],
		
			searchitems : [
				{display: 'reviewID', name : 'reviewID'},
				],
			sortname: "reviewID",
			sortorder: "asc",
			usepager: true,
			title: 'Filmreviews',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
			height: 255
			}
			);   
});
function sortAlpha(com){ 
			jQuery('#flex3').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
			jQuery("#flex3").flexReload(); 
}
</script>


</head>

<body>
<?php 
	if(isset($_SESSION['username'])){
		echo "<table id='flex1' style='display:none'></table>"; 
		echo "<br>";
		echo "<table id='flex2' style='display:none'></table>";
		echo "<br>";
		echo "<table id='flex3' style='display:none'></table>";
	}
	else{
		echo "Only for admin!!!!";
	}
?>


</body>
</html>