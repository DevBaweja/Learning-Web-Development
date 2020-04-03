<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<?php

$fdread = fopen("FirstFile.txt","r")or die("file does not exist");
$str = fread($fdread,filesize("FirstFile.txt"));
fclose($fdread);

$fdwrite = fopen("SecondFile.txt","w")or die("file does not exist");
fwrite($fdwrite,$str);
fclose($fdwrite);
?>
</body>
</html>