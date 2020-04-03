<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	
		$from_state = $from_city ="";
		$to_state = $to_city ="";
		
	
        if(isset($_GET['show']))
		{
			
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
			
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
			
		}
		
		
	
	
		if(isset($_GET['suggest']))
	{	
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
			
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
	

			
			$from_airport_code = from();
			$to_airport_code = to();
			
								
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
			echo "<h3>From: </h3>".$from_airport_code."-";

	
	mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select name from airporttb where code='$from_airport_code' ") or die(mysqli_error($con));
	
	$row = mysqli_fetch_array($rs);
	echo $row['name'];
	
	echo "<h3>To: </h3>".$to_airport_code."-";
	
		$rs = mysqli_query($con,"select name from airporttb where code='$to_airport_code' ") or die(mysqli_error($con));
	
	$row = mysqli_fetch_array($rs);
	echo $row['name'];
	
		// Changing Database
		
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aaibackup")or die(mysqli_error($con));
	
	mysqli_query($con,"use aaibackup") or die(mysqli_error($con));
			
			mysqli_query($con,"create table if not exists from".$from_airport_code."to".$to_airport_code."tb(airline_code varchar(20),aeroplane_code varchar(3),success_rate varchar(5),primary key(aeroplane_code))") or die(mysqli_error($con));
			
			$rs = mysqli_query($con,"select * from  from".$from_airport_code."to".$to_airport_code."tb  order by success_rate desc") or die(mysqli_error($con));
		
		$airline_code_array = array();
		$aeroplane_code_array = array();
		$success_rate_array = array();
		
		$k=0;
		while($row = mysqli_fetch_array($rs))
		{
				$airline_code_array[$k] = $row[0];
				$aeroplane_code_array[$k] = $row[1];
				$success_rate_array[$k] = $row[2];
				$k++;
		}
		
		
		for($k=0;$k<count($success_rate_array) ;$k++)
		{
			echo "<h5>$airline_code_array[$k]</h5>";
			echo "<h5>$aeroplane_code_array[$k]</h5>";
			echo "<h5>$success_rate_array[$k]</h5>";	
		}

	}
	
	if(isset($_GET['refresh']))
	{
	
	}
	
	function from()
	{
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select code from airporttb where state= '$from_state' and city= '$from_city' ")or die(mysqli_error($con));
	
		$row  = mysqli_fetch_array($rs);
		return $row[0];
	}
	
	function to()
	{
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select code from airporttb where state= '$to_state' and city= '$to_city' ")or die(mysqli_error($con));
	
		$row  = mysqli_fetch_array($rs);
		return $row[0];
	}

?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table border="1" align="center">
        <tr>
        <td colspan="2">
     	State (From) 
         </td>
         <td colspan="2">     
        <select name="cb_from_state">
            	<option> Select State </option>
     <?php
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select distinct state from airporttb")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $from_state)
			echo "selected";
		echo" > $id </option>";
	}
	?>
            </select> </td>
            </tr>
                     
            <tr>
            <td colspan="2">
        	 City (From)
             </td>
             <td colspan="2">
           <select name="cb_from_city">
            	<option> Select City</option>   
  <?php
        if(isset($_GET['show']) || isset($_GET['suggest']))
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select city from airporttb where state='$from_state'")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $from_city)
			echo "selected";
		echo" > $id </option>";
	}
	
	}
	?>
          </select> </td> </tr>
          
          
     <tr>
        <td colspan="2">
     	State (To)
         </td>
         <td colspan="2">     
        <select name="cb_to_state">
            	<option> Select State </option>
     <?php
   
	 
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select distinct state from airporttb")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $to_state)
			echo "selected";
		echo" > $id </option>";
	}
	
	?>
            </select> </td>
            </tr>
              
            <tr>
            <td colspan="2">
        	 City (To)
             </td>
             <td colspan="2">
           <select name="cb_to_city">
            	<option> Select City</option>   
  <?php
        if(isset($_GET['show']) || isset($_GET['suggest']))
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select city from airporttb where state='$to_state'")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $to_city)
			echo "selected";
		echo" > $id </option>";
	}
	
	}
	?>
          </select> </td>  </tr>
 
 
  <tr> <td colspan="4"> <input type="submit" value="Fill City" name="show"/> </td> </tr>
  
  
        <tr>	
            <td colspan="2"> <input type="submit" value="Suggest" name="suggest"/> </td>
        	<td> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
   
    
	</table>
</form>
</body>
</html>