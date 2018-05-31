<html>
<head><title>Index-HDS</title><head/>
<body>
<h1>Comments</h1>

<form name="comment" method="post" action="#">
<label><h3>Enter Your Name :<h3/><label/>
<label>Name<label/><input type ="text" name= "name"/>
<label><h3>please enter your Comment here :</h3><label/>

<textarea cols="50" rows="10" placeholder="your comment please" name="comment" ></textarea><br>
  <input type="submit" name="btn_comment" value="Submit Comment" />
  
 </form>
<?php

if(isset($_POST["btn_comment"]))
{     $name = $_POST["name"];
	//$type = $_POST["user"];
	$comment = $_POST["comment"];
	
	$con= mysqli_connect("localhost","root","");
	mysqli_select_db($con,"ssAssign");
	$sql = "INSERT INTO tblcomment (name, comment) VALUES('$name','$comment')";
	$result = mysqli_query($con,$sql);
	
	echo"LEATEST COMMENNT ".$comment;
	
}

?>


</body>
</html>