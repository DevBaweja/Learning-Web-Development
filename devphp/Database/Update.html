<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$desg = $basic_sal = $ta = $hra = $tax = $net_sal = ""; 
	function cal()
	{	
		
		//$desg = $_GET['desg'];
		$basic_sal = $_GET['basic_sal']; 
		$ta = $_GET['ta'];
		$hra =$_GET['hra']; 
		$tax = $_GET['tax'];
		
		$n = $basic_sal+($ta*$basic_sal)+($hra*$basic_sal)-($tax*$basic_sal);
		return $n;
		
	}
		if(isset($_GET['insert']))
	{	
		
		$desg = $_GET['desg'];
		$basic_sal = $_GET['basic_sal']; 
		$ta = $_GET['ta'];
		$hra =$_GET['hra']; 
		$tax = $_GET['tax'];
		
		$net_sal = cal();
		
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists phpdb")or die(mysqli_error($con));
	
	mysqli_query($con,"use phpdb") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists salarytb(emp_id int auto_increment,desg varchar(100),basic_sal float,ta float,hra float,tax float,net_sal float,primary key(emp_id))") or die(mysqli_error($con));
	
	mysqli_query($con,"insert into salarytb(desg,basic_sal,ta,hra,tax,net_sal) values('$desg',$basic_sal,$ta,$hra,$tax,$net_sal)")or die(mysqli_error($con));
	}

?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table border="1" align="center">
    	<tr id="maintr">
        	<th colspan="4" > Employee Insertion Form </th>
        </tr>
        
        <tr>
        	<th colspan="2"> Employee ID </th>
            <td colspan="2"> <input type="number" name="emp_id" value="<?php  ?>" disabled/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Desgination </th>
            <td colspan="2"> <input type="text" name="desg" value="<?php echo $desg ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Basic Salary </th>
            <td colspan="2"> <input type="text" name="basic_sal" value="<?php echo $basic_sal ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Ta </th>
            <td colspan="2"> <input type="text" name="ta" value="<?php echo $ta ?>"> </td>
        </tr>
         <tr>
        	<th colspan="2"> Hra </th>
            <td colspan="2"> <input type="text" name="hra" value="<?php echo $hra ?>"> </td>
        </tr>
        <tr>
        	<th colspan="2"> Tax </th>
            <td colspan="2"> <input type="text" name="tax" value="<?php echo $tax ?>"> </td>
        </tr>
         <tr>
        	<th colspan="2"> Net Salary </th>
            <td colspan="2"> <input type="text" name="net_sal" value="<?php echo $net_sal ?>" disabled> </td>
        </tr>
        <tr>
        	 <!-- <input type="submit" value="Calculate" name="calculate"/> --> 
            <td colspan="2"> <input type="submit" value="Insert" name="insert"/> </td>
        	<td> <input type="button" value="Refresh" onClick="refresh()"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
    
	</table>
</form>
</body>
</html>