<html>
<head>
<title> DashBoard </title>
<link href="DashBoard.css" type="text/css" rel="stylesheet">
<script>
	function changesrc(src)
	{
		document.getElementsByClassName('article').item(0).style.backgroundImage = "url("+src+")";
		document.getElementById('changeimage').innerHTML = "You Can Also Change Background Image";
		document.getElementById('changeimage').style = "top:10%;color:#777;";
	}
</script>
</head>
<?php 

$upload = -1;
$link_array = array();
if(isset($_POST['insert']))
{
$temp = $_FILES['imgfile']['tmp_name'];
$img = $_FILES['imgfile']['name'];

if(is_uploaded_file($temp))
	{
		$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists trello")or die(mysqli_error($con));
	
	mysqli_query($con,"use trello") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists imagetb(image varchar(100))") or die(mysqli_error($con));
	
	
		if(!file_exists("image"))
		mkdir("image");
		
		
		$img = "image/$img";
		move_uploaded_file($temp,$img);
		$upload = 1;
		
		mysqli_query($con,"insert into imagetb values('$img')") or die(mysqli_errno($con));
	}
	else 
	$upload = 0;
}
 if(isset($_POST['show']) || isset($_POST['insert']))
{
	$con = mysqli_connect("localhost","root","")or die(mysqli_error());
	
	mysqli_query($con,"create database if not exists trello")or die(mysqli_error($con));
	
	mysqli_query($con,"use trello") or die(mysqli_error($con));
	
	mysqli_query($con,"create table if not exists imagetb(image varchar(100))") or die(mysqli_error($con));
	
	
	$rs = mysqli_query($con,"select * from imagetb") or die(mysqli_error($con));
	
	$k=0;
	while($row = mysqli_fetch_array($rs))
	{	
		$link_array[$k] = $row[0];
		$k++;
	}
	
}
?>

<body>
<article class="article">
<aside id="changeimage">
	You Can Add Backgound Image
</aside>
</article>
<aside class="aside">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="bgform">
        <input type="file" name="imgfile"/>
        <p> <?php if($upload==0) echo"Cann't be uploaded.Try Agian";
                else if($upload==1) echo "Uploaded Successfully";  ?> </p>
        <input type="submit" name="show" value="Show"/>
        <input type="submit" name="insert" value="Insert"/>
    </form>
    <div class="image_div">
        <?php
        
            for($i=0;$i<count($link_array);$i++)
            {
                echo "<button onClick=changesrc('$link_array[$i]')> <img src='$link_array[$i]'> </button>";
            }
        
        ?>
    </div>
</aside>

</body>
</html>