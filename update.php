<html>
<head>
<title>Add/Update</title>
</head>

<body>
<div align="center">
<?php	
	$roll=(int)$_POST["roll"];
	$physics=(int)$_POST["phy"];
	$chemistry=(int)$_POST["chem"];
	$maths=(int)$_POST["math"];
	$computer=(int)$_POST["comp"];
	if(empty($roll) || empty($physics) || empty($chemistry) || empty($maths) || empty($computer))
		echo "<font color='red'>"."Please fill all fields to add/update marks."."</font>";
	else{
		$file=fopen("marks.data","r") or die("can't open file");
		while(!feof($file)){
			$a=fscanf($file,"%d\t%d\t%d\t%d\t%d\n");
			$phy[$a[0]]=$a[1];
			$chem[$a[0]]=$a[2];
			$math[$a[0]]=$a[3];
			$comp[$a[0]]=$a[4];
		}
		fclose($file);
		if(empty($phy[$roll])){
			$file=fopen("marks.data",'a') or die("can't open file");
			$string=$roll." ".$physics." ".$chemistry." ".$maths." ".$computer."\n";
			fwrite($file,$string);
			echo "<font color='blue'>"."Record added for roll number ".$roll."."."</font>";
			fclose($file);
		}
		else{
			$phy[$roll]=$physics;
			$chem[$roll]=$chemistry;
			$math[$roll]=$maths;
			$comp[$roll]=$computer;
			$file=fopen("marks.data",'w') or die("can't open file");
			while($marks = current($phy)){
				$roll=key($phy);
				$string=$roll." ".$phy[$roll]." ".$chem[$roll]." ".$math[$roll]." ".$comp[$roll]."\n";
				fwrite($file,$string);
				next($phy);
			}
			fclose($file);
			echo "<font color='blue'>"."Marks of roll number ".$_POST['roll']." has been updated."."</font>";
		}
	}
?>
</div>
</body>
</html>
