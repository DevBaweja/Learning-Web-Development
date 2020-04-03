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
		
		
	
	
		if(isset($_GET['search']))
	{	
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
			
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
	
		
			
			$from_airport = from();
			$to_airport = to();
			;
			
			$flight_from_array = array();
			
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airport$from_airport(flight_code varchar(5),type varchar(15))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select flight_code from airport$from_airport where type='departure' ")or die(mysqli_error($con));
			
			$i=0;
			while($row = mysqli_fetch_array($rs))
				{
					$id = $row[0];
					$flight_from_array[$i] = $id;
					$i++;
				}
				
				
				
			for($k=0,$i=0;$k<count($flight_from_array);$k++)
			{
			mysqli_query($con,"create table if not exists flightbasictb(flight_code varchar(5),departure_date date,arrival_date date,from_airport_code varchar(3),to_airport_code varchar(3),airline_code varchar(3),aeroplane_code varchar(3),primary key(flight_code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select flight_code from flightbasictb where flight_code='$flight_from_array[$k]' and to_airport_code='$to_airport'  ")or die(mysqli_error($con));
			
			$row = mysqli_fetch_array($rs);
				
					$id = $row[0];
					$flight_array[$i] = $id;
					$i++;
				
			}
			
			for($k=0,$i=0;$k<count($flight_from_array);$k++)
			{
				echo "<h3> $flight_array[$k] </h3>";
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
        if(isset($_GET['show']) || isset($_GET['search']))
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
        if(isset($_GET['show']) || isset($_GET['search']))
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
            <td colspan="2"> <input type="submit" value="Search" name="search"/> </td>
        	<td> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>

   
    
	</table>
</form>
</body>
</html>