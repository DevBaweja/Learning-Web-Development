<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	$a ="";
	$b ="";
	$res = "";
	
	if(isset($_GET['sbplus']))
		{
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$res = $a + $b;
		}
		else 
	if(isset($_GET['sbsub']))
		{
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$res = $a-$b;
		}
		else 
	if(isset($_GET['sbmul']))
		{
			
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$res = $a*$b;
		}
		else 
	if(isset($_GET['sbdiv']))
		{
			
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$res = $a/$b;
		}
		else 
	if(isset($_GET['sbmod']))
		{
			
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$res = $a%$b;
		}
		else
		if(isset($_GET['refresh']))
		{
			$a="";
			$b="";
			$res="";
		}
	
	?> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<!-- there are two methods get and post -->
	<table border="1" align="center">
    
    	<tr id="maintr">
        	<th colspan="5" > AOP Form </th>
        </tr>
        <tr >
        	<th colspan="3"> First Number </th>
            <td colspan="2"> <input type="text" id="tx1" name="tx1" value="<?php echo $a ?>"/> </td>
        </tr>
        <tr >
        	<th colspan="3"> Second Number </th>
            <td colspan="2"> <input type="text" id="tx2" name="tx2" value="<?php echo $b ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="3"> Result </th>
            <td colspan="2"> <input type="text" id="txres" name="tx3" value="<?php echo $res ?>" disabled /> </td>
        </tr>
        <tr >
        	<td> <input type="submit" value="+"  name="sbplus"/> </td>
            <td> <input type="submit" value="-"  name="sbsub"/> </td>
            <td> <input type="submit" value="*"  name="sbmul"/> </td>
            <td> <input type="submit" value="/"  name="sbdiv"/> </td>
            <td> <input type="submit" value="%"  name="sbmod"/> </td>
        </tr>
        <tr>
        	<td colspan="3"> <input type="submit" value="Refresh" name="refresh"/> </td>
            <td colspan="2"> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
    
	</table>
</form>
</body>
</html>