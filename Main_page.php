<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>USERNAME : </td>
				<td><input type="text" name="txtUser" required /></td>
			</tr>
			<tr>
				<td>PASSWORD : </td>
				<td><input type="password" name="txtPwd" required/></td>
			</tr>
			<tr>
				<td><input type="submit" name="btn_Login" value="Login"/></td>
				<td><input type="submit" name="btn_NewMember" value="New Member" formnovalidate/></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
if(isset($_COOKIE["user"]))
{
	header('Location:Welcome_Page.php');
}
else
{
	if(isset($_POST['btn_Login']))
	{	
		$username = $_POST['txtUser'];
		$password = $_POST['txtPwd'];
		$con = mysqli_connect("localhost","root","","userdb");
		$stmt = $con->prepare("SELECT username,password FROM tbluser WHERE username = (?) AND password = (?)");
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result->num_rows == 1) 
		{
			setcookie("user","$username",time()+360);
    		header('Location:Welcome_Page.php');
		}
		else
			echo "No Username Password Found";
	
		$stmt->close();
		$con->close();
	}
	else if(isset($_POST['btn_NewMember']))
	{
		header('Location:New_Register.php');
	}

}
?>