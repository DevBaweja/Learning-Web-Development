<html>
<head>
<title>Untitled Document</title>
<link href="Airport Insertion.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
	
		$code = $name = $state = $city ="";

        if(isset($_GET['showcity']))
		{
			$code = $_GET['code'];
			$name = $_GET['name'];
			$state = $_GET['cbstate'];
		}
	
	
		if(isset($_GET['insert']))
	{	
		$code = $_GET['code'];
		$name = $_GET['name'];
		$state = $_GET['cbstate']; 
		$city = $_GET['cbcity'];

		
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into airporttb(code,name,state,city) values('$code','$name','$state','$city')")or die(mysqli_error($con));
	
	$code = "";
	$name ="";
	$state = "";
	$city = "";
	
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
    	
        
        <caption class="table_caption"> Airport Insertion Form </caption>
        <tr>
        	<td colspan="2"> Airport Code </td>
            <td colspan="2"> <input type="text" name="code" value="<?php echo $code ?>"/> </td>
        </tr>
        <tr>
        	<td colspan="2"> Airport Name </td>
            <td colspan="2"> <input type="text" name="name" value="<?php echo $name ?>"/> </td>
        </tr>
        <tr>
        <td colspan="2">
     State 
         </td>
         <td colspan="2">     
        <select name="cbstate">
            	<option> Select State </option>
     <?php
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists state")or die(mysqli_error($con));
	
	mysqli_query($con,"use state") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select distinct city_state from cities")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $state)
			echo "selected";
		echo" > $id </option>";
	}
	?>
            </select> </td>
            </tr>
            
            <tr>
            <td colspan="2">
        	 City 
             </td>
             <td colspan="2">
           <select name="cbcity">
            	<option> Select City</option>   
  <?php
        if(isset($_GET['showcity']))
	{
		//$name = $_GET['name'];
		//$state = $_GET['cbstate'];
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists state")or die(mysqli_error($con));
	
	mysqli_query($con,"use state") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select distinct city_name from cities where city_state='$state'")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $city)
			echo "selected";
		echo" > $id </option>";
	}
	
	}
	?>
          </select> </td> </tr>
	
        <tr>

            <td colspan="2"> <input type="submit" value="Insert" name="insert" class="navigation"/> </td>
        	<td colspan="2"> <input type="submit" value="Fill City" name="showcity" class="navigation"/> </td> 
         </tr>
           
    
	</table>
</form>
</div>
</section>

</body>
</html>