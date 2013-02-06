<!-- This was created by Nick Basic on the 2nd November 2011 with a external code used from my project 2
Last updated on 2nd November 2011 -->

<?php
include("header.php"); 
?>
<HTML>
<HEAD>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language='Javascript' type="text/JavaScript">
	function validateform()
	{
		var formobj = document.forms[0];

         if (formobj.name.value =="")
         {
           alert("Please fill out the name...");
           formobj.name.focus();
           return false;
         }
		 else if (formobj.email.value =="")
         {
           alert("Please fill out an email...");
           formobj.email.focus();
           return false;
         }
		 else if (formobj.message.value =="")
         {
           alert("Please fill out a brief message...");
           formobj.message.focus();
           return false;
         }
		return true;

    }//End of function
</script>
</HEAD>
<BODY onLoad="javascript:document.forms[0].uname.focus()">
<div class="mainContent">
   <h3>Please email us regarding any queries, problems or suggestions for this site</h3>
</div>

<form action='contact-form-handler.php' name="contactform"  method='POST' onSubmit="javascript:return validateform()" >
<p>
<label for="name">Your Name:</label> <br>
<input type="text" name="name" maxlength="50" size="30">
</p>
<p>
<label for="email">Email Address:</label> <br>
<input type="text" name="email" maxlength="30" size="30"> <br>
</p>
<p>
<label for="message">Message:</label> <br>
<textarea name="message" maxlength="1000" cols="25" rows="6"></textarea>
</p>
<div style="text-align:center;">
<input type="submit" value="Submit">
</div>
</form>
</BODY>
<?php
include("footer.php"); 
?>