<html>
<head>
<title>Untitled Document</title>
<style>
body{
		/* #e6e6e6 */#fff
		font-family:"Lato",sans-serif;
		font-weight:400;
		// font-size:16px;
		line-height:1.7;
		color:#777;
		padding:25px;
		position:30px;
		box-sizing:border-box;
	}
	
	.section{
		
		height:95vh;
	background-image:linear-gradient(to right bottom,
	rgba(126,213,111,.8),
	rgba(40,180,13,.8))
	, url(../../Image/image204.jpg) ;
	background-size:100% 100%;
	background-position:center;
	clip-path:polygon(0 0,100% 10%,100% 80%,0% 100%);
	position:relative;
	}
	.main_from--div{
		position:relative;
		top:47.5%;
		left:32.5%;	
		transform:translate(-50%,-50%);
	}
	
	.main_from--div table {
		height:500px;
		width:650px;	
	}
	.main_from--div table td {
		color:#eee;
		font-weight:500;
		text-align:justify;
		font-size:30px;
	}
	.main_from--div .navigation{
	color:white;	
	font-size:25px;
	border-radius:100px;
	background-color:hsla(0,0%,0%,.4);
		transition:all .3s;
	}
	.main_from--div .navigation:hover{
		transform:translateY(-5px);
		cursor:cell;
	}
	.main_from--div .navigation:active{
		transform:translateY(-3px);
	}

	.table_caption{
		font-size:35px;
	text-transform:uppercase;
	font-weight:700;
	 color:black;
	letter-spacing:2px;
	transition:all .3s;
	margin-bottom:20px;
	}
	.table_caption:hover {
	transform:skewY(2deg) skewX(-10deg) scale(1.1,1.1);
	text-shadow:5px 10px 20px black;
	}
	.main_from--div input {
		background-color:hsla(0,0%,0%,.45);
		color:white;
		font-size:18px;
		text-align:center;
		border:2px solid rgb(126,213,111);
		border-radius:25px;
		height:40px;
		width:200px;
	}
	.main_from--div input[disabled] { 
		color:black;
		letter-spacing:3px;
		background-color:transparent;
		font-weight:bold;
	}
	
	.main_from--div input[type=radio]{
		height:20px;
		width:20px;	
	}
</style>

</head>

<body>

<?php
	
	
		if(isset($_GET['show']))
	{	
				
			$ticket_id = $_GET['ticket_id'];
			$name =  $_GET['name'];
					$class = $_GET['class'];
			$seats = $_GET['seats'];
			$flight_code = $_GET['hdFlightCode'];
			
						
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
	else 
	if(isset($_GET['book']))
		{
			
			$ticket_id = $_GET['ticket_id'];
			$name =  $_GET['name'];
					$class = $_GET['class'];
			$seats = $_GET['seats'];
			$flight_code = $_GET['hdFlightCode'];
			
						
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
	
		else
		{
			
		
	$flight_code=$_GET['flight_code'];
	$ticket_id = "";
	$name = "";
	$class = "";
	$seats = "";
	$status = "";
	$price = "";
		
		}
	
	
	if(isset($_GET['refresh']))
	{
	
	}

?>

<section class="section">
<div class="main_from--div">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table align="center" cellpadding="10px">
    
    <caption class="table_caption"> Flight Booking </caption>
        <input type="hidden" value="<?php echo $flight_code ?>" name="hdFlightCode"/>
            <tr>	
            	<td colspan="2"> Ticket ID </td>
                <td colspan="2"> <input type="text" name="ticket_id" value="<?php echo $ticket_id ?>"/> </td>
            </tr>
            
            <tr>	
            	<td colspan="2"> Name </td>
                <td colspan="2"> <input type="text" name="name" value="<?php echo $name ?>"/> </td>
            </tr> 
             
            <tr>	
            	<td colspan="2"> <input type="radio" name="class" value="economy" <?php if($class=='economy') echo 'checked' ?> /> Economy </td>
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
                <td colspan="2"> <input type="text" name="price" disabled value="<?php if($price=='NaN' || $price== '' ) ; else echo '&#8377;';
				 echo $price  ?>" /> </td>
            </tr>
            
            
            <tr>	
            <td colspan="2"> <input type="submit" value="Show" name="show" class="navigation"/> </td>
            <td colspan="2"> <input type="submit" value="Book" name="book" class="navigation"/> </td>
        </tr>
        
   
    
	</table>
</form>
</div>
</section>
</body>
</html>