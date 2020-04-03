<html>
<head>
	<title> DemoForm </title>
</head>

<body>
	<?php
		$a = $_GET['tx1'];
		$b = $_GET['tx2'];
		echo "First no. is $a <br>";
		echo "Second no. is ".$b;
	
	if(isset($_GET['sbplus']))
		echo "<br>Sum is ".($a+$b);
	if(isset($_GET['sbsub']))
		echo "<br>Sub is ".($a-$b);
	if(isset($_GET['sbmul']))
		echo "<br>Mul is ".($a*$b);
	if(isset($_GET['sbdiv']))
		echo "<br>Div is ".($a/$b);
	if(isset($_GET['sbmod']))
		echo "<br>Mod is ".($a%$b);
	
	?> 
</body>
</html>
