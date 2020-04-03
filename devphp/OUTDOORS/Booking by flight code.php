<html>
<head>
<title>Untitled Document</title>


</head>

<body>
<?php
	$flight_code = "" ;
	$ticket_id = "";
	$name = "";
	$class = "";
	$seats = "";
	$status = "";
	$price = "";
	
		if(isset($_GET['show']) || isset($_GET['book']))
	{	
			$flight_code = $_GET['cb_flight_code'];	
			$ticket_id = $_GET['ticket_id'];
			$name =  $_GET['name'];
					$class = $_GET['class'];
			$seats = $_GET['seats'];
		
			//echo $class;
						
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists flightfinaltb(flight_code varchar(5),already_booked varchar(10),economy_left_capacity varchar(10),business_left_capacity varchar(10),primary key(flight_code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select ".$class."_left_capacity from flightfinaltb where flight_code='$flight_code' ")or die(mysqli_error($con));

		$row = mysqli_fetch_array($rs);
		$available_seats = $row[0];
		if($seats <= $available_seats && $seats != 0)
			{
				$status = "Available";
						
							mysqli_query($con,"create table if not exists flightdetailtb(flight_code varchar(5),departure_time varchar(15),arrival_time varchar(15),economy_capacity varchar(10),economy_charge varchar(10),business_capacity varchar(10),business_charge varchar(10),primary key(flight_code))") or die(mysqli_error($con));
			
			$rs = mysqli_query($con,"select ".$class."_charge from flightdetailtb where flight_code='$flight_code'")or die(mysqli_error($con));
			
			$row = mysqli_fetch_array($rs);
			$charge = $row[0];
			$price = $charge*$seats;
	
			}
			else 
			{
				$status = "NaN";
				$price = "NaN";
			}
	}
	if(isset($_GET['book']))
		{
			if($status == "Available")
			{
				
					mysqli_query($con,"create table if not exists flight$flight_code(ticket_id varchar(6),name varchar(50),type varchar(20),seats varchar(3),primary key(ticket_id))") or die(mysqli_error($con));
					mysqli_query($con,"insert into flight$flight_code(ticket_id,name,type,seats) values('$ticket_id','$name','$class','$seats')") or die(mysqli_error($con));
					
				$rs = mysqli_query($con,"select ".$class."_left_capacity from flightfinaltb where flight_code='$flight_code'")or die(mysqli_error($con));
				$row = mysqli_fetch_array($rs);
				$left_capacity = $row[0];
				
				$final_left_capacity = $left_capacity - $seats;
				
				mysqli_query($con,"update flightfinaltb set ".$class."_left_capacity = '$final_left_capacity' where flight_code='$flight_code'")or die(mysqli_error($con));
				
				
				
				$rs = mysqli_query($con,"select already_booked from flightfinaltb where flight_code='$flight_code'")or die(mysqli_error($con));
				$row = mysqli_fetch_array($rs);
				$booked = $row[0];
				
				$final_booked = $booked + $seats;
						mysqli_query($con,"update flightfinaltb set already_booked = '$final_booked' where flight_code='$flight_code'")or die(mysqli_error($con));
					
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
             <td colspan="2"> <select name="cb_flight_code">
            	<option> Select Flight </option>
     <?php
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select flight_code from flightbasictb	")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $flight_code)
			echo "selected";
		echo" > $id </option>";
	}
	?>
            </select></td> 
            </tr>   
            
            <tr>	
            	<td colspan="2"> Ticket ID </td>
                <td colspan="2"> <input type="text" name="ticket_id" value="<?php echo $ticket_id ?>"/> </td>
            </tr>
            
            <tr>	
            	<td colspan="2"> Name </td>
                <td colspan="2"> <input type="text" name="name" value="<?php echo $name ?>"/> </td>
            </tr> 
             
            <tr>	
            	<td colspan="2"> <input type="radio" name="class" value="economy" <?php if($class=='economy') echo 'checked' ?>/> Economy </td>
                <td colspan="2"> <input type="radio" name="class" value="business" <?php if($class=='business') echo 'checked' ?> /> Business </td>
            </tr>
            
            <tr>	
            	<td colspan="2"> Seats </td>
                <td colspan="2"> <input type="number" name="seats" min="1" max="200"  value="<?php echo $seats ?>"/> </td>
            </tr>
            <tr>
            	<td colspan="2"> Status </td>
                <td colspan="2"> <input type="text" name="status" disabled value="<?php echo $status ?>" /> </td>
            </tr>
            
            <tr>
            	<td colspan="2"> Price </td>
                <td colspan="2"> <input type="text" name="price" disabled value="<?php echo $price ?>" /> </td>
            </tr>
            
            
            <tr>	
            <td colspan="4"> <input type="submit" value="Show" name="show"/> </td>
            </tr>
            
        	<tr>	
            <td colspan="2"> <input type="submit" value="Book" name="book"/> </td>
        	<td> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
   
    
	</table>
</form>
</body>
</html>