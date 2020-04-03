<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php

if(isset($_GET['n']))
{
	
	
}
	$arr = range(1,5);
	$sum=0;
	foreach($arr as $ch)
	{
		if($ch == $arr[count($arr)-1])
		echo $ch."=";
		else
		echo $ch."+";
		
		$sum += $ch;
	}
	echo $sum;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" >
<table border="1" align="center">
    	<tr id="maintr">
        	<th colspan="4" > Array Form </th>
        </tr>
        
        <tr>
        	<th colspan="2"> Number of Elements </th>
            <td colspan="2"> <input type="text" name="n" value="<?php echo $a ?>"/> </td>
        </tr>
         
        <tr>
        	<th colspan="2"> Enter Elements </th>
            <td colspan="2"> <input type="text" name="tx" value="<?php echo $a ?>"/> </td>
        </tr>
        
        <tr>
        	<th colspan="2"> Result </th>
            <td colspan="2"> <input type="text" name="res" value="<?php echo $rs ?>" disabled> </td>
        </tr>
        <tr>
        	<td> <input type="submit" value="Sum" name="sum"/> </td>
        	<td> <input type="button" value="Refresh" onClick="refresh()"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()" /> </td>
        </tr>
    
	</table>
</form>
</body>
</html>