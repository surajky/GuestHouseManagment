<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="cancel.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-View Booking</title>
<style type="text/css">
body {
	background-image: url(img/divider.gif);
}
.style15 {font-size: 18px}
.style18 {font-size: 36px;
	color: #FFFF99;
}
.style20 {font-size: 14px;
	color: #CCCCCC;
}
.style34 {color: #FFFF99;
	font-size: 36px;
}
.style35 {color: #000000}
</style>
</head>

<body>
<div align="center"><span class="style20"><img src="images/logo4.png" alt="" width="60" height="50" /><span class="style34">HOTEL <strong>SAI SURAJ</strong></span> <span class="style34"> INTERNATIONAL</span></span></div>
<table width="917" border="0" align="center" background="img/aa.png" bgcolor="#333333">
  <tr>
    <th height="302" colspan="4" scope="row"><img src="images/room2.jpg" alt="" width="903" height="302" /></th>
  </tr>
  <tr>
    <th height="60" colspan="4" scope="row"><a href="index.html"><img src="img/home3.png" alt="" width="175" height="50"/></a><a href="aboutus.html"><img src="img/aboutus3.png" alt="" width="175" height="50" onclick="aboutus.html" /></a><a href="login.php"><img src="img/bk3.png" alt="" width="175" height="50" /></a><a href="tourplace.html"><img src="img/tplc3.png" alt="" width="175" height="50" /></a><a href="lmap.html"><img src="img/lmp3.png" alt="" width="175" height="50" /></a></th>
  </tr>
  <tr>
    <th height="60" colspan="4" scope="row"><marquee direction="left" behavior='alternate' onmouseover="this.stop()" onmouseout="this.start()" loop="-1" truespeed="truespeed"><img src="images/dine_3.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine.jpg" width="162" height="119" />&nbsp;&nbsp;<img src="images/lobby.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine_3.jpg" width="162" height="119" />&nbsp;&nbsp;<img src="images/lounge.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/suite_1.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine_2.jpg" alt="" width="162" height="119" /> &nbsp;&nbsp; <img src="images/hall.jpg" alt="" width="162" height="119" /> &nbsp;&nbsp;<img src="images/restaurant.jpg" alt="" width="162" height="119" />
    </marquee>&nbsp;</th>
  </tr>
  <tr>
    <th width="204" height="356" scope="row"><a href="facilities.html"><img src="images/facilities.jpg" alt="" width="200" height="161" /></a><br />
    <br /><a href="tariff.php"><img src="images/tariff.jpg" width="200" height="72" /></a><br />
    <br /> <a href="lmap.html"><img src="images/location.jpg" width="200" height="73" /></a></th>
    <td width="703">
      <table width="645" height="60">
        <tr>
          <th width="123" scope="row"><a href="changepass.php"><img src="img/changepassword.png" width="110" height="50" /></a></th>
            <td width="104"><a href="changeprofile.php"><img src="img/changeprofile5.png" width="110" height="50" /></a></td>
            <td width="104"><a href="viewprofile.php"><img src="img/viewprofile5.png" width="110" height="50" /></a></td>
            <td width="92"><a href="viewbook.php"><img src="img/viewbooking51.png" alt="" width="110" height="50" /></a></td>
            <td width="104"><a href="res.php"><img src="img/reservation5.png" width="110" height="50" /></a></td>
            <td width="104"><a href="signout.php"><img src="img/logout5.png" width="100" height="50" /></a></td>
        </tr>
      </table>
        <?php
require("connect.php");
session_start();
if ( $_SESSION['username'])
{  

if ( $_SESSION['username'])
{  
 $user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{			    
    			 echo "<br><center><strong>Welcome ".$_SESSION['username'].".<br /></center></strong>";			 

	if(isset($_GET['submit']))
	{
		$id=$_GET['id'];
		$type=$_GET['type'];
		echo "<form action='' method='post' name='f' onsubmit='return validateFormOnSubmit(this);'><table cellpadding='5' cellspacing='5' background='img/bg1.jpg' align='center' style='color:#FFFFFF' border='0' style='font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif'>
		<tr><td>Bank Name</td><td><input type='text' name='bn' onblur='checkbname()'></td></tr>
		<tr><td>Account Number</td><td><input type='text' name='ac'onblur='checkaccount()' ></td></tr>
		<tr><td><input type='reset' value'Reset' name='reset'> </td><td><input type='submit' name='check' value='submit' ></td></tr>
		</table></form>";
		if(isset($_POST['check']))
		{
			$bn=$_POST['bn'];
			$ac=$_POST['ac'];
		if( $type == 'room' )
		{
			$ex=mysql_query("SELECT * FROM roombooking WHERE id='$id'");
			$cnt=mysql_num_rows($ex);
			
			if($cnt==1)
			{
				$row=mysql_fetch_assoc($ex);
				$rate=$row['rate'];
				
				$refund=$rate/2;
				$refund=round($refund,2);

				
				$bnk=mysql_query("SELECT * FROM bankdetails WHERE bankname='$bn' and cardno='$ac'");
				$bcnt=mysql_num_rows($bnk);
				if($bcnt==1)
				{				echo "<font face='Georgia' size='6'><center>The amount will be refunded to your account.</center>";

					$det=mysql_fetch_assoc($bnk);
					$amt = $det['balance'];
					$amt += $refund;
				
					mysql_query("UPDATE bankdetails SET balance='$amt' WHERE bankname='$bn' and cardno='$ac'");
					mysql_query("DELETE FROM roombooking WHERE id='$id'");
					
					echo "<center>Your refunded amount is $refund</center></font>";
										}
			}
			else
			{
				echo "<font face='Georgia' size='6'><center>Error Occured.</center></font>";
			}
		}
		else if( $type == 'hall' )
		{
			$ex=mysql_query("SELECT * FROM hallbooking WHERE id='$id'");
			$cnt=mysql_num_rows($ex);
			
			if($cnt==1)
			{
				$row=mysql_fetch_assoc($ex);
				$rate=$row['rate'];
				
				$refund=$rate/2;
				$refund=round($refund,2);

				
				$bnk=mysql_query("SELECT * FROM bankdetails WHERE bankname='$bn' and cardno='$ac'");
				$bcnt=mysql_num_rows($bnk);
				if($bcnt==1)
				{	echo "<font face='Georgia' size='6'><center>The amount will be refunded to your account.</center>";

					$det=mysql_fetch_assoc($bnk);
					$amt = $det['balance'];
					$amt += $refund;
				
					mysql_query("UPDATE bankdetails SET balance='$amt' WHERE bankname='$bn' and cardno='$ac'");
					mysql_query("DELETE FROM hallbooking WHERE id='$id'");
					
					echo "<center>Your refunded amount is $refund</center></font>";
				}
			}
			else
			{
				echo "<font face='Georgia' size='6'><center>Error Occured.</center></font>";
			}
		}
	}
}
else
{
	header("Location:viewbook.php");
}}
}
   else
    {	
        header("Location:login.php");
    }}
?>
</td>
  </tr></table>
<p align="center"><span class="style15"><a href="index.html"><font color="#FF0000">Home</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="aboutus.html"><font color="#FF0000">About us</font></a>&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp; <a href="login.php"><font color="#FF0000">Booking</font></a>&nbsp;&nbsp; | &nbsp; &nbsp;&nbsp;<a href="tourplace.html"><font color="#FF0000">Tourism places</font></a>&nbsp; &nbsp;&nbsp;| &nbsp;&nbsp; &nbsp;<a href="lmap.html"><font color="#FF0000">Location map</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="contact.php"><font color="#FF0000">Enquiry</font></a>&nbsp;&nbsp; | &nbsp;</span></p>
</body>
</html>