
<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php

$min = $max = "";
if(isset($_GET['show']))
{
	$min = $_GET['min'];
	$max = $_GET['max'];
	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists phpdb")or die(mysqli_error($con));
	
	mysqli_query($con,"use phpdb") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists salarytb(emp_id int auto_increment,desg varchar(100),basic_sal float,ta float,hra float,tax float,net_sal float,primary key(emp_id))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select * from salarytb where net_sal>=$min and net_sal <=$max ")or die(mysqli_error($con));
	
	echo "  
	<table border='1'> <tr>
	<th> Employee ID </th>
	<th> Desgination </th>
	<th> Basic Salary </th>
	<th> TA </th>
	<th> HRA </th>
	<th> Tax </th>
	<th> Net Salary </th>
	</tr> ";
	while($row = mysqli_fetch_array($rs))
	{
		echo "<tr>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['desg']."</td>";
		echo "<td>".$row['basic_sal']."</td>";
		echo "<td>".$row['ta']."</td>";
		echo "<td>".$row['hra']."</td>";
		echo "<td>".$row['tax']."</td>";
		echo "<td>".$row['net_sal']."</td>";
		echo "</tr>";
	}
	echo "<table>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
<h2>Salary Range</h2>

<input type="text" name="min" value="<?php echo $min ?>"/>
<h4> To </h4>
<input type="text" name="max" value="<?php echo $max ?>"/>
<br>

<input type="submit" value="Show Records" name="show" />
</form>
</body>
</html>