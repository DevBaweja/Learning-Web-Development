
<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php 
$a = $_GET['tx'];
if(isset($_GET['fac']))
{
			$rs = $a;
			for($r=$a-1;$r>=1;$r--)
			{
				$rs *= $r; 
			}
		
			echo "Factorial is:".$rs;	
		
}
		if(isset($_GET['prime']))
		{
			
			$r = 0;
			for($i=2;$i<=$a/2;$i++)
			{
				if($a%$i==0)
				{
					$r = 1;
					break;
				}
			}
			
			if($r == 0 )
			echo $a." is Prime";
			else 
			echo $a." is non-Prime";
		}
		?>
</body>
</html>