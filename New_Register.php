<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>Username : </td>
				<td><input type="text" name="txtUser" required /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="txtPwd" required/></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="btnRegister" value="Register"/></td>
			</tr>
		</table>
	</form>
<?php
if(isset($_POST['btnRegister']))
	{	
		$username = $_POST['txtUser'];
		$password = $_POST['txtPwd'];
		$con = mysqli_connect("localhost","root","","userdb");
		$stmt = $con->prepare("INSERT INTO tbluser VALUES(?,?)");
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();
		$stmt->close();
		$con->close();
		header('Location:Main_page.php');
	}
?>
</body>
</html>