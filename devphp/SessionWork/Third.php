<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['sbLog']))
{
	unset($_SESSION['name'],$_SESSION['pass']);
	//session_destroy();
	echo "<script>window.location.assign('first.php');</script>";	
}
else
{
	echo "Hello ".$_SESSION['name'];
	echo "Password is ".$_SESSION['pass'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="submit" value="Logout" name="sbLog" />
</form>    
</body>
</html>