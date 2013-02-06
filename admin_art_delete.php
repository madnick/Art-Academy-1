<!-- This was created by Nick Basic on the 30th October 2011 with assistance from sasha
Last updated on 2nd November 2011 -->

<?php
include("admin_header.php");
 
$id = isset($_GET['art_id']) ? $_GET['art_id'] : null;
 
$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery");

$query = ("DELETE FROM `art` WHERE `art`.`art_id` = $id");
        $del = mysql_query($query) or die("ERROR::Unable to execute query $query");

	Header("Location: admin_art_list.php");

mysql_close();
?>