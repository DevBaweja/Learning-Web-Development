
<html>
<head>

<title>Untitled Document</title>
</head>

<body>
<?php
	
	$fp = fopen("second.txt","w")or die("file does not exist");

	$str = "<h1>Hello</h1> and welcome <br> php World ";

	fwrite($fp,$str);
	fclose($fp);
?>

<!-- file copy -->
<!-- Merging of two files -->
</body>
</html>