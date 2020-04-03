
<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php
	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists phpdb")or die(mysqli_error($con));
	
	mysqli_query($con,"use phpdb") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists salarytb(emp_id int auto_increment,desg varchar(100),basic_sal float,ta float,hra float,tax float,net_sal float,primary key(emp_id))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into salarytb(desg,basic_sal,ta,hra,tax,net_sal) values('Manager',25000,5.7,10.24,3.2,30000)")or die(mysqli_error($con));
?>

</body>
</html>