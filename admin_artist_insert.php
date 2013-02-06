<!-- This was created by Nick Basic on the 2nd October 2011
Last updated on 2nd November 2011 -->

<?php include("admin_header.php"); 
include("admin_link.php");


if( isset($_POST['submit']) && $_POST['submit'])
{ 
//form data

$firstname = ($_POST['firstname']);
$surname = ($_POST['surname']);
$bibliography = ($_POST['bibliography']);
$phone = ($_POST['phone']);
$email = ($_POST['email']);
}


if (isset($_POST['submit']) && $_POST['submit'])
{

	//open database
	$connect = mysql_connect ("localhost","root","") or die("Unable to connect to mysql database server");
	mysql_select_db("gallery") or die ("Couldnt find database");
					
	$queryreg = mysql_query("				
	
	INSERT INTO artist VALUES ('','$firstname','$surname','$bibliography','$phone','$email')
	
	");
	   echo "<script language='JavaScript'>
	alert(\"You have been sucessfully registered an artist!\"); 
        history.go(-1);
        </script>";
	exit();
}
?>
<HTML>
<HEAD>
<script language='Javascript' type="text/JavaScript">
	function validateform()
	{
		var formobj = document.forms[0];

         if (formobj.firstname.value =="")
         {
           alert("Please fill out the first name...");
           formobj.firstname.focus();
           return false;
         }
		 else if (formobj.surname.value =="")
         {
           alert("Please fill out the surname...");
           formobj.surname.focus();
           return false;
         }
		 else if (formobj.bibliography.value =="")
         {
           alert("Please fill out a brief bibliography...");
           formobj.bibliography.focus();
           return false;
         }
		 else if (formobj.phone.value =="")
         {
           alert("Please fill out a phone number...");
           formobj.phone.focus();
           return false;
         }
		 else if (formobj.email.value =="")
         {
           alert("Please fill out a email address...");
           formobj.email.focus();
           return false;
         }
		return true;

    }//End of function
</script>
</HEAD>
<BODY onLoad="javascript:document.forms[0].uname.focus()">
<div class="mainContent">
   <h1>Please insert artist details</h1>
</div>
<div class="artistform">
    <form action='admin_artist_insert.php' method='POST' onSubmit="javascript:return validateform()" >
		<div align="center">
			<table> 
			<tr>
            <td>
                First Name:
            </td>
            <td>
				<input type='text' name='firstname'>
            </td>
            </tr>

            <tr>
            <td>
                Surname:
            </td>
            <td>
                <input type='text' name='surname'>
            </td>
			
			<tr>
            <td>
                Bibliography:
            </td>
            <td>
				<textarea name="bibliography" cols="40" rows="6">
				</textarea>
            </td>
            </tr>

            <tr>
            <td>
                Phone:
            </td>
            <td>
                <input type='text' name='phone'>
            </td>
			
	        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type='text' name='email'>
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