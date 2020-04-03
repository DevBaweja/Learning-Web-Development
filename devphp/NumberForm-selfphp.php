
<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php 
$a = $rs = "";
if(isset($_GET['fac']))
{
	$a = $_GET['tx'];
			$rs = $a;
			for($r=$a-1;$r>=1;$r--)
			{
				$rs *= $r; 
			}
		
			$rs = $rs." is factorial";	
		
}
		if(isset($_GET['prime']))
		{
			
			$a = $_GET['tx'];
			$r = 0;
			for($i=2;$i<=$a/2;$i++)
			{
				if($a%$i==0)
				{
					$r = 1;
					break;
				}
			}
			
			if($r == 0 )
			$rs = $a." is prime";
			else 
			$rs = $a." is non-Prime";
		}
		?>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="get" >
	<table border="1" align="center">
    	<tr id="maintr">
        	<th colspan="4" > Number Form </th>
        </tr>
        
        <tr>
        	<th colspan="2"> First Number </th>
            <td colspan="2"> <input type="text" id="tx" name="tx" value="<?php echo $a ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Result </th>
            <td colspan="2"> <input type="text" id="res" name="res" value="<?php echo $rs ?>" disabled> </td>
        </tr>
        <tr>
        	<td> <input type="submit" value="Factorial" name="fac"/> </td>
            <td> <input type="submit" value="Prime" name="prime"/> </td>
        	<td> <input type="button" value="Refresh" onClick="refresh()"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()" /> </td>
        </tr>
    
	</table>
</form>
</body>
</html>