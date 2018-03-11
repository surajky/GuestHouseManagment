<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="validlogin.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-New password</title>
<style type="text/css">
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
body {
	background-image: url(img/divider.gif);
}
.style15 {
	font-size: 18px;
	font-weight: bold;
}
.style20 {	font-size: 14px;
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
</head>

<body>
<div align="center"><span class="style20"><img src="images/logo4.png" alt="" width="60" height="50" /><span class="style34">HOTEL <strong> SAI SURAJ </strong></span> <span class="style18"> INTERNATIONAL</span></span>
</div>
<table width="921" border="0" align="center" background="img/aa.png" bgcolor="#333333">
  <tr>
    <th height="274" colspan="6" scope="row"><img src="images/room2.jpg" alt="" width="900" height="258" border="10" style="border:thick; border-color:#000000" /></th>
  </tr>
  <tr>
    <th height="60" colspan="6" scope="row"><a href="index.html"><img src="img/home3.png" alt="" width="150" height="50"/></a><a href="aboutus.html"><img src="img/aboutus3.png" alt="" width="150" height="50" onclick="aboutus.html" /></a><a href="res.php"><img src="img/bk3.png" alt="" width="150" height="50" /></a><a href="tourplace.html"><img src="img/tplc3.png" alt="" width="150" height="50" /></a><a href="lmap.html"><img src="img/lmp3.png" alt="" width="150" height="50" /></a></th>
  </tr>
  <tr>
    <th height="60" colspan="6" scope="row"><marquee direction="left" behavior='alternate' onmouseover="this.stop()" onmouseout="this.start()" loop="-1" truespeed="truespeed">
          <img src="images/dine_3.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine.jpg" width="140" height="90" />&nbsp;<img src="images/lobby.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_3.jpg" width="140" height="90" />&nbsp;<img src="images/lounge.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/suite_1.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_2.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/hall.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/restaurant.jpg" alt="" width="140" height="90" />
          </marquee></th>
  </tr>
  <tr>
    <th width="277" height="477" scope="row"><a href="facilities.html"><img src="images/facilities.jpg" alt="" width="226" height="161" /></a><br />
    <br /><a href="tariff.php"><img src="images/tariff.jpg" width="226" height="72" /></a><br /><br /> <a href="lmap.html"><img src="images/location.jpg" width="226" height="73" /></a></th>
   
    <td width="634">
    <?php
   error_reporting(0);
	  require('connect.php');
    if(isset($_POST['changepass']))
    {   $user		=$_POST['user'];
		$newpass	=$_POST['npass'];

	       	$passupdate		= mysql_query("UPDATE registration SET password='$newpass' WHERE user='$user' ") or die(mysql_error());
			echo "<script type=\"text/javascript\">
alert(\" Congrats your new password saved\");
</script>";
	 	header('location:login.php');
	
	}
	else
	header('location:fpass.php');
?></td>
  </tr></table>
<p align="center"><span class="style15"><a href="index.html"><font color="#FF0000">Home</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="aboutus.html"><font color="#FF0000">About us</font></a>&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp; <a href="login.php"><font color="#FF0000">Reservation</font></a>&nbsp;&nbsp;&nbsp; | &nbsp; &nbsp;&nbsp;<a href="tourplace.html"><font color="#FF0000">Tourism places</font></a>&nbsp; &nbsp;&nbsp;| &nbsp;&nbsp; &nbsp;<a href="lmap.html"><font color="#FF0000">Location map</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="contact.php"><font color="#FF0000">Enquiry</font></a>&nbsp;&nbsp; | &nbsp;</span></p>
</body>
</html>
