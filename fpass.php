<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="validpass.js"></script>
<script type="text/javascript" src="validnewpass.js"></script>
<SCRIPT language=Javascript>
      <!--
    function Name()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.username;
	
	if(fn.value=="")
	{		fn.style.background = 'Yellow';

		alert("You didnt enter the Username.\n");
	}
	
	else
	{
		fn.style.background = 'White';
	}
}

function checksecquestion(fld) {
	  	var error = "";
			theForm=document.forms['f'];
	var fld=theForm.secquestion;

		if(fld.value == 'default') {
		fld.style.background = 'Yellow';
        alert("Please select the security question.\n");
		}
    else
	{
		fn.style.background = 'White';
	}
}

function checkpass()
{
	var error="";
	theForm=document.forms['f2'];

	var pass=theForm.npass;

if(pass.value=="")
	{		pass.style.background = 'Yellow';

		error += "You didnt enter the password.\n";
	}
	else if ((pass.value.length < 5) ) {
        pass.style.background = 'Yellow';
        error = "The password must be min 5 character long.\n";
    }

	if(error=="")
	{
		pass.style.background = 'White';
	}
	else
	{
		alert(error);
	}
}

function checkconfirpass()
{
	var error="";
	theForm=document.forms['f2'];

	var pass=theForm.npass;
	var confpass=theForm.cpass;

if(confpass.value=="")
	{		confpass.style.background = 'Yellow';

		error += "You didnt enter the confirmation password.\n";
	}
	
	else if(pass.value != confpass.value)
	{
		if(pass!=confpass){
				confpass.style.background = 'Yellow';
			error += "Confirmation password mismatch.\n";
	}}
	
	if(error=="")
	{
		confpass.style.background = 'White';
	}
	else
	{
		alert(error);
	}
}

function Secans()
{
	var error="";
	theForm=document.forms['f'];
	var fn=theForm.secanswer;
	
	if(fn.value=="")
	{		fn.style.background = 'Yellow';

		alert("You didnt enter the Current password.\n");
	}
	
	else
	{
		fn.style.background = 'White';
	}
}

    //-->
   </SCRIPT>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-Forgot password</title>
