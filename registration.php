
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="formvalidation.js"></script>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
   <script type="text/javascript">
<!--
	var letters=' ABCÇDEFGHIJKLMNÑOPQRSTUVWXYZabcçdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ'
	var numbers='1234567890'
	var signs=',.:;@-\''
	var mathsigns='+-=()*/'
	var custom='<>#$%&?¿'

	function alpha(e,allow) 
	{
		var k;
		k=document.all?parseInt(e.keyCode): parseInt(e.which);
		return (allow.indexOf(String.fromCharCode(k))!=-1);
	}

// -->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.style1 {color: }
.style2 {
	color:#c0dfd9;
	font-size: 18px;
	font-style: italic;
	font-weight: bold;
}
.style3 {color:#3b3a36}
body {
	background-color: #e9ece5;
}

</style>
<?php
$connect = mysqli_connect("localhost","root","");
error_reporting(0);
if(isset($_POST['submit']))
{
	  require('connect.php');

$fname=$_POST["fname"];
$username=$_POST["username"];
$password=$_POST["password"];
$gender=$_POST["sex"];
$city=$_POST["city"];
$state=$_POST["state"];
$country=$_POST["country"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$secquestion=$_POST["secquestion"];
$secanswer=$_POST["secanswer"];

		$sql="SELECT * FROM registration WHERE user='$username' ";
       $extract1=mysqli_query($connect,$sql);
        $count=mysqli_num_rows($extract1);

        if($count == 0)
        {
	
$sql="INSERT INTO registration VALUES(1, '$fname','$username','$password','$gender','$city','$state','$country','$phone','$email','$secquestion','$secanswer')";

$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
if($result)
{
			echo "Registration done";
			header('Location:login.php');
}
else
	{		echo "<script type=\"text/javascript\">
alert(\"Registration failed\");
</script>";
}}
else
{
	 echo "<center><font face='Arial' size='6' color='white'>We cannot create the account from this username.<br>So please create the account with different name.</font></center>";
}} ?>
</head>

<body>
  
<table width="937" border="0" align="center" >
  <tr bgcolor="#e9ece5">
    <th width="275" height="477" scope="row"><a href="#"><img src="images/facilities.jpg" width="226" height="161" /></a><br /><br /><a href="#"><img src="images/location.jpg" alt="" width="226" height="73" /></a><br /><br /><a href="#"><img src="images/tariff.jpg" alt="" width="226" height="72" /></a>  </th>
    <td width="652">
    <form action="" method="post" name="f" onsubmit="return validateFormOnSubmit(this);">
    <table width="492" height="559" border="0" align="left" cellpadding="5" cellspacing="5" >
      <tr bgcolor="#003300">
        <td colspan="2"><div align="center" class="style2 style29">User Registration </div></td>
      </tr>
      <tr>

        <td width="160" height="32"><span class="style31">Name:</span></td>
        <td width="297" colspan="2"><input name="fname" type="text" size="30" value="<?php echo $_POST['fname'];?>" onblur="checkfname()" onkeypress="return alpha(event,letters)"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">User Name:</span></td>
        <td colspan="2"><input name="username" type="text" size="30" onblur="checkuname()"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">Password:</span></td>
        <td colspan="2"><input name="password" type="password" size="30" value="<?php echo $_POST['password'];?>" onblur="checkpass()" />        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">Confirm Password:</span></td>
        <td colspan="2"><input name="confirmpass" type="password" size="30" value="<?php echo $_POST['confirmpass'];?>" onblur="checkconfpass()"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">Gender:</span></td>
        <td colspan="2"><span class="style1">
          <input type="radio" name="sex" value="Male" />
          Male</span><span class="style3">
          <input type="radio" name="sex" value="Female" />
          <span class="style1">Female</span></span></td>
        </tr>
      <tr>
        <td height="32"><span class="style31">City:</span></td>
        <td colspan="2"><input name="city" type="text" size="30" value="<?php echo $_POST['city'];?>" onblur="checkcity()"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">State:</span></td>
        <td colspan="2"><input name="state" type="text" size="30" value="<?php echo $_POST['state'];?>" onblur="checkstate()"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">Country:</span></td>
        <td colspan="2"><input name="country" type="text" size="30" value="<?php echo $_POST['country'];?>" onblur="checkcountry()"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">Phone Number:</span></td>
        <td colspan="2"><input name="phone" type="text" size="30" maxlength="12" value="<?php echo $_POST['phone'];?>" onkeypress="return isNumberKey(event)"/>        </td>
        </tr>
      <tr>
        <td height="32"><span class="style31">E-mail ID:</span></td>
        <td colspan="2"><input name="email" type="text" size="30" value="<?php echo $_POST['email'];?>"onblur="checkemail()"/></td>
        </tr>
      <tr>
        <td><span class="style31">Security question:</span></td>
        <td height="32" colspan="2"><select  size="1" name="secquestion" onblur="securityques()" >
            <option value="Which is your favourite dessert?">Which is your favourite dessert?</option>
            <option value="Which is your favourite juice?">Which is your favourite juice?</option>
            <option value="which is your favourite dish?"> which is your favourite dish?</option>
            <option value="where did you celebrate your last birthday?">where did you celebrate your last birthday?</option>
            <option value="which is your favourite hotel?">which is your favourite hotel?</option>
            <option selected="selected" disabled="disabled" value='default'>choose a question?</option>
          </select>        </td>
        </tr>
      <tr>
        <td><span class="style31">Answer:</span></td>
        <td height="32" colspan="2"><input name="secanswer" type="text" size="30" maxlength="30" id="ans"value="<?php echo $_POST['secanswer'];?>"  onblur="checksecqstn()"/>        </td>
        </tr>
      <tr>
        <td height="48"><span class="style1"></span></td>
        <td colspan="2"> <input type="submit" value="Submit" name="submit" style="background-color:#ffff99; color:#400000; border:groove; font-style:inherit; font-size:18px"/></td>
        </tr>
    </table>
    </form></td>
  </tr>
  <tr>
    <th height="21" colspan="2" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>

