<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<?php

$fd = fopen("ThirdFile.txt","a")or die("file does not exist");

$fd1 = fopen("FirstFile.txt","r")or die("file does not exist");
$str1 = fread($fd1,filesize("FirstFile.txt"));
fclose($fd1);

$fd2 = fopen("SecondFile.txt","r")or die("file does not exist");
$str2 = fread($fd2,filesize("SecondFile.txt"));
fclose($fd2);
fwrite($fd," ");
fwrite($fd,$str1);
fwrite($fd," "); 
fwrite($fd,$str2);
fclose($fd);
?>
</body>
</html>