<style type="text/css">
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
body {
	background-image: url(img/divider.gif);
}
.style15 {font-size: 18px}
.style20 {	font-size: 14px;
	color: #CCCCCC;
}
.style21 {color: #000000}
.style18 {font-size: 36px;
	color: #FFFF99;
}
.style34 {color: #FFFF99;
	font-size: 36px;
}
.style35 {
	color: #F0F0F0;
	font-size: 24px;
}
.style37 {color: #FFFFFF; font-weight: bold; font-size: 24px; }
.style39 {color: #FFFFFF; font-size: 24px; }
.style40 {font-size: 24px}
</style>
</head>

<body>
<div align="center"><span class="style20"><img src="images/logo4.png" alt="" width="60" height="50" /><span class="style34">HOTEL <strong> SAI SURAJ </strong></span> <span class="style18"> INTERNATIONAL</span></span>
</div>
<table width="940" border="0" align="center" background="img/aa.png" bgcolor="#333333">
  <tr>
    <th height="275" colspan="6" scope="row"><img src="images/room2.jpg" alt="" width="900" height="258" border="10" style="border:thick; border-color:#000000" /></th>
  </tr>
  <tr>
    <th height="60" colspan="6" scope="row"><a href="index.html"><img src="img/home3.png" alt="" width="150" height="50"/></a><a href="aboutus.html"><img src="img/aboutus3.png" alt="" width="150" height="50" onclick="aboutus.html" /></a><a href="login.php"><img src="img/bk3.png" alt="" width="150" height="50" /></a><a href="tourplace.html"><img src="img/tplc3.png" alt="" width="150" height="50" /></a><a href="lmap.html"><img src="img/lmp3.png" alt="" width="150" height="50" /></a><a href="contact.php"><img src="img/enq.png" alt="" width="150" height="50" /></a></th>
  </tr>
  <tr>
    <th height="60" colspan="6" scope="row"><marquee direction="left" behavior='alternate' onmouseover="this.stop()" onmouseout="this.start()" loop="-1" truespeed="truespeed">
          <img src="images/dine_3.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine.jpg" width="140" height="90" />&nbsp;<img src="images/lobby.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_3.jpg" width="140" height="90" />&nbsp;<img src="images/lounge.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/suite_1.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/dine_2.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/hall.jpg" alt="" width="140" height="90" />&nbsp;<img src="images/restaurant.jpg" alt="" width="140" height="90" />
          </marquee></th>
  </tr>
  <tr>
    <th width="277" height="356" scope="row"><a href="facilities.html"><img src="images/facilities.jpg" alt="" width="226" height="161" /></a><br />
    <br /><a href="tariff.php"><img src="images/tariff.jpg" width="226" height="72" /></a><br /><br /> <a href="lmap.html"><img src="images/location.jpg" width="226" height="73" /></a></th>
   
    <td width="653">
    <?php
   error_reporting(0);
  	  require('connect.php');
	  if(isset($_POST['submit']))
    {       require('connect.php');
			$user		=$_POST['username'];
		$secquestion=$_POST['secquestion'];
		$secanswer	=$_POST['secanswer'];

	       	$checkquestion	= mysql_query("SELECT security_question FROM registration WHERE user='$user' ");
		 	$row 			= mysql_fetch_assoc($checkquestion);
            $secques 		= $row['security_question'];

            if($secquestion != $secques)
			{
			echo "<script type=\"text/javascript\">
alert(\"Incorrect question.Please enter correct value and try again!!! \");
</script>";
}				
      		else
			{
				$checkanswer	=mysql_query("SELECT answer FROM registration WHERE user='$user' ");
				$row 			=mysql_fetch_assoc($checkanswer);
            	$answer 		=$row['answer'];
				if($secanswer != $answer)
				{
				echo "<script type=\"text/javascript\">
alert(\"Incorrect answer.Please enter correct value and try again!!! \");
</script>";
}
				else
				{
				echo "<form name='f2' onsubmit='return validForgetpass(this);' action='newpass.php' method='POST'>";
				echo " <table align='center' bgcolor='maroon'>";
				echo "	<tr> 
						<th> <span class='style1'>User</span></th>
						<td><input type='text' name='user' value='$user' onfocus='this.blur()'> </td>
						</tr>
						<tr> 
						<td><span class='style1'>New Password:</span></td>
						<td> <input type='password' name='npass' onblur='checkpass()'> </td>
						</tr>
						<tr>
						<td> <span class='style1'>Confirm Password:</span></td>
						<td> <input type='password' name='cpass' onblur='checkconfirpass()'></td>
						</tr>
						<tr>
						<td> &nbsp;</td>
						<td> <input type='submit' name='changepass' value='update pass' style='background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove'></td>
						</tr>";
				echo	"</table>";
				echo	"</form>";
				die("");
						}
						
	}}
?>
<form action="" method="post" name="f" id="f" onsubmit="return validForgetpassword(this);">
      <span class="style21"><br />
      </span>
      <center class="style21">
      </center>
      <span class="style21"><br />
      </span><br />
      <center>
        <table width="636" border="0" align="center" cellpadding="5" cellspacing="5" background="img/bg1.jpg">
          <tr>
            <td colspan="3"><div align="center" class="style1 style35">FORG0T PASSWORD</div></td>
          </tr>
          <tr>
            <td width="1">&nbsp;</td>
            <td width="275"><span class="style37">User Name:</span></td>
            <td width="286"><input name="username" type="text" size="30" maxlength="15" onblur="Name()"/>            </td>
            <td width="9">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><strong><span class="style39">Security Question:</span></strong></td>
            <td><label>
              <select name="secquestion" id="secquestion" onblur="checksecquestion()">
                <option value="Which is your favourite dessert?">Which is your favourite dessert?</option>
                <option value="Which is your favourite juice?">Which is your favourite juice?</option>
                <option value="which is your favourite dish?">which is your favourite dish?</option>
                <option value="where did you celebrate your last birthday?">where did you celebrate your last birthday?</option>
                <option value="which is your favourite hotel?">which is your favourite hotel?</option>
                <option selected="selected" disabled="disabled" value="default">choose a question?</option>
              </select>
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style39"><strong>Security Answer :</strong></span></td>
            <td><input name="secanswer" type="text" size="30" maxlength="15" onblur="Secans()"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div align="center" class="style40">
                  <input name="reset" type="reset" id="reset" style="background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove" value="Reset" />
                </div>
              <span class="style40">
              </label>
              </span></td>
            <td><div align="center">
                <input type="submit" style="background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove" name="submit" id="submit" onfocus="" value="Submit" />
            </div></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </center>
    </form></td>
  </tr></table>
<p align="center"><span class="style15"><a href="index.html"><font color="#FF0000">Home</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="aboutus.html"><font color="#FF0000">About us</font></a>&nbsp;&nbsp; &nbsp;| &nbsp;&nbsp;&nbsp; <a href="login.php"><font color="#FF0000">Booking</font></a>&nbsp;&nbsp;&nbsp; | &nbsp; &nbsp;&nbsp;<a href="tourplace.html"><font color="#FF0000">Tourism places</font></a>&nbsp; &nbsp;&nbsp;| &nbsp;&nbsp; &nbsp;<a href="lmap.html"><font color="#FF0000">Location map</font></a>&nbsp;&nbsp; &nbsp;| &nbsp; &nbsp;&nbsp;<a href="contact.php"><font color="#FF0000">Enquiry</font></a>&nbsp;&nbsp; | &nbsp;</span></p>
</body>
</html>
