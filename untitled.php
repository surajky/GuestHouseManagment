<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-View Booking</title>
<style type="text/css">
body {
	background-image: url(img/divider.gif);
}
.style20 {font-size: 14px;
	color: #CCCCCC;
}
.style34 {color: #FFFF99;
	font-size: 36px;
}
.style36 {
	font-size: 24px;
	font-weight: bold;
}
</style>
</head>

<body>
<div align="center"><span class="style20"><img src="images/logo4.png" alt="" width="60" height="50" /><span class="style34">HOTEL <strong>SAI SURAJ</strong></span> <span class="style34"> INTERNATIONAL</span></span></div>
<table width="917" border="0" align="center" background="img/aa.png" bgcolor="#333333">
  <tr>
    <th height="302" colspan="4" scope="row"><img src="images/room2.jpg" alt="" width="900" height="300" /></th>
  </tr>
  <tr>
    <th height="56" colspan="4" scope="row"><a href="index.html"><img src="img/home3.png" alt="" width="175" height="50"/></a><a href="aboutus.html"><img src="img/aboutus3.png" alt="" width="175" height="50" onclick="aboutus.html" /></a><a href="login.php"><img src="img/bk3.png" alt="" width="175" height="50" /></a><a href="tourplace.html"><img src="img/tplc3.png" alt="" width="180" height="50" /></a><a href="lmap.html"><img src="img/lmp3.png" alt="" width="175" height="50" /></a></th>
  </tr>
  <tr>
    <th height="60" colspan="4" scope="row"><marquee direction="left" behavior='alternate' onmouseover="this.stop()" onmouseout="this.start()" loop="-1" truespeed="truespeed"><img src="images/dine_3.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine.jpg" width="162" height="119" />&nbsp;&nbsp;<img src="images/lobby.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine_3.jpg" width="162" height="119" />&nbsp;&nbsp;<img src="images/lounge.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/suite_1.jpg" alt="" width="162" height="119" />&nbsp;&nbsp;<img src="images/dine_2.jpg" alt="" width="162" height="119" /> &nbsp;&nbsp; <img src="images/hall.jpg" alt="" width="162" height="119" /> &nbsp;&nbsp;<img src="images/restaurant.jpg" alt="" width="162" height="119" />
    </marquee>&nbsp;</th>
  </tr>
  <tr>
    <th width="204" height="356" scope="row"><a href="facilities.html"><img src="images/facilities.jpg" alt="" width="200" height="161" /></a><br />
    <br /><a href="tariff.php"><img src="images/tariff.jpg" width="200" height="72" /></a><br />
    <br /> <a href="lmap.html"><img src="images/location.jpg" width="200" height="73" /></a></th>
    <td width="703"><form action="" method="post" name="f">
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
	 
	    session_start();
	function noofdays($start,$end) {
	//UVray
		$range = array();

		if (is_string($start) === true) $start = strtotime($start);
		if (is_string($end) === true ) $end = strtotime($end);

		if ($start > $end) return noofdays($end, $start);

		$i=0;
		while($start <= $end)
		{
			$start = strtotime("+ 1 day", $start);
			$i++;
		}

		return $i;
	}


   if ( $_SESSION['username'])
    {  $user=$_SESSION['username'];
	  require('connect.php');
			$ex0=mysql_query("SELECT * FROM registration WHERE user='$user'") or die(mysql_error());
							$count=mysql_num_rows($ex0);
				if($count)
				{			    
    			 echo "<br><center><strong>Welcome ".$_SESSION['username'].".<br /></center></strong>";			 
			echo "<table align='center' border=1 bgcolor='maroon' cellspacing='0' style='color:white'>";
			echo "<tr align='center'><td>Room no</td><td>Check-in Date</td><td>Check-out Date</td><td>No. of days</td><td>Category</td><td>Type of room</td><td>AC/Non AC</td><td>Amount</td><td>Cancel<br>Booking?</tr>";

			$ex=mysql_query("SELECT * FROM roombooking WHERE username='$user'") or die(mysql_error());
			$count1=mysql_num_rows($ex);
				if($count1>0)
				{				while($row=mysql_fetch_assoc($ex)){
				//$username		=$row['username'];
				$id 	= $row['id'];
				$roomno	= $row['roomno'];
				$cin	= $row['checkindate'];
				$cout	= $row['checkoutdate'];
				$ndays	= $row['ndays'];
				$ct		= $row['category'];
				$type	= $row['type'];
				$optn	= $row['option'];
				$rate	= $row['rate'];
				
				echo "<tr align='center'><td>$roomno</td><td>$cin</td><td>$cout</td><td>$ndays</td><td>$ct</td><td>$type</td><td>$optn</td><td>$rate</td><td><a href='booking_cancel.php?id=$id&type=room&submit=submit'>Cancel</a></td></tr>";
			}}
			$extr=mysql_query("SELECT * FROM hallbooking WHERE username='$user'") or die(mysql_error());
			$count2=mysql_num_rows($extr);
			if($count2>0)
			{
				while($hal=mysql_fetch_assoc($extr))
				{$id=$hal['id'];
					$name=$hal['username'];
					$cin=$hal['checkindate'];
					$cout=$hal['checkoutdate'];
					$nod=noofdays($cin,$cout);
					$rate=$nod*25000;
					$rate=round($rate,2);
					
					echo "<tr><td align='center'>-</td><td align='center'>$cin</td><td align='center'>$cout</td><td align='center'>$nod</td><td align='center'>Hall</td><td align='center'>-</td><td align='center'>-</td><td align='center'>$rate</td><td align='center'><a href='booking_cancel.php?id=$id&type=hall&submit=submit'>Cancel</a></td></tr>";
				}
			}
		
		if($count1==0 && $count2==0){
		echo "<script type=\"text/javascript\">
alert(\"Currently no booking is done by you\");
</script>";
}					echo "</table>";
	}		 else
    {	
        header("Location:login.php");
    }}
			?> </form></td>
  </tr></table>
<p align="center"><span class="style36"><a href="index.html"><font color="#FF0000">Home</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="aboutus.html"><font color="#FF0000">About us</font></a>&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp; <a href="login.php"><font color="#FF0000">Booking</font></a>&nbsp;&nbsp; | &nbsp; &nbsp;&nbsp;<a href="tourplace.html"><font color="#FF0000">Tourism places</font></a>&nbsp; &nbsp;&nbsp;| &nbsp;&nbsp; &nbsp;<a href="lmap.html"><font color="#FF0000">Location map</font></a>&nbsp;&nbsp; &nbsp;</span></p>
</body>
</html>
