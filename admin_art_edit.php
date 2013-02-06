<!-- This was created by Nick Basic on the 31th October 2011 with assistance from raphie
To view further details please go here http://www.daniweb.com/web-development/php/threads/389982
Last updated on 2nd November 2011 -->
<?php
include("admin_header.php");
include("admin_link.php");
$id = isset($_GET['art_id']) ? $_GET['art_id'] : null;
 
$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery");

 
if(isset($id)){
$query = "SELECT a.art_id, a.title, a.description, a.price, a.artist_id, b.firstname, b.surname FROM art a, artist b WHERE a.artist_id = b.artist_id";
$result=mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result); //changed

 
// Changed code
if($num > 0){
while ($a = mysql_fetch_object($result)){
 
$title=$a->title;
$description=$a->description;
$price=$a->price;
$artist_id =$a->artist_id ;
 
echo '<form action="admin_art_edit.php" method="post">
<td align="center"><input name="edit_id" type="hidden" value="'.$id.'"></td></br><p>
<strong>Title:</strong><td align="center"><input name="edit_title" type="text" value="'.$title.'"></td></br>
<strong>Description:</strong><td align="center"><input name="edit_descripton" type="text" value="'.$description.'"></td></br>
<strong>Price:</strong><td align="center"><input name="edit_price" type="text" value="'.$price.'"></td></br>
<strong>Artist:</strong><td align="center"><input name="edit_artist_id" type="text" value="'.$artist_id.'"></td></br>
<input type="submit" name="submit" value="Update">
</form>';
}
}
} 

    if( isset($_POST['submit']) && $_POST['submit']){
    // Because the field names are the same as the variable names you can to this instead
    foreach($_POST as $k=>$v){
    ${$k} = $v; //Dynamic Variables;
    }
     
    $query=mysql_query("UPDATE `art` SET `title`='".$edit_title."', `description`='".$edit_descripton."', `price`='".$edit_price."', `artist_id`='".$edit_artist_id."' WHERE `art_id`='".$edit_id."';");
    $review_update = mysql_affected_rows(); //Added
    if($review_update > 0){
    		   echo "<script language='JavaScript'>
	alert(\"You have been sucessfully updated an artwork!\"); 
        history.go(-1);
        </script>";
    } else {
        		   echo "<script language='JavaScript'>
	alert(\"Unable to update!\"); 
        history.go(-1);
        </script>";
    }
    }
 
 

 
 
mysql_close();
?>
<?php include("admin_footer.php"); ?>