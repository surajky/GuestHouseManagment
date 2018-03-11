<?php include 'header.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="validcontact.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SaiSuraj-Reach us</title>
<style type="text/css">
body{
  background-color: #e9ece5;
}
tr{
  background-color: #b3c2bf;
</style>
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
  

<?php
$connect = mysqli_connect("localhost","root","");
	  require('connect.php');
if(isset($_POST['submit']))
{
require("connect.php");
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

$sql="INSERT INTO contact VALUES('1', '$name','$email','$phone','$message')";

$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
if($result)
{

echo "<script type=\"text/javascript\">
alert(\"message sent\");
</script>";
}
else
header("Location:contact.php");

}
?>
</head>

<body>
<blockquote >
    <tr >
      <th height="100" colspan="5" scope="row"><table width="658" height="400" align="center" bgcolor="#003300">
          <form action="" method="post" name="f" onsubmit="return validateEnquiry(this);">
            <h3 align="center">Enquiry</h3>
            
            <tr>
              <th width="159" scope="row"><div align="left"><span class="style12">Your Name :</span></div></th>
              <td width="197"><label>
                  <div align="left">
                    <input name="name" type="text" size="30" maxlength="20" onblur="checkname()"/>
                  </div>
                </label>
              </td>
            </tr>
            <tr>
              <th scope="row"><div align="left"><span class="style12">Your E-mail :</span></div></th>
              <td><label>
                  <div align="left">
                    <input name="email" id="email" type="text" size="30" onblur="checkemail()" />
                  </div>
                </label></td>
            </tr>
            <tr>
              <th scope="row"><div align="left"><span class="style12">Your Contact No.</span></div></th>
              <td><label>
                  <div align="left">
                    <input name="phone" type="text" size="30" maxlength="12" onkeypress="return isNumberKey(event)"/>
                  </div>
                </label></td>
            </tr>
            <tr>
              <th scope="row"><div align="left"><span class="style12">Your message :</span></div></th>
              <td><label>
                  <div align="left">
                    <textarea name="message" cols="30" onblur="checkmessage()"></textarea>
                  </div>
                </label></td>
            </tr>
            <tr>
              <th scope="row"><span class="style14">
                <label></label>
                <input type="reset" name="reset" value="Reset" style="background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove"/>
              </span></th>
              <td><label>
                <input type="submit" name="submit" value="Submit" style="background-color:#ffff99; border-left-style:double; font-size:18px;color:#400000; border:groove" />
              </label></td>
            </tr>
          </form>
        
      </table></th>
    </tr>
  </table>
</blockquote>

</body>
</html>
<?php include 'footer.php';?>