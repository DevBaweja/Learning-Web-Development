<html>
<head>
<title>Untitled Document</title>
<link href="Icons.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="Quick Booking.css">
<script>
	function showmenu()
	{
		document.getElementsByClassName('icon__block').item(0).style = "opacity:1; transform:translateX(0px);";
			
			document.getElementsByClassName('nav').item(0).innerHTML = "<button onClick='disclose()'> <i class='material-icons'> clear </i> </button>";
			
	}
	function disclose()
	{
		document.getElementsByClassName('icon__block').item(0).style = "opacity:0;";
			
			document.getElementsByClassName('nav').item(0).innerHTML = "<button onClick='showmenu()'> <i class='material-icons'> blur_on </i> </button>";
			
	}
</script>
</head>

<body>

<section>
	<span class="nav"> <button onClick="showmenu()"> <i class="material-icons"> blur_on </i> </button> </span>
    
    <div class="icon__block">
        <span class="icon__block-icon"> <a href="OutDoors.php"> <i class="material-icons"> home </i> </a> </span>
        <span class="icon__block-icon"> <a href="http://localhost/devphp/OUTDOORS/Flight%20Searching%20Form(Destination%20Date).php"> <i class="material-icons"> search </i> </a> </span>
        <span class="icon__block-icon"> <a href="http://localhost/devphp/OUTDOORS/Quick%20Booking.php?search=Search"> <i class="material-icons"> notification_important </i> </a> </span>
        <span class="icon__block-icon"> <a href="#"> <i class="material-icons"> train </i> </a> </span>
    </div>
</section>

<?php
if(isset($_GET['search']))
	{	
$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
				$flight_array = array();

	
	$rs = mysqli_query($con,"select flight_code from flightfinaltb where economy_left_capacity < 10 or business_left_capacity < 10 order by already_booked desc ")or die(mysqli_error($con));
			
			$i=0;
			while($row = mysqli_fetch_array($rs))
				{
					$id = $row[0];
					$flight_array[$i] = $id;	
					$i++;
				}
				
	
	$departure_date_array = array();
	$arrival_date_array = array();
	$from_airport_array = array();
	$to_airport_array = array();
	$airline_array = array();
	$aeroplane_array = array();	
	$departure_time_array = array();
	$arrival_time_array = array();			
	$economy_charge_array = array();
	$business_charge_array = array();
	$economy_left_array = array();
	$business_left_array = array();
	$already_booked = array();
	$from_airport_name_array = array();
	$to_airport_name_array = array();
	$from_airport_place_array = array();
	$to_airport_place_array = array();
	$airline_name_array = array();
	$aeroplane_name_array = array();			
				
				
					
				for($j=0;$j<count($flight_array);$j++)
				{
					
			$rs = mysqli_query($con,"select departure_date,arrival_date,from_airport_code,to_airport_code,airline_code,aeroplane_code from flightbasictb where flight_code='$flight_array[$j]' ") or die(mysqli_error($con));
			
			$row = mysqli_fetch_array($rs);
			
					$departure_date_array[$j] = $row[0];
					$arrival_date_array[$j] = $row[1];
					$from_airport_array[$j] = $row[2];
					$to_airport_array[$j] = $row[3];
					$airline_array[$j] = $row[4];
					$aeroplane_array[$j] = $row[5];
	

				
				$rs = mysqli_query($con,"select economy_left_capacity,business_left_capacity,already_booked from flightfinaltb where flight_code='$flight_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
				
					$economy_left_array[$j] = $row[0];
					$business_left_array[$j] = $row[1];
					$already_booked[$j] = $row[2];
					
					$rs = mysqli_query($con,"select departure_time,arrival_time,economy_charge,business_charge from flightdetailtb where flight_code='$flight_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
				
					$departure_time_array[$j] = $row[0];
					$arrival_time_array[$j] = $row[1];
					$economy_charge_array[$j] =  $row[2];
					$business_charge_array[$j] =  $row[3];
					
					$rs = mysqli_query($con,"select name from airlinetb where id='$airline_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					$airline_name_array[$j] = $row[0];
					
				$rs = mysqli_query($con,"select aeroplane_name from airline$airline_array[$j] where aeroplane_code='$aeroplane_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					
					$aeroplane_name_array[$j] = $row[0];
					
					
					$rs = mysqli_query($con,"select name,city from airporttb where code='$from_airport_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					
					$from_airport_name_array[$j] = $row[0];
					$from_airport_place_array[$j] = $row[1];
					
				$rs = mysqli_query($con,"select name,city from airporttb where code='$to_airport_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					
					$to_airport_name_array[$j] = $row[0];
					$to_airport_place_array[$j] = $row[1];
				}
	}
                ?>
                
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 

	    <!--	 <input type="submit" value="Search" name="search"/>  -->
    	<marquee> Hurry up </marquee>
    </form>
    
	<?php
			
		if(isset($_GET['search']))
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