<?php
include("admin_header.php");
 
$id = isset($_GET['artist_id']) ? $_GET['artist_id'] : null;
 
$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery");

$query = ("DELETE FROM `artist` WHERE `artist`.`artist_id` = $id");
        $del = mysql_query($query) or die("ERROR::Unable to execute query $query");

	Header("Location: admin_artist_list.php");

mysql_close();
?>