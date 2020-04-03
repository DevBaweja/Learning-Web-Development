<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<?php

	
	$mat = array(array(1,2,3),array(4,5,6),array(7,8,9));
	
	//$mat = array(range(1-3),range(4-6),range(7-9));
	
	// $mat = array();
	// $mat[0] = array(1,2,3);
	// $mat[1] = array(4,5,6);
	// $mat[2] = array(7,8,9);
	for($i=0;$i<count($mat);$i++)
	{
		for($j=0;$j<count($mat[$i]);$j++)
			echo  $mat[$i][$j]."   ";
		echo "<br>";		
	}
	
?>

<!-- 2-array printing by foreach loop -->
</body>
</html>