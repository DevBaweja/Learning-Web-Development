<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php
$fp = fopen("First.txt","r")or die("File dont exists");
$fp1 = fopen("Copying.txt","w")or die("File dont exists");
while(!feof($fp))
{
	$str = fgets($fp);
	fputs($fp1,$str);
}
// gets and puts take string as line
fclose($fp);
fclose($fp1);
?>
</body>
</html>