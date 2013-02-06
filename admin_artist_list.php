<!-- This was created by Nick Basic on the 27th October 2011
Last updated on 2nd November 2011 -->
<?php
	include("admin_header.php"); 
	include("admin_link.php"); 
  
  print "<HTML><TABLE border=1 cellpadding=1 cellspacing=1 align='center'>\n";
 

  //*** Connect to MySQL server 
  $conn = mysql_connect ("localhost","root","") 
  or 
  die("Unable to connect to mysql database server");
 
  //*** Select which DB you want to use  
  mysql_select_db("gallery") or die ("Unable to select database");


  $query = "SELECT * FROM artist";    //Put SQL query in a query string
  $result = mysql_query ($query) or die(mysql_error()); //Execute the query

  //*** Get dynamically all field names from the Employee table 
  $fields = mysql_list_fields("gallery", "artist");
  $columns = mysql_num_fields($fields);
  for ($ii = 0; $ii < $columns; $ii++){
     echo "<TH>".mysql_field_name($fields, $ii)."</TH>"; 
  }
  echo "<TH>"."Edit"."</TH>";
  echo "<TH>"."Delete"."</TH>"; 
  
  //This fills out all of the tables
  while($row = mysql_fetch_array($result)){
    echo "<TR>";
	//want this to be in the table
    for ($jj = 0; $jj < $columns; $jj++){
		  
          echo "<TD>$row[$jj]</TD>"; 
    }
	echo "<TD>". "<a href=\"admin_artist_edit.php?artist_id=" . $row['artist_id'] . "\">" . $row['artist_id'] . "</a>" . "</TD>";
	echo "<TD>". "<a href=\"admin_artist_delete.php?artist_id=" . $row['artist_id'] . "\">" . $row['artist_id'] . "</a>" . "</TD>";
    echo "</TR>";

  }
include("admin_footer.php")  
?> 


