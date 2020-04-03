<html>
<head>
<title>Untitled Document</title>
<link href="Flight Airport.css" type="text/css" rel="stylesheet" >
</head>

<body>
<?php
	
		$from_state = $from_city ="";

	
        if(isset($_GET['show']))
		{
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
	
		}
		
		
	
	
		if(isset($_GET['search']))
	{	
			
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
		
	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
			
			$from_airport = from();
		
		echo "<h3>Airport: </h3>".$from_airport."-";

	
	mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select name from airporttb where code='$from_airport' ") or die(mysqli_error($con));
	
	$row = mysqli_fetch_array($rs);
	echo $row['name'];
	
			
			$flight_departure_array = array();
			$flight_arrival_array = array();
			

	
	mysqli_query($con,"create table if not exists airport$from_airport(flight_code varchar(5),type varchar(15))") or die(mysqli_error($con));
	
	$rs = mysqli_query($con,"select flight_code,type from airport$from_airport ")or die(mysqli_error($con));
			
			$i=0;
			$j=0;
			while($row = mysqli_fetch_array($rs))
				{
					$id = $row['flight_code'];
					$type = $row['type'];
					
					if($type=='departure')
					{
						$flight_departure_array[$i] = $id;
						$i++;
					}
					else if($type=='arrival')
					{
						$flight_arrival_array[$j] = $id;
						$j++;
					}
				}
				
				
				echo"<h2> Departure Flights </h2>";
				
			for($k=0,$i=0;$k<count($flight_departure_array);$k++)
			{
				echo "<h3> $flight_departure_array[$k] </h3>";
			}
			
				echo"<h2> Arrival Flights </h2>";
				
					for($k=0,$i=0;$k<count($flight_arrival_array);$k++)
			{
				echo "<h3> $flight_arrival_array[$k] </h3>";
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
	
?>
<section class="section">
<div class="main_from--div"> 
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
   
	<table align="center">
    
      <caption class="table_caption"> About Airport </caption>
      
        <tr>
        <td colspan="2">
     	State 
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
        	 City
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
        	<td colspan="2"> <input type="submit" value="Fill City" name="show" class="navigation"/> </td>
            <td colspan="2"> <input type="submit" value="Search" name="search" class="navigation"/> </td>
        </tr>

   
    
	</table>
</form>
</div>
</section>

<?php
			
		if(isset($_GET['']))
		{
	
			echo "<main class='flight_main'>";
							
			for($k=0;$k<count($flight_array);$k++)
			{
				
				
		echo " <div class='flip-card'>
				  <div class='flip-card-inner'>
					<div class='flip-card-front'>
					  	 
						  <h3 class='line'>$airline_name_array[$k]</h3>
						 
						 <h3> <span>From:</span> </h3> <h3> $from_airport_name_array[$k] ($from_airport_place_array[$k]) </h3>
						 <h3> <span>To:</span> </h3> <h3> $to_airport_name_array[$k] ($to_airport_place_array[$k]) </h3>
						 
						 <h3> <span>Departure Date & Time : </span> </h3> 
						 <h3> $departure_date_array[$k] & $departure_time_array[$k] hrs </h3>
						 <h3> <span>Arrival Date & Time : </span> </h3> 
						 <h3> $arrival_date_array[$k] & $arrival_time_array[$k] hrs </h3>

						<h5> <span>Aeroplane:</span> $aeroplane_name_array[$k] </h5>
					</div>
					<div class='flip-card-back'>
					  	 	
						 <h3> For an adult : </h3>
						 <h4> <span> Economy Class: </span> &#8377  $economy_charge_array[$k] </h4>
						 <h4> <span> Business Class: </span> &#8377 $business_charge_array[$k] </h4>
						 <h4> <span> Economy Left: </span> $economy_left_array[$k]  seats</h4>
						 <h4> <span> Business Left: </span> $business_left_array[$k] seats </h4>
						 <h4> <span> Already Booked: </span> $already_booked[$k] seats </h4>
						 <div  class='btn_div'> <a href='Booking.php?flight_code=$flight_array[$k]'> Book Now </a> </div>
					</div>
				  </div>
				</div> ";
			}
			
			echo "</main>";
			

		}
			
	?>
 
</body>
</html>