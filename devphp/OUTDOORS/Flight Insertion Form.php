<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	$flight_code="";
		
	$from_airport = "";
	$to_airport = "";
	
	$airline = "";
	$aeroplane = "";
	$departure_date = "";
	$arrival_date = "";
        if( isset($_GET['show']))
		{
			$flight_code = $_GET['flight_code'];
	
			$from_airport = $_GET['cb_from_airport'];
			$to_airport = $_GET['cb_to_airport'];
		
			$airline = $_GET['cb_airline'];
			$aeroplane = $_GET['cb_aeroplane'];
			
			$departure_date = $_GET['departure_date'];
			$arrival_date = $_GET['arrival_date'];

		}
		
		
	
	
		if(isset($_GET['insert']))
	{	
			$flight_code = $_GET['flight_code'];
			
			$from_airport = $_GET['cb_from_airport'];
			$to_airport = $_GET['cb_to_airport'];
			$airline = $_GET['cb_airline'];
			$aeroplane = $_GET['cb_aeroplane'];
			$departure_date = $_GET['departure_date'];
			$arrival_date = $_GET['arrival_date'];
			
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists flightbasictb(flight_code varchar(5),departure_date date,arrival_date date,from_airport_code varchar(3),to_airport_code varchar(3),airline_code varchar(3),aeroplane_code varchar(3),primary key(flight_code))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into flightbasictb(flight_code,departure_date,arrival_date,from_airport_code,to_airport_code,airline_code,aeroplane_code) values('$flight_code','$departure_date','$arrival_date','$from_airport','$to_airport','$airline','$aeroplane')")or die(mysqli_error($con));
	
	

	mysqli_query($con,"create table if not exists airport$from_airport(flight_code varchar(5),type varchar(15))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into airport$from_airport(flight_code,type) values('$flight_code','departure')")or die(mysqli_error($con));
	
	


	mysqli_query($con,"create table if not exists airport$to_airport(flight_code varchar(5),type varchar(15))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into airport$to_airport(flight_code,type) values('$flight_code','arrival')")or die(mysqli_error($con));
	
			
		
			$flight_code = "";
			
			$from_airport = "";
			$to_airport = "";
			$airline = "";
			$aeroplane = "";
			echo "Successfully";
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
            <td colspan="2"> <input type="text" name="flight_code" value="<?php echo $flight_code ?>"/> </td>
        </tr>
        
        <tr>
        <td colspan="2">
     	Airport Code (From)
         </td>
         <td colspan="2">     
        <select name="cb_from_airport">
            	<option> Select Airport </option>
     <?php
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select code from airporttb")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $from_airport)
			echo "selected";
		echo" > $id </option>";
	}
	?>
            </select> </td>
            </tr>
            
            <tr>
            <td colspan="2">
        	 State
             </td>
             <td colspan="2"> 
           
  <?php
        if( isset($_GET['show']))
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select state from airporttb where code = '$from_airport' ")or die(mysqli_error($con));

	$row = mysqli_fetch_array($rs);
		$id = $row[0];
		echo "<input type='text' value='$id' disabled/>"  ;
	}
	?>
          </td> </tr>
          
          <tr>
            <td colspan="2">
        	 City 
             </td>
              <td colspan="2"> 
           
  <?php
        if( isset($_GET['show']))
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select city from airporttb where code = '$from_airport' ")or die(mysqli_error($con));

	$row = mysqli_fetch_array($rs);
		$id = $row[0];
		echo "<input type='text' value='$id' disabled/>"  ;
	}
	?>
          </td> </tr>
              
          <td colspan="2">
     	Airport Code (To)
         </td>
           <td colspan="2">     
        <select name="cb_to_airport">
            	<option> Select Airport </option>
     <?php
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select code from airporttb")or die(mysqli_error($con));

	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		if( $id != $from_airport)
	{	
		echo "<option ";
		if($id== $to_airport)
			echo "selected";
		echo" > $id </option>";
	}
	
	}
	?>
            </select> </td>
            </tr>
                       
            <tr>
            <td colspan="2">
        	 State
             </td>
             <td colspan="2"> 
           
  <?php
        if( isset($_GET['show']) )
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select state from airporttb where code = '$to_airport' ")or die(mysqli_error($con));

	$row = mysqli_fetch_array($rs);
		$id = $row[0];
		echo "<input type='text' value='$id' disabled/>"  ;
	}
	?>
          </td> </tr>
          
          <tr>
            <td colspan="2">
        	 City 
             </td>
              <td colspan="2"> 
           
  <?php
        if( isset($_GET['show']) )
	{
               
            	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select city from airporttb where code = '$to_airport' ")or die(mysqli_error($con));

	$row = mysqli_fetch_array($rs);
		$id = $row[0];
		echo "<input type='text' value='$id' disabled/>"  ;
	}
	?>
          </td> </tr>
          
                  
         <tr>
        	<td colspan="2"> Airline ID </td>
            <td colspan="2"> 
            <select name="cb_airline">
            	<option> Select Airline </option>
          
	<?php 
				$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists airlinetb(id varchar(20),name varchar(100),code varchar(3),primary key(id))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select id from airlinetb")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id == $airline)
			echo "selected";
			
		echo " > $id </option>";
	}
			?>
            </select> </td> </tr>
      
            
           <tr>
            <td colspan="2"> Aeroplane Code </td>
            <td colspan="2">
           <select name="cb_aeroplane">
            	<option> Select Aeroplane</option>
            <?php
        if(isset($_GET['show']) )
	{
          
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));

if($airline != "Select Airline") 
	
	{
		mysqli_query($con,"create table if not exists airline$airline(aeroplane_code varchar(3),aeroplane_name varchar(100),primary key(aeroplane_code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select aeroplane_code from airline$airline")or die(mysqli_error($con));
	while($row = mysqli_fetch_array($rs))
	{
		$id = $row[0];
		echo "<option ";
		if($id== $aeroplane)
			echo "selected";
			
		echo" > $id </option>";
	}
	}
	}
	?>
    </select> </td> </tr>
    
    <tr> <center> <td colspan="4"> <input type="submit" value="Fill" name="show"/> </td> </center> </tr>
 
 
 	 <tr>
            <td colspan="2">
            Date of Departure
             </td>
             	<td colspan="2"> <input type="date" name="departure_date" value="<?php echo $departure_date ?>" /> </td>
     </tr>
      	 <tr>
            <td colspan="2">
            Date of Arrival
             </td>
             	<td colspan="2"> <input type="date" name="arrival_date" value="<?php echo $arrival_date ?>" /> </td>
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