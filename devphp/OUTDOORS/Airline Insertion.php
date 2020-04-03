<html>
<head>
<title>Untitled Document</title>
<link href="Airline Insertion.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php
	
	$id = $name = "";
		if(isset($_GET['insert']))
	{	
		
		$id = $_GET['id'];
		$name = $_GET['name'];

		
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airlinetb(id varchar(20),name varchar(100),primary key(id))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into airlinetb(id,name) values('$id','$name')")or die(mysqli_error($con));
	
	echo "Insertion Successfull";
	}
	
	if(isset($_GET['refresh']))
	{
		$id = $name = $code ="";	
	}

?>
<section class="section">
<div class="main_from--div">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table align="center">
    	
        <caption class="table_caption"> Airline Insertion Form </caption>
        
        <tr>
        	<td colspan="2"> Airline ID </td>
            <td colspan="2"> <input type="text" name="id" value="<?php echo $id ?>"/> </td>
        </tr>
        <tr>
        	<td colspan="2"> Airline Name </td>
            <td colspan="2"> <input type="text" name="name" value="<?php echo $name ?>"/> </td>
        </tr>
        <tr>

            <td colspan="2"> <input type="submit" value="Insert" name="insert" class="navigation"/> </td>
        	<td colspan="2"> <input type="submit" value="Refresh" name="refresh" class="navigation"/> </td>
        </tr>
    
	</table>
</form>
</div>
</section>
</body>
</html>