<?php
error_reporting(0);
function runSQL($rsql) {

	
	
	$db_hostname="localhost";
	$db_database="movie";
	$db_username="root";
	$db_password="";
	$conn=mysql_pconnect($db_hostname, $db_username, $db_password);
	mysql_query("SET NAMES 'utf-8'",$conn); 
	mysql_select_db($db_database, $conn);
	$result = mysql_query($rsql) or die ('test'); 
	return $result;
	mysql_close($connect);
	
}

function countRec($fname,$tname,$where) {
$sql = "SELECT count($fname) FROM $tname $where";
$result = runSQL($sql);
while ($row = mysql_fetch_array($result)) {
return $row[0];
}
}
$page = $_POST['page'];
$rp = $_POST['rp'];
$sortname = $_POST['sortname'];
$sortorder = $_POST['sortorder'];

if (!$sortname) $sortname = 'name';
if (!$sortorder) $sortorder = 'desc';
		if($_POST['query']!=''){
			$where = "WHERE `".$_POST['qtype']."` LIKE '%".$_POST['query']."%' ";
		} else {
			$where ='';
		}
		if($_POST['letter_pressed']!=''){
			$where = "WHERE `".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%' ";	
		}
		if($_POST['letter_pressed']=='#'){
			$where = "WHERE `".$_POST['qtype']."` REGEXP '[[:digit:]]' ";
		}
$sort = "ORDER BY $sortname $sortorder";

if (!$page) $page = 1;
if (!$rp) $rp = 10;

$start = (($page-1) * $rp);

$limit = "LIMIT $start, $rp";

$sql = "SELECT errorID,timestamp,message FROM filmerrors $where $sort $limit";
$result = runSQL($sql);

$total = countRec('errorID','filmerrors',$where);

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "page: $page,\n";
$json .= "total: $total,\n";
$json .= "rows: [";
$rc = false;
while ($row = mysql_fetch_array($result)) {
if ($rc) $json .= ",";
$json .= "\n{";
$json .= "errorID:'".$row['errorID']."',";
$json .= "cell:['".$row['errorID']."','".$row['timestamp']."'";
$json .= ",'".addslashes($row['message'])."']";
$json .= "}";
$rc = true;
}
$json .= "]\n";
$json .= "}";
echo $json;
?>