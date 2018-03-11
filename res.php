
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" src="validreservation.js"></script>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<script type="text/javascript">
function display(obj,id1,id2) 
{
	txt = obj.options[obj.selectedIndex].value;
	document.getElementById(id1).style.display = 'none';
	document.getElementById(id2).style.display = 'none';
	
	if ( txt.match(id1) ) {
		document.getElementById(id1).style.display = 'block';
	}
	
	if ( txt.match(id2) ) {
		document.getElementById(id2).style.display = 'block';
	}
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-Reservation report</title>
<style type="text/css">
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
body {
font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: #e9ece5;
}
.style15 {font-size: 18px}
.style20 {
	font-size: 36px;
	color: #FFFF99;
	font-weight: bold;
}
.style6 {	font-size: 12px;
	color: #FFFF99;
}
.style24 {color: #FFFFFF; font-weight: bold; font-size: 24; }
.style26 {color: #FF0000; font-weight: bold; font-size: 18px; }
.style27 {
	color: #FFFF99;
	font-size: 18;
}
</style>
<style type="text/css" media="screen">
<!--
.hiddenDiv {
	display: none;
	}
.visibleDiv {
	display: block;
	border: 1px grey solid;
	}
.style29 {color: #FFFF99}

-->
</style>
<script type="text/javascript"><!--
var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}
//-->
</script>
<style type="text/css">
<!--
.style29 {font-size: 24}
-->
</style>
</head>

<body>

<table width="916" border="0" align="center" bgcolor="#333333">
  <tr>
    <th height="214" colspan="6" scope="row"><img src="images/room2.jpg" alt="" width="898" height="200" border="10" style="border:thick; border-color:#000000" /></th>
  </tr>
 
  <tr>
    <th height="60" colspan="6" scope="row"><marquee direction="left" behavior='alternate' onmouseover="this.stop()" onmouseout="this.start()" loop="-1" truespeed="truespeed"><img src="images/dine_3.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine.jpg" width="140" height="90" />&nbsp;<img src="images/lobby.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_3.jpg" width="140" height="90" />&nbsp;<img src="images/lounge.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/suite_1.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_2.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/hall.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/restaurant.jpg" alt="" width="140" height="90" />
    </marquee></th>
  </tr>
  <tr>
    <th width="204" height="361" scope="row"><a href="facilities.html"><img src="images/facilities.jpg" alt="" width="200" height="161" /></a><br />
    <br /><a href="tariff.php"><img src="images/tariff.jpg" width="200" height="72" /></a><br />
    <br /> <a href="lmap.html"><img src="images/location.jpg" width="200" height="73" /></a></th>
   
    <td width="702"><table width="644" height="60">
      <tr>
        
            <td width="92"><a href="viewbook.php"><img src="img/viewbooking51.png" alt="" width="110" height="50" /></a></td>
            <td width="104"><a href="res.php"><img src="img/reservation5.png" width="110" height="50" /></a></td>
            <td width="104"><a href="signout.php"><img src="img/logout5.png" width="100" height="50" /></a></td>
      </tr>
    </table>
   <br /> <table border="0" align="center" cellpadding="5" bgcolor="#400000" >
<?php
	$connect = mysqli_connect("localhost","root","");
	require("connect.php");
	session_start();

	$room_count=0;
	$roomavail='No';
	$hallavail='No';
			
	//Room Nos
	$room1=0;
	$room2=0;
	$room3=0;
	$room4=0;
	$room5=0;
	
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
    {  
		 $username=$_SESSION['username'];
	  require('connect.php');
			$sql="SELECT * FROM registration WHERE user='$username'";
			$ex0=mysqli_query($connect,$sql) or die(mysqli_error($connect));
							$count=mysqli_num_rows($ex0);
				if($count)
				{			    
echo "<br><center><strong>Welcome ".$_SESSION['username'].".<br> </strong></center><br><br>";

		if(isset($_POST['submit']))
		{
			$username = $_POST["uname"];
			$cindate  = $_POST["cindate"];
			$coutdate = $_POST["coutdate"];
			$nrooms	  = $_POST["nrooms"];
			$ct		  = $_POST["ct"];
			$type	  = $_POST["type"];
			$optn	  = $_POST["optn"];  
			$ndays=noofdays($cindate,$coutdate);


			
			//********************Checking if room is available*********************//
			
			if($ct=='Room')
			{	
				if($type=='Suite')
					$optn='Ac';
				$sql="SELECT * FROM roomtypes WHERE roomtype='$type' AND ac='$optn' ";
				$room=mysqli_query($connect,$sql) or die(mysqli_error($connect));
				$cntr=mysqli_num_rows($room);
				if($cntr>0)
				{						
					while($rod=mysqli_fetch_assoc($room))
					{
						$roomno=$rod['roomno'];
						$sql1="SELECT * FROM roombooking WHERE roomno='$roomno' ORDER BY checkoutdate ";
						$roomcheck=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
	    		    	$cnt=mysqli_num_rows($roomcheck);
						if($cnt==0)
						{
							$room_count++;
							switch($room_count)
							{
								case 1:$room1=$roomno;
										break;
								case 2:$room2=$roomno;
										break;
								case 3:$room3=$roomno;
										break;
								case 4:$room4=$roomno;
										break;
								case 5:$room5=$roomno;
										break;
								default :break;
							}
						}
						else if($cnt>0)
						{
							$roomavail='No';
							while($row=mysqli_fetch_assoc($roomcheck))
			          		{	
								$rno=$row['roomno'];
								$cin=$row['checkindate'];
								$cind=strtotime($cin);
							
								$cout=$row['checkoutdate'];
								$coutd=strtotime($cout);
								
								$entered_cin=strtotime($cindate);
								$entered_cout=strtotime($coutdate);
								
								if($coutd<$entered_cin)
									$roomavail='Yes';
								else
									$roomavail='No';
							}
							if($roomavail=='Yes')
							{
								$room_count++;
								switch($room_count)
								{
									case 1:$room1=$roomno;
											break;
									case 2:$room2=$roomno;
											break;
									case 3:$room3=$roomno;
											break;
									case 4:$room4=$roomno;
											break;
									case 5:$room5=$roomno;
											break;
									default :break;
								}
							}
						}
					}							
					echo"</table>";
					/////************End of room checking***************************///
					
					if($room_count==0)
						die("Sorry No rooms are available.");
					else if($room_count==1)
						echo "Yes room is available";	
					else
						echo "<b><center>Yes rooms are available</center></b>";
					if($room_count<$nrooms)
						echo "<br><br>Sorry, Only $room_count $type $optn rooms available.";

					$nrooms=$room_count<$nrooms?$room_count:$nrooms;
					if($room_count>=1)
					{
						if($nrooms==1)
							$rooms_got=$room1;
						else if($nrooms==2)
							$rooms_got=$room1.",".$room2;
						else if($nrooms==3)
							$rooms_got=$room1.",".$room2.",".$room3;
						else if($nrooms==4)
							$rooms_got=$room1.",".$room2.",".$room3.",".$room4;
						else if($nrooms==5)
							$rooms_got=$room1.",".$room2.",".$room3.",".$room4.",".$room5;
					}
					
				
					//Room Tarriffs.
					if($optn=='Ac')
					{
						if($type=='Single')
							{
							$sql2="SELECT rate FROM tariff WHERE no='2'";
							$ext=mysqli_query($connect,$sql2);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
						else if($type=='Deluxe')
							{
							$sql3="SELECT rate FROM tariff WHERE no='4'";
							$ext=mysqli_query($connect,$sql3);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
						else if($type=='Suite')
							{
							$sql4="SELECT rate FROM tariff WHERE no='5'";
							$ext=mysqli_query($connect,$sql4);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
					}
					else
					{
						if($type=='Single')
						{
						$sql="SELECT rate FROM tariff WHERE no='1'";
						$ext=mysqli_query($connect,$sql);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
							else if($type=='Deluxe')
							{
							$sql="SELECT rate FROM tariff WHERE no='3'";
							$ext=mysqli_query($connect,$sql);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
					}
					
					if($type=='Suite')
						{
						$sql="SELECT rate FROM tariff WHERE no='5'";
						$ext=mysqli_query($connect,$sql);
            				$row = mysqli_fetch_assoc($ext);
           					 $rate = $row['rate'];
						}
				}
			}
			else if($ct=='Hall')
			{
				$sql="SELECT rate FROM tariff WHERE no='6'";
				$ext=mysqli_query($connect,$sql);
            	$row = mysqli_fetch_assoc($ext);
           		$rate = $row['rate'];
				$type='Hall';
				$optn='-';
				
				$sql1="SELECT * FROM hallbooking ORDER BY checkoutdate";
				$hallcheck=mysqli_query($connect,$sql1);
				$hcnt=mysqli_num_rows($hallcheck);
				if($hcnt==0)
				{
					$hallavail='Yes';
				}
				else if($hcnt>0)
				{
					$hallavail='No';
					while($hrow=mysqli_fetch_assoc($hallcheck))
					{
						$cin=$hrow['checkindate'];
						$cind=strtotime($cin);
							
						$cout=$hrow['checkoutdate'];
						$coutd=strtotime($cout);
														
						$entered_cin=strtotime($cindate);
						
						if($coutd<$entered_cin)
							$hallavail='Yes';
						else
							$hallavail='No';
					}
				}
				
				if($hallavail=='Yes')
					echo "Hall available";
				else
					die("Sorry Hall Not available.");
				$nrooms=1;
				$rooms_got='-';
				$room_count=1;
			}
			
			if($ct=='Hall')
			{
				$noofrooms='-';
				$tot_rate=$rate*$ndays;
			}
			else
			{
				$rate=1000;
				$noofrooms=$room_count<$nrooms?$room_count:$nrooms;
				$tot_rate=1000*$ndays*$noofrooms;
			}
			echo "<table border='0' style='color:#FFFFFF; background-color:#003300; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif' align='center'><form action='resconfirm.php' method='post';>
					<tr>
						<td>Username</td><td><input type='text' name='username' value='$username' onFocus='this.blur()'></td>
					</tr> 
					<tr>
						<td>No of Rooms</td><td><input type='text' name='nrooms' value='$noofrooms' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Room No(s)</td><td><input type='text' name='roomno' value='1' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Check In</td><td><input type='text' name='cindate' value='$cindate' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Check Out</td><td><input type='text' name='coutdate' value='$coutdate' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Room Type</td><td><input type='text' name='type' value='$type' onFocus='this.blur()'>
						<input type='hidden' name='ct' value='$ct'>
						<input type='hidden' name='optn' value='$optn'></td>
					</tr>
					<tr>
						<td>AC?</td><td><input type='text' name='ac' value='$optn' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>No of Days</td><td><input type='text' name='ndays' value='$ndays' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Rate Per Room Per Day</td><td><input type='text' name='rateperroom' value='$rate' onFocus='this.blur()'></td>
					</tr>
					<tr>
						<td>Total Rate</td><td><input type='text' name='rate' value='$tot_rate' onFocus='this.blur()'></td>
					</tr>
					<tr>
							<td></td>&nbsp;<td><input type='submit' name='book' value='Confirm Booking And Pay' style='background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove'></td>
					</tr>
					</form></table>";
				die();
		}
		else
		{
?>
<form action="" method="post" name="register" onSubmit="return validateRes()">
		    <tr>
		        <td><span class="style24">User name:</span></td>
	          <td><input id="uname" name="uname" type="text" value="<?php echo $_SESSION['username'];?>" onFocus="this.blur()"/>        </td>
		    </tr>
      		<tr>
        		<td><span class="style24">Checkin date:</span></td>
       		  <td><span class="style6"><input type="text" name="cindate" onblur="cincheck()"/></span><a href="javascript:showCal('Calendar1')" class="style26 style29"><font color="#FFFF99">Select Date</font></a></td>
      		</tr>
      		<tr>
        		<td><span class="style24">Checkout date:</span></td>
       		  <td><span class="style6"><input type="text" name="coutdate" onblur="coutcheck()"/>
       		  </span><span class="style27"><a href="javascript:showCal('Calendar2')" class="style26"><font color="#FFFF99">Select Date</font></a></span></td>
      		</tr>
      		<tr>
        			<td><span class="style1">Room category:</span></td>
        		<td>        		  <select name="ct" onChange="showDiv(this.value);" onblur="checkcategory()">
                  	<option selected="selected" value="default" disabled>Select Room</option>
                    <option value="Room">Room</option>
                    <option value="Hall">Hall</option>
                  </select>

                  <p id="Room" class="hiddenDiv">
        		  <font color="#FFFFFF">Type :<select name="type">
            		<option selected="selected">Single </option>
		            <option>Deluxe</option>
		            <option>Suite</option>
		 	        </select>
		            <select name="optn">
            		<option>Ac</option>
		            <option selected="selected">Non ac</option>
          			</select><br><br>
                    No. of rooms:
          			<select name="nrooms">
          			<option selected="selected">1</option>
            		<option>2</option>
            		<option>3</option>
            		<option>4</option>
            		<option>5</option>
                  </select></font>
                  </p></td>
   		  </tr>
      		<tr>
		        <td>&nbsp;</td>
       		  <td><input name="submit" type="submit" value="Check availability" style="background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove" /></td>
		    </tr>
   		</form>
   	  </table>         
<?php 
		}}
	 else
    {	
        header("Location:login.php");
    }}
?></td>
  </tr></table>

</body>
</html>
