
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	$a=$b=$c=$r = "";
		
		function maximum($a,$b,$c)
		{
			if($a>$b && $a>$c)
			$r=$a;
			else if($b>$c)
			$r=$b;
			else 
			$r=$c;
			//echo "<br>Max is ".($r);
			return $r;
		}
		function minimum($a,$b,$c)
		{
		if($a<$b && $a<$c)
			$r=$a;
			else if($b<$c)
			$r=$b;
			else 
			$r=$c;
			//echo "<br>Min is ".($r);	
			return $r;
		}
						
	if(isset($_GET['max']))
		{	
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$c = $_GET['tx3'];
			
			$r = maximum($a,$b,$c);
		}
	if(isset($_GET['min']))
	{
			$a = $_GET['tx1'];
			$b = $_GET['tx2'];
			$c = $_GET['tx3'];
			
			$r = minimum($a,$b,$c);
		}

	
		?> 
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table border="1" align="center">
    	<tr id="maintr">
        	<th colspan="4" > Min-Max Form </th>
        </tr>
        
        <tr>
        	<th colspan="2"> First Number </th>
            <td colspan="2"> <input type="text" id="tx1" name="tx1" value="<?php echo $a ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Second Number </th>
            <td colspan="2"> <input type="text"  id="tx2" name="tx2" value="<?php echo $b ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Third Number </th>
            <td colspan="2"> <input type="text"  id="tx3" name="tx3" value="<?php echo $c ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Result </th>
            <td colspan="2"> <input type="text" id="txres" name="txres" value="<?php echo $r ?>" disabled> </td>
        </tr>
        <tr>
            <td> <input type="submit" value="max" name="max"/> </td>
        	<td> <input type="submit" value="min" name="min"/> </td>
        	<td> <input type="button" value="Refresh" onClick="refresh()"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
    
	</table>
</form>
</body>
</html>