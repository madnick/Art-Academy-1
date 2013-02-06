<!-- This was created by Nick Basic on the 25th September 2011
Last updated on 2nd November 2011 -->


<?php
session_start();


// Form action - the file name itself 
$form_action = basename($_SERVER['PHP_SELF']);  	
//*** ASK FOR USERNAME AND PASSWORD 
if(!isset($_POST['first'])){
  $_SESSION['loggedin'] = 0;
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
Art Academy - University Of Ballarat - Admin Section
</h1>

<?php
}

if(isset($_POST['first']))
{
$uname = $_POST['uname'];

	
$connect = mysql_connect("localhost","root","") or die("Couldn't connect");
mysql_select_db("gallery") or die ("Couldn't find database");

$query = mysql_query("SELECT * FROM admin WHERE login='$_POST[uname]' ");

if(!$query)
  die("Unable to execute query $query" );

$query_result = mysql_fetch_array($query);
$username = $query_result[0];
$password = $query_result[1];
$form_password = md5($_POST['passwd']);

  // If user does not exist or invalid password go back to login
  if(($_POST['uname'] != $username || $form_password != $password))
  {
   echo "<script language='JavaScript'>
	alert(\"Access denied... Invalid username $uname or password!\"); 
        history.go(-1);
        </script>";
   }
	//If User exists and password is correct 
   else{
	 //Admin user logged in successfuly
       $_SESSION['loggedin'] = 1;
	   echo "Hi"; 
	   echo "<SCRIPT language='Javascript'>
               document.location=\"admin_index.php\";
	       </SCRIPT>";
	 exit();
   }
}
?>


</BODY>
</HTML>