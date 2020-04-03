
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
	$arr = array(1,2,3,4);
	for($i=0;$i<count($arr);$i++)
	{
		echo $arr[$i]."<br>";
	}
	// Android 
	echo "<hr>";
	
	$arr = range(1,5);
	for($i=0;$i<count($arr);$i++)
	{
		echo $arr[$i]."<br>";
	}
	
	echo "<hr>";
	
	$arr = range('a','z');
	foreach($arr as $ch)
	{
		echo $ch."<br>";
	}
	
	echo "<hr>";
	
	$arr = range('aa','zz');
	foreach($arr as $ch)
	{
		echo $ch."<br>";	
	}
?>
<!-- Taking inputs -->
<!-- Sum of array element -->
<!-- Linear Search -->
<!-- Occurance of that number -->
<!-- Associative Array -->
<!-- File Handling -->
</body>
</html>