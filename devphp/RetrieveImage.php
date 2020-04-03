
<html>
<head>
<title>Untitled Document</title>
<style>
	img{
		height:300px;
		width:300px;
		float:left;
		margin:10px;	
	}
	h2{
		color:hsla(320,100%,30%,1);
		text-transform:capitalize;	
	}
</style>
</head>

<body>
<?php
$txname ="";
$temp = "";
	if(isset($_POST['show']))

{
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists image")or die(mysqli_error($con));
	
	mysqli_query($con,"use image") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists imagetb(name varchar(100) primary key,pic varchar(100))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select * from imagetb") or die(mysqli_error($con));
	
	while($row = mysqli_fetch_array($rs))
	{
		echo "<h2>$row[0]</h2>";
		echo "<img src='$row[1]'/> <br>";	
		
	}
}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="submit" value="Show" name="show"/>
</form>
</body>
</html>