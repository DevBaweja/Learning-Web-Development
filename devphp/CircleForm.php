
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php 
	
	$r = $_GET['raduis'];
			$a = (3.14)*$r*$r;
			$p = 2*(3.14)*$r;
			if(isset($_GET['area']))
			echo "<br> Area is ".$a;
			if(isset($_GET['peri']))
			echo "<br> Perimeter is ".$p;
?>
</body>
</html>