<html>
<head>
	<title> DemoForm </title>

</head>

<body>
	<?php
		$a = $_GET['tx1'];
		$b = $_GET['tx2'];
		$c = $_GET['tx3'];
		
						
	if(isset($_GET['max']))
		{	
			$r;
			if($a>$b && $a>$c)
			$r=$a;
			else if($b>$c)
			$r=$b;
			else 
			$r=$c;
			echo "<br>Max is ".($r);

		}
	if(isset($_GET['min']))
	{
			$r;
			if($a<$b && $a<$c)
			$r=$a;
			else if($b<$c)
			$r=$b;
			else 
			$r=$c;
			echo "<br>Min is ".($r);
		}

	
		?> 
</body>
</html>
