<!-- This was created by Nick Basic on the 25th September 2011
Last updated on 23rd October 2011 -->

<?php include("admin_header.php"); ?>
<HTML>
<HEAD>
<link href="style.css" rel="stylesheet" type="text/css" />
 <TITLE>University of Ballarat - School of ITMS</TITLE>
 <link rel='stylesheet' href='include/styles.css' type='text/css'>
	<script language='Javascript'>
	function validateform()
	{
         var formobj = document.forms[0];

         if (formobj.uname.value =="")
         {
           alert("Please fill out the 'user name' field...");
           formobj.uname.focus();
           return false;
         }
                
         if (formobj.passwd.value =="")
         {
           alert("Please fill out the password field...");
           formobj.passwd.focus();
           return false;
         }
	return true;
        }//End of function
	</script>
</HEAD>
<BODY onLoad="javascript:document.forms[0].uname.focus()">
 <FORM action=<?php echo $form_action ?> 
       method='POST' 
       onSubmit="javascript:return validateform()" >

<h3><span>Please Log in</span></h3>     
		<form action='admin_index.php' method='POST'>
        <p>Username: <input type='text' name='uname'></p>
        <p>Password: <input type='password' name='passwd'></p><br>
		<div style="text-align:center;">
        <input type='submit' name="first" value='Log In'>
		</div>
        </form>
 </TABLE>
 </FORM>
</BODY>
</HTML>
