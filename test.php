<?php

$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery") or die ("Couldnt find database");

$query="SELECT firstname,artist_id FROM artist";

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

$result = mysql_query ($query);
echo "<select name=artist value=''>artist Name</option>";
// printing the list box select command

while($nt=mysql_fetch_array($result)){//Array or records stored in $nt
echo "<option value=$nt[artist_id]>$nt[firstname]</option>";
/* Option values are added by looping through the array */
}
echo "</select>";// Closing of list box 

?>