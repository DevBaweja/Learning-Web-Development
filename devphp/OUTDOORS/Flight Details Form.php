<html>
<head>
<title>Untitled Document</title>


</head>

<body>
<?php
	$flight_code="";
	
		if(isset($_GET['insert']))
	{	
			$flight_code = $_GET['cb_flight_code'];
			$departure_time = $_GET['departure_time'];
			$arrival_time = $_GET['arrival_time'];
			$economy_capacity = $_GET['economy_capacity'];
			$economy_charge = $_GET['economy_charge'];
			$business_capacity = $_GET['business_capacity'];
			$business_charge = $_GET['business_charge'];	
				
						
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists flightdetailtb(flight_code varchar(5),departure_time varchar(15),arrival_time varchar(15),economy_capacity varchar(10),economy_charge varchar(10),business_capacity varchar(10),business_charge varchar(10),primary key(flight_code))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into flightdetailtb(flight_code,departure_time,arrival_time,economy_capacity,economy_charge,business_capacity,business_charge) values('$flight_code','$departure_time','$arrival_time','$economy_capacity','$economy_charge','$business_capacity','$business_charge')")or die(mysqli_error($con));


			
			mysqli_query($con,"create table if not exists flightfinaltb(flight_code varchar(5),already_booked varchar(10),economy_left_capacity varchar(10),business_left_capacity varchar(10),primary key(flight_code))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into flightfinaltb(flight_code,already_booked,economy_left_capacity,business_left_capacity) values('$flight_code','0','$economy_capacity','$business_capacity')")or die(mysqli_error($con));
		
			$flight_code = "";
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
            <td colspan="2">
        	 Departure Time</td>
             <td colspan="2"> <input type="time" name="departure_time"/> </td> 
             </tr>
          
          	<tr>
            <td colspan="2">
        	 Arrival Time 
             </td>
             
             <td colspan="2"> <input type="time" name="arrival_time"/> </td> 
             </tr>
              
          	<td colspan="2">
     		Economy Capacity 
         	</td>
            <td colspan="2"> <input type="number" min="0" name="economy_capacity" max="200" />   </td>
            </tr>
                          
             <tr>
             <td colspan="2">
        	 Economy Charges
             </td>
             <td colspan="2"> <input type="number"  name="economy_charge" min="1000" max="20000"/> </td> 
             </tr>
                
   			<td colspan="2">
     		Business Capacity 
         	</td>
            <td colspan="2"> <input type="number" min="0" name="business_capacity" max="200" />   </td>
            </tr>
 
			 <tr>
             <td colspan="2">
        	 Business Charges
             </td>
             <td colspan="2"> <input type="number" name="business_charge" min="2000" max="25000"/> </td> 
             </tr>
             
        	<tr>	
            <td colspan="2"> <input type="submit" value="Insert" name="insert"/> </td>
        	<td> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
   
    
	</table>
</form>
</body>
</html>