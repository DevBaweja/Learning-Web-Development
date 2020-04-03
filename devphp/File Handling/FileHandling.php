<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php 

$fp = fopen("first.txt","r")or die("file does not exist");

$str = fread($fp,filesize("first.txt"));
echo $str;
fclose($fp);
?>

<!-- 
Modes
	r - read
    w - write
   	a - append
    
i/p file - must be existed
o/p file - may or may not be

o/p  w - existed file - overwrite
o/p  a - existed file - appends	
-->
</body>
</html>