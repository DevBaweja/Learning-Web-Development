<html>
<head>
<title>Untitled Document</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="Icons.css" type="text/css" rel="stylesheet">
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
<link href="Flight Searching Form(Destination Date).css" rel="stylesheet" type="text/css" >
</head>

<body>

<?php
	
		$from_state = $from_city ="";
		$to_state = $to_city ="";
		
		$departure_date = "";
	
	
        if(isset($_GET['show']))
		{
			
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
			
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
			
			$departure_date = $_GET['departure_date'];
		}
		
		
	
	
		if(isset($_GET['search']))
	{	
			
			$from_state = $_GET['cb_from_state'];
			$from_city = $_GET['cb_from_city'];
			
			$to_state = $_GET['cb_to_state'];
			$to_city  = $_GET['cb_to_city'];
	
	if(!($from_state == "Select State" || $from_city == "Select City" || $to_state == "Select State" || $to_city == "Select City" ))
	{
		
			$c = countflight();
			$from_airport = from();
			$to_airport = to();
								
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
				mysqli_query($con,"create table if not exists airporttb(code varchar(3),name varchar(100) unique,state varchar(100),city varchar(100) unique,primary key(code))") or die(mysqli_error($con));
			
			$rs = mysqli_query($con,"select name from airporttb where code='$from_airport' ") or die(mysqli_error($con));
			
			$row = mysqli_fetch_array($rs);
			$from_airport_name =  $row['name'];
			
			
			
				$rs = mysqli_query($con,"select name from airporttb where code='$to_airport' ") or die(mysqli_error($con));
			
			$row = mysqli_fetch_array($rs);
			$to_airport_name =  $row['name'];
			
			$departure_date = $_GET['departure_date'];
			$flight_array = array();
			
			mysqli_query($con,"create table if not exists flightbasictb(flight_code varchar(5),departure_date date,arrival_date date,from_airport_code varchar(3),to_airport_code varchar(3),airline_code varchar(3),aeroplane_code varchar(3),primary key(flight_code))") or die(mysqli_error($con));
	
	
			if($departure_date == "")
		{
			$rs = mysqli_query($con,"select flight_code from flightbasictb where  from_airport_code='$from_airport' and to_airport_code='$to_airport' ")or die(mysqli_error($con));
		}
		else 
		{
	$rs = mysqli_query($con,"select flight_code from flightbasictb where  from_airport_code='$from_airport' and to_airport_code='$to_airport' and departure_date = '$departure_date' ")or die(mysqli_error($con));
			
		}

	
			$i=0;
			while($row = mysqli_fetch_array($rs))
				{
					$id = $row[0];
					$flight_array[$i] = $id;
					$i++;
				}
				
				$departure_date_array = array();
				$arrival_date_array = array();
				$airline_array = array();
				$aeroplane_array = array();
				$departure_time_array = array();
				$arrival_time_array = array();
				$economy_charge_array = array();
				$business_charge_array = array();
				$airline_name_array = array();
				$aeroplane_name_array = array();
					
				for($j=0;$j<count($flight_array);$j++)
				{
				$rs = mysqli_query($con,"select departure_date,arrival_date,airline_code,aeroplane_code from flightbasictb where flight_code='$flight_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
				
					$departure_date_array[$j] = $row[0];
					$arrival_date_array[$j] = $row[1];
					$airline_array[$j] = $row[2];
					$aeroplane_array[$j] = $row[3];
				
				$rs = mysqli_query($con,"select departure_time,arrival_time,economy_charge,business_charge from flightdetailtb where flight_code='$flight_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
				
					$departure_time_array[$j] = $row[0];
					$arrival_time_array[$j] = $row[1];
					$economy_charge_array[$j] = $row[2];
					$business_charge_array[$j] = $row[3];
					
					$rs = mysqli_query($con,"select name from airlinetb where id='$airline_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					$airline_name_array[$j] = $row[0];
					
				$rs = mysqli_query($con,"select aeroplane_name from airline$airline_array[$j] where aeroplane_code='$aeroplane_array[$j]' ")or die(mysqli_error($con));
				
				$row = mysqli_fetch_array($rs);
					
					$aeroplane_name_array[$j] = $row[0];
				}
	}
	}

	
	
	if(isset($_GET['refresh']))
	{
	
	}
	
	function countflight()
	{
			$from_airport = from();
			$to_airport = to();
	$departure_date = $_GET['departure_date'];
			$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists aai")or die(mysqli_error($con));
	
	mysqli_query($con,"use aai") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists flightbasictb(flight_code varchar(5),departure_date date,arrival_date date,from_airport_code varchar(3),to_airport_code varchar(3),airline_code varchar(3),aeroplane_code varchar(3),primary key(flight_code))") or die(mysqli_error($con));


			if($departure_date == "")
		{
			$rs = mysqli_query($con,"select count(*) from flightbasictb where  from_airport_code='$from_airport' and to_airport_code='$to_airport' ")or die(mysqli_error($con));
		}
		else 
		{
	$rs = mysqli_query($con,"select count(*) from flightbasictb where  from_airport_code='$from_airport' and to_airport_code='$to_airport' and departure_date = '$departure_date' ")or die(mysqli_error($con));
			
		}
			$row = mysqli_fetch_array($rs);
			$c = $row[0];
			return $c;
		
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
<section>
	<span class="nav"> <button onClick="showmenu()"> <i class="material-icons"> blur_on </i> </button> </span>
    
    <div class="icon__block">
        <span class="icon__block-icon"> <a href="OutDoors.php"> <i class="material-icons"> home </i> </a> </span>
        <span class="icon__block-icon"> <a href="http://localhost/devphp/OUTDOORS/Flight%20Searching%20Form(Destination%20Date).php"> <i class="material-icons"> search </i> </a> </span>
        <span class="icon__block-icon"> <a href="http://localhost/devphp/OUTDOORS/Quick%20Booking.php?search=Search"> <i class="material-icons"> notification_important </i> </a> </span>
        <span class="icon__block-icon"> <a href="#"> <i class="material-icons"> train </i> </a> </span>
    </div>
</section>

<section class="section">
<div class="main_from--div">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table align="center" cellpadding="10px">
    
    <caption class="table_caption"> Search Flights </caption>
        <tr>
        <td colspan="2">
     	State (From)*
         </td>
         <td>     
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
        	 City (From)*
             </td>
             <td>
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
     	State (To)*
         </td>
         <td>     
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
        	 City (To)*
             </td>
             <td>
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
  
  			<tr>
            <td colspan="2">
        	 Departure Date</td>
             <td> <input type="date" name="departure_date" value="<?php echo $departure_date ?>" /> </td> 
             </tr>
  
        <tr>	
        	<td colspan="2"> <input type="submit" value="Fill City" name="show" class="navigation"/> </td>
            <td colspan="2"> <input type="submit" value="Search" name="search" class="navigation"/> </td>
        </tr>
   
    
	</table>
</form>
   </section>
</div>

	<?php
			
		if(isset($_GET['search']))
		{
			if($from_state == "Select State" || $from_city == "Select City" || $to_state == "Select State" || $to_city == "Select City" )
	{
		echo "Enter Details";	
	}
	else {
		
			echo "<main class='main'>
			
			
				<h2 class='heading-secondary'>
					Flights Results
				 </h2>
			
				<div class='about'>
							
						<pre class='date'>Departure Date<sub class='date_type'>(yyyy/mm/dd)</sub>:$departure_date</pre>  	
						<h2>Total Flights :$c</h2>
		
							<h3>From Airport: </h3> 
							<h4 class='name'>$from_airport_name</h4>
							
							<h3>To Airport: </h3>
							<h4 class='name'>$to_airport_name</h4>
				
				</div> 
			
			</main>";
	
	
			echo "<main class='flight_main'>";
							
			for($k=0;$k<count($flight_array);$k++)
			{
				
				
		echo " <div class='flip-card'>
				  <div class='flip-card-inner'>
					<div class='flip-card-front'>
					  	 
						  <h3 class='line'>$airline_name_array[$k]</h3>
						 
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
						 <div  class='btn_div'> <a href='http://localhost/devphp/OUTDOORS/Booking.php?flight_code=$flight_array[$k]'> Book Now </a> </div>
					</div>
				  </div>
				</div> ";
			}
			
			echo "</main>";
			

		}
		}
			
	?>
</body>
</html>