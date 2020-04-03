<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<?php
	$family = array("Father"=>"Mr." , "Mother" => "Mrs." , "Brother" => "Bhai");

	echo $family['Father'];
	echo "<br>";
	
	foreach($family as $key => $val)
		echo $key ." = ". $val. "<br>" 
?>
</body>
</html>