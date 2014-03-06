<?php
#FileName="Connect_php_mysql.htm"
#Type="MySQL"
#HTTP="true"
$db_hostname="localhost";
$db_database="movie";
$db_username="root";
$db_password="";
$conn=mysql_pconnect($db_hostname, $db_username, $db_password);
mysql_query("SET NAMES 'utf-8'",$conn); 
mysql_select_db($db_database, $conn);
?>
