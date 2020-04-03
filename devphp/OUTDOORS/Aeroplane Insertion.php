<html>
<head>
<title>Untitled Document</title>
<link href="Aeroplane Insertion.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

	$name = $code ="";	
	$cbairline = "";
	$airline_name = "";
	if(isset($_GET['fillairline']))
	{
		$name = $_GET['name'];
		$code = $_GET['code'];
		$cbairline = $_GET['cbairline'];
		
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airlinetb(id varchar(20),name varchar(100),primary key(id))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select * from airlinetb where id = '$cbairline' ")or die(mysqli_error($con));
	
	$row = mysqli_fetch_array($rs);
	
	$airline_name = $row['name'];
			
	}
		if(isset($_GET['insert']))
	{	

		$code = $_GET['code'];
		$name = $_GET['name'];
		
		$cbairline = $_GET['cbairline'];
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));

	mysqli_query($con,"create table if not exists airline$cbairline(aeroplane_code varchar(3),aeroplane_name varchar(100),primary key(aeroplane_code))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into airline$cbairline(aeroplane_code,aeroplane_name) values('$code','$name')")or die(mysqli_error($con));
	
		$name = $code ="";	
		$cbairline = "";
		
	}


?>
<section class="section">
<div class="main_from--div">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table align="center" cellpadding="10px" >

        	<caption class="table_caption"> Aeroplane Insertion Form </caption>
        
        <tr>
        	<td colspan="2"> Aeroplane Code </td>
            <td colspan="2"> <input type="text" name="code" value="<?php echo $code ?>"/> </td>
        </tr>
        <tr>
        	<td colspan="2"> Aeroplane Name </td>
            <td colspan="2"> <input type="text" name="name" value="<?php echo $name ?>"/> </td>
        </tr>
        <tr>
        	<td colspan="2"> Airline ID </td>
            <td colspan="2"> <select name="cbairline">
            	<option> Select Airline </option>
            <?php 
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airlinetb(id varchar(20),name varchar(100),primary key(id))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select id from airlinetb")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($rs))
	{
		$id = $row['id'];
		echo "<option ";
		if($id == $cbairline)
			echo "selected";
			
		echo " > $id </option>";
	}
			?>
            </select> </td>
            
    
        </tr>
        
        <tr>
        	<td colspan="2"> Airline Name </td>
            <td colspan="2"> <input type="text" value="<?php echo $airline_name ?>" disabled /> </td>
        </tr>       
        <tr>
			<td colspan="2"> <input type="submit" value="Fill Airline" name="fillairline" class="navigation"/> </td> 
            <td colspan="2"> <input type="submit" value="Insert" name="insert" class="navigation"/> </td>
        </tr>
    
	</table>
</form>
</div>
</section>
</body>
</html>