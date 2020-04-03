<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php
$fp = fopen("First.txt","r")or die("File dont exists");

while(!feof($fp))
{
	$str = fgets($fp);
	echo $str;
	echo "<br>";
}
fclose($fp);
?>
</body>
</html>