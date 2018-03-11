<?php include 'header.php';?>
<html>

<head>
<title>SaiSuraj-Signout.</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style type="text/css">
 body{
	background-color:#CCCCCC;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	
 }




.style3 {	font-size: 14px;
	color: #CCCCCC;
}
.style6 {	font-size: 12px;
	color: #FFFF99;
}
.style7 {	color: #FF0000;
	font-weight: bold;
	font-size: 36px;
}
.style18 {font-size: 36px;
	color: #FFFF99;
}
.style34 {color: #FFFF99;
	font-size: 36px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body >

<div align="center"><span class="style3">
  <?php
session_start();
session_destroy();

echo "<br><br><br>
<center><table border=0 cellpadding=5 cellspacing=5 style=' border:double; border-color:#000000; color:#FFFFFF; background-color:#9fa8a3; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif' >
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td><center>Signed out successfully.</center></td><td>&nbsp;</td><td>
        <tr><td>&nbsp;</td><td><a href='index.php'>Click here</a> to go to Home page or wait to be redirected.</center><td>&nbsp;</td><td>
        <tr><td>&nbsp;</td><td>
        </table></center>";
header('Refresh:10;url=index.php');
?>
</div>
</body>
</html>