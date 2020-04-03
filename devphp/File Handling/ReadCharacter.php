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
	$ch = fgetc($fp);
}
// it reads character 
// there is no putc 
fclose($fp);
fclose($fp1);
?>
<!-- occurance of that character -->

</body>
</html>