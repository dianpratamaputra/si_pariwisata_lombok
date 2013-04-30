<style type="text/css">
body {
	background-color: #343434;
	font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Sans-Serif;
}
p {
	font-size: 13px;
	color: #305357;
	line-height: 22px;
}
.desc {
	margin-top: 10px;
	margin-right: 20px;
	margin-bottom: 10px;
	margin-left: 20px;
}
.text {
	width: 250px;
	height: 30px;
	border-radius: 4px;
	border: 1px solid #D6E4EF;
	background-color: #fafbff;
	font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Sans-Serif;
	font-size: 13px;
}
.submit {
	background-image: url(images/submit_15.gif);
	background-repeat: no-repeat;
	display: block;
	height: 37px;
	width: 67px;
	text-indent: -1000px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	cursor: pointer;
}
.submit2 {
	background-image: url(images/submit_12.gif);
	background-repeat: no-repeat;
	display: block;
	height: 39px;
	width: 76px;
	text-indent: -1000px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	cursor: pointer;
}
</style>
<?php
error_reporting(0);
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password=md5($_POST['password']);
$cek = mysql_query("select * from admin where username='$username' and password='$password'");
$ada = mysql_num_rows($cek);
if($_POST['login']){
	if ($ada == 1){
	session_register("username");
	session_register("password");
		$_SESSION['username'] = $ada['username'];
    	$_SESSION['namauser'] = $ada['namauser'];
        $_SESSION['password'] = $ada['password'];
			?>
			<script>
				window.location.href='../inc_admin';
			</script>
			<?php
		}else{
			$gagal="<p class=\"desc\" style=\"color:red;\"><blink>Username atau Password Anda Salah</blink></p>";
	}
}
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="#">
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/top_login_03.gif" width="400" height="36"></td>
  </tr>
  <tr>
    <td bgcolor="#fafbff"><p class="desc">Silahkan mengisi username dan password untuk login menuju sistem :</p>
     <?php echo"$gagal"; ?> </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" style="background-image:url(images/garis_07.gif); background-repeat:repeat-x;">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="360" height="75" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="83"><p><label for="username">Username :</label></p></td>
        <td width="277">
          <input name="username" type="text" class="text" id="username"></td>
      </tr>
      <tr>
        <td><p><label for="password">Password :</label></p></td>
        <td>
          <input name="password" type="password" class="text" id="password"></td>
      </tr>
    </table>
    <br></td>
  </tr>
  <tr>
    <td height="53" style="background-image:url(images/bottom_login_06.gif)"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="67"><input name="login" type="submit" class="submit" id="button" value="Login"></td>
        <td width="75"><input name="reset" type="submit" class="submit2" id="button2" value="Reset"></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
