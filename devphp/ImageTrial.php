<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
$txname ="";
$temp = "";
	if(isset($_POST['insert']))
{
	
	$txname = $_POST['txname'];
	$temp = $_FILES['imgfile']['tmp_name'];
	$img = $_FILES['imgfile']['name'];
	$size = $_FILES['imgfile']['size'];
	$ext = $_FILES['imgfile']['type'];
	
	echo "<h2> $txname </h2> ";
	echo "<h2> $temp </h2> ";
	echo "<h2> $img </h2> ";
	echo "<h2> $size </h2> ";
	echo "<h2> $ext </h2> ";
	
	if(is_uploaded_file($temp))
	{
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists image")or die(mysqli_error($con));
	
	mysqli_query($con,"use image") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists imagetb(name varchar(100) primary key,pic varchar(100))") or die(mysqli_error($con));
	
		if(!file_exists("images"))
		mkdir("images");
		
		
		$img = "images/$img";
		move_uploaded_file($temp,$img);
		echo "<h2> Can Be Uploaded </h2>";
	}
	else 
	echo "<h2> Cann't Be Uploaded </h2>";	
	
	 mysqli_query($con,"insert into imagetb(name,pic) values('$txname','$img') ") or die(mysqli_error($con));
}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	Name: <input type="text" name="txname" value="<?php echo $txname ?>"/>
    File: <input type="file" name="imgfile"/>
    <input type="submit" value="Save" name="insert"/>
</form>

</body>
</html>