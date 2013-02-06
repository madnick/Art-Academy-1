<!-- This was created by Nick Basic on the 30th October 2011 with assistance from raphie
To view further details please go here http://www.daniweb.com/web-development/php/threads/389982
Last updated on 2nd November 2011 -->


<?php
include("admin_header.php");
	include("admin_link.php"); 
 
$id = isset($_GET['artist_id']) ? $_GET['artist_id'] : null;
 
$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery");
 
if(isset($id)){
$query = "SELECT * FROM `artist` WHERE `artist_id` = ".$id.";";
$result=mysql_query($query) or die(mysql_error());
$num=mysql_num_rows($result); //changed
 

// Changed code
if($num > 0){
while ($a = mysql_fetch_object($result)){
 
$firstname=$a->firstname;
$surname=$a->surname;
$bibliography=$a->bibliography;
$phone=$a->phone;
$email=$a->email;
 
echo '<form action="admin_artist_edit.php" method="post">
<td align="center"><input name="edit_id" type="hidden" value="'.$id.'"></td></p>
<p><strong>First Name:</strong><td align="center"><input name="edit_firstname" type="text" value="'.$firstname.'"></td></br>
<strong>Surname:</strong><td align="center"><input name="edit_surname" type="text" value="'.$surname.'"></td></br>
<strong>Bibliography:</strong><td align="center"><input name="edit_bibliography" type="text" value="'.$bibliography.'"></td></br>
<strong>Phone:</strong><td align="center"><input name="edit_phone" type="text" value="'.$phone.'"></td></br>
<strong>Email:</strong><td align="center"><input name="edit_email" type="text" value="'.$email.'"></td></br>
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
     
    $query=mysql_query("UPDATE `artist` SET `firstname`='".$edit_firstname."', `surname`='".$edit_surname."', `bibliography`='".$edit_bibliography."', `phone`='".$edit_phone."', `email`='".$edit_email."' WHERE `artist_id`='".$edit_id."';");
    $review_update = mysql_affected_rows(); //Added
    if($review_update > 0){
    		   echo "<script language='JavaScript'>
	alert(\"You have been sucessfully updated an artist!\"); 
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