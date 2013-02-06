<!-- This was created by Nick Basic on the 5th October 2011
Last updated on 2nd November 2011 -->

<?php 
	include("admin_header.php"); 
	include("admin_link.php"); 

if( isset($_POST['submit']) && $_POST['submit'])
{ 
//form data

$title = ($_POST['title']);
$description = ($_POST['description']);
$price = ($_POST['price']);
$artistid = ($_POST['artistid']);
}

if (isset($_POST['submit']) && $_POST['submit'])
{
	echo $title, $description, $price, $artistid;
	//open database
	$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
	mysql_select_db("gallery") or die ("Couldnt find database");
					
	$queryreg = mysql_query("				
	
	INSERT INTO art VALUES ('','$title','$description','$price','$artistid')
	
	");
		   echo "<script language='JavaScript'>
	alert(\"You have been sucessfully registered an art work!\"); 
        history.go(-1);
        </script>";
	exit();
}


$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
mysql_select_db("gallery") or die ("Couldnt find database");

$query="SELECT firstname,surname,artist_id FROM artist";



?>
<HTML>
<HEAD>
<script language='Javascript' type="text/JavaScript">
	function validateform()
	{
		var formobj = document.forms[0];

         if (formobj.title.value =="")
         {
           alert("Please fill out the title...");
           formobj.title.focus();
           return false;
         }
		 else if (formobj.description.value =="")
         {
           alert("Please fill out the description...");
           formobj.description.focus();
           return false;
         }
		 else if (formobj.price.value =="")
         {
           alert("Please fill out a brief price...");
           formobj.price.focus();
           return false;
         }
		 else if (formobj.artistid.value =="")
         {
           alert("Please fill out a artist number...");
           formobj.artistid.focus();
           return false;
         }
		return true;

    }//End of function
</script>
</HEAD>
<BODY onLoad="javascript:document.forms[0].uname.focus()">
<div class="mainContent">
   <h1>Please insert art details</h1>
</div>
<div class="artform">
    <form action='admin_art_insert.php' method='POST' onSubmit="javascript:return validateform()" >
		<div align="center">
			<table> 
			<tr>
            <td>
                Title:
            </td>
            <td>
				<input type='text' name='title'>
            </td>
            </tr>
			
			<tr>
            <td>
                Description:
            </td>
            <td>
				<textarea name="description" cols="40" rows="6">
				</textarea>
            </td>
            </tr>

            <tr>
            <td>
                Price:
            </td>
            <td>
                <input type='text' name='price'>
            </td>
			
	        <tr>
            <td>
                Select Artist:
            </td>
            <td>
				<?php
				$result = mysql_query ($query);
				echo "<select name=artistid value=''>Artist Name</option>";
				// printing the list box select command

				while($nt=mysql_fetch_array($result))
				{
					//Array or records stored in $nt
					echo "<option value=$nt[artist_id]>$nt[firstname] $nt[surname]</option>";
					/* Option values are added by looping through the array */
				}
				echo "</select>";// Closing of list box 
				?>
			</td>

            </table>
        </div>
        <p>
	<input type='submit' name='submit' value='Register'>
    </form>
</div>
</BODY>
</HTML>          
<?php include("admin_footer.php"); ?>