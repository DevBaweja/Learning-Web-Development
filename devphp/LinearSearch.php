<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
$arr = array(2,7,6,4,9,1,3,8);
	$value = 4;
	$found = true;
	foreach($arr as $num)
	{	
			if($value == $num)
			$found = true;
			break;
	}
	if($found == true)
	echo "found";
	else 
	echo "NaN";
?>
</body>
</html>