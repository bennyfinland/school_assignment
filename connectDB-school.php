<?php
   function connectDBRead(){
// Connect to the database for read-only access
    if ($db=@mysql_connect("mysql-student", "chengl1379","peekeddips"))
        if ($result=@mysql_select_db("chengl1379dweb"))
        return $db;
    return FALSE;
   }
?>