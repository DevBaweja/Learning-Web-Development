<html>
<head>
<title>Untitled Document</title>


</head>

<body>
<?php
	$flight_code="";
	
		if(isset($_GET['create']))
		{
				$flight_code = $_GET['cb_flight_code'];
				
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
				
				mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
				mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
				$rs = mysqli_query($con,"select from_airport_code,to_airport_code,airline_code,aeroplane_code from  flightbasictb where flight_code = '$flight_code'")or die(mysqli_error($con));
	
				$row = mysqli_fetch_array($rs);
				$from_airport_code = $row[0];
				$to_airport_code = $row[1];
				$airline_code = $row[2];
				$aeroplane_code = $row[3];
				
				echo $from_airport_code;
				echo  $to_airport_code;
				echo  $airline_code;
				echo  $aeroplane_code;
				
				$rs = mysqli_query($con,"select economy_capacity,economy_charge,business_capacity,business_charge from flightdetailtb where flight_code = '$flight_code' ") or die(mysqli_error($con));
				$row = mysqli_fetch_array($rs);
				
				$economy_capacity  =  $row[0];
				$economy_charge =  $row[1];
				$business_capacity =  $row[2];
				$business_charge =  $row[3];
				
				echo "<h4>$economy_capacity</h4>"; 
				echo "<h4>$economy_charge</h4>";
				echo "<h4>$business_capacity</h4>";
				echo "<h4>$business_charge</h4>";

				$total_possible_earn = ($economy_capacity*$economy_charge + $business_capacity*$business_charge)/1000;
				echo $total_possible_earn." in thousands";
				
				
	
	$rs = mysqli_query($con,"select economy_left_capacity,business_left_capacity from flightfinaltb where flight_code='$flight_code' ")or die(mysqli_error($con));
	$row = mysqli_fetch_array($rs);
		$economy_left_capacity =  $row[0]; 
		$business_left_capacity =   $row[1];
		
		$economy_booked_capacity = $economy_capacity-$economy_left_capacity ; 
		$business_booked_capacity = $business_capacity-$business_left_capacity;
		
		echo "<h4>$economy_booked_capacity</h4>";
		echo "<h4>$business_booked_capacity</h4>";
		
		$total_earn = ($economy_booked_capacity*$economy_charge+$business_booked_capacity*$business_charge)/1000;
		echo $total_earn." in thousands";
			
			$success_rate = ($total_earn/$total_possible_earn)*100;	
			$success_rate = round($success_rate,2);
			
			echo "<h4>$success_rate</h4>";
			
			
			
			// changing database
			
			mysqli_query($con,"create database if not exists aaibackup")or die(mysqli_error($con));
			mysqli_query($con,"use aaibackup") or die(mysqli_error($con));
			
			mysqli_query($con,"create table if not exists from".$from_airport_code."to".$to_airport_code."tb(airline_code varchar(20),aeroplane_code varchar(3),success_rate varchar(5),primary key(aeroplane_code))") or die(mysqli_error($con));
			
			$rs = mysqli_query($con,"select count(*) from from".$from_airport_code."to".$to_airport_code."tb where aeroplane_code= '$aeroplane_code' ") or die(mysqli_error($con));
			$row = mysqli_fetch_array($rs);
			
			$c = $row[0];
			echo $c;
			if($c==0)
			mysqli_query($con,"insert into from".$from_airport_code."to".$to_airport_code."tb(airline_code,aeroplane_code,success_rate)  
			values('$airline_code','$aeroplane_code','$success_rate') ") or die(mysqli_error($con));
			
			else if($c==1)
			{
				$rs = mysqli_query($con,"select success_rate from from".$from_airport_code."to".$to_airport_code."tb where aeroplane_code='$aeroplane_code' ") or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
				$initial_success_rate = $row[0];
				
				$final_success_rate = ($initial_success_rate+$success_rate)/2;
				$final_success_rate = round($final_success_rate,2);
				
				mysqli_query($con,"update from".$from_airport_code."to".$to_airport_code."tb set success_rate = '$final_success_rate'  where aeroplane_code='$aeroplane_code' ") or die(mysqli_error($con));
			}
		}

	if(isset($_GET['refresh']))
	{
	
	}

?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table border="1" align="center">
    	<tr id="maintr">
        	<th colspan="4" > Flight Form </th>
        </tr>
        
        <tr>
        	 <th colspan="2"> Flight Code </th>
             <td colspan="2">       
             	<select name="cb_flight_code">
            	<option> Select Flight </option>
          
	<?php 
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists flightbasictb(flight_code varchar(5),departure_date date,arrival_date date,from_airport_code varchar(3),to_airport_code varchar(3),airline_code varchar(3),aeroplane_code varchar(3),primary key(flight_code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select flight_code from flightbasictb")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id == $flight_code)
			echo "selected";
			
		echo " > $id </option>";
	}
			?>
            </select> </td> 
            </tr>   
            
           
        	<tr>	
            <td colspan="2"> <input type="submit" value="Create" name="create"/> </td>
        	<td> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
   
    
	</table>
</form>
</body>
</html>