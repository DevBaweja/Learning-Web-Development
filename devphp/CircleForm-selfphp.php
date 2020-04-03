
<html>
<head>
<title>Untitled Document</title>
</head>

<?php 
	
	$r = "";
	$ans = "";	
			
			if(isset($_GET['area']))
			{
				$r = $_GET['raduis'];
				$ans = (3.14)*$r*$r;
			}
		
			if(isset($_GET['peri']))
			{
				$r = $_GET['raduis'];
				$ans = 2*(3.14)*$r;
			}
		
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
	<table border="1" align="center">
    
    	<tr id="maintr">
        	<th colspan="2" > Circle Form </th>
        </tr>
        <tr>
        	<th> Raduis </th>
            <td> <input type="text" id="raduis" name="raduis" value="<?php echo $r ?>"/> </td>
        </tr>
        <tr>
        	<th> Result </th>
            <td> <input type="text" id="res" disabled name="res" value="<?php echo $ans ?>"/> </td>
        </tr>
        <tr>
        	<td> <input type="submit" value="Area" name="area"/> </td>
            <td> <input type="submit" value="Perimeter" name="peri"/> </td>
        </tr>
        <tr>
        	<td> <input type="submit" value="Refresh" onClick="refresh()"/> </td>
            <td> <input type="submit" value="Close" onClick="window.close()"/> </td>
        </tr>
    
	</table>
</form>
<body>
</body>
</html>