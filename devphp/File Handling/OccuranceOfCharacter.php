
<html>
<head>
<title></title>
</head>

<body>
<?php
$file=$c=$res= "";						
	if(isset($_GET['occur']))
		{	
			$file = $_GET['txfile'];
			$c = $_GET['txc'];
			
			if($file != "" && $c!= "")
			{
				$fd = fopen($file.".txt","r");
				$k = 0;
				while(!feof($fd))
				{
					if($c == fgetc($fd))
						$k++;	
				}
				$res = $k;
			}
		}
	if(isset($_GET['refresh']))
		{
			$file=$c=$res="";
				
		}
?> 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get"> 
	<table border="1" align="center">
    	<tr>
        	<th colspan="4" > Occurance Form </th>
        </tr>
        
        <tr>
        	<th colspan="2"> FileName </th>
            <td colspan="2"> <input type="text" name="txfile" value="<?php echo $file ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Character </th>
            <td colspan="2"> <input type="text" name="txc" value="<?php echo $c ?>"/> </td>
        </tr>
        <tr>
        	<th colspan="2"> Count </th>
            <td colspan="2"> <input type="text" name="txres" value="<?php echo $res ?>" disabled> </td>
        </tr>
        <tr>
            <td> <input type="submit" value="occur" name="occur"/> </td>
        	<td> <input type="submit" value="Refresh" onClick="refresh"/> </td>
            <td> <input type="button" value="Close" onClick="window.close()"/> </td>
        </tr>
    
	</table>
</form>
</body>
</html>