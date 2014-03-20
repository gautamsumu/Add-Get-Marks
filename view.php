<html>
<head>
<title>View</title>
</head>

<body>
<div align="center">
<?php	
	$roll=$_POST["roll"];
	if(empty($roll))
		echo "<font color='red'>"."Enter a roll number to view marks."."</font>";
	else{
		$file=fopen("marks.data","r");
		while(!feof($file)){
			$a=fscanf($file,"%d\t%d\t%d\t%d\t%d\n");
			$phy[$a[0]]=$a[1];
			$chem[$a[0]]=$a[2];
			$math[$a[0]]=$a[3];
			$comp[$a[0]]=$a[4];
		}
		fclose($file);
		if($roll==0){
			echo "<table cellpadding='10px'>
				<tr><td><b>Roll No.</td>
					 <td><b>Physics</td>
					 <td><b>Chemistry</td>
					 <td><b>Maths</td>
					 <td><b>Computer</td></b>
				</tr>";
			while($marks=current($phy)){
				$roll=key($phy);
				echo "<tr><td>".$roll."</td>";
				echo "<td>".$phy[$roll]."</td>";
				echo "<td>".$chem[$roll]."</td>";
				echo "<td>".$math[$roll]."</td>";
				echo "<td>".$comp[$roll]."</td></tr>";
				next($phy);
			}
			echo "</table>";
		}
		elseif(empty($phy[$roll]))
			echo "<font color='red'>"."No record for roll number ".$roll."."."</font>";
		else{
			echo "<table cellpadding='10px'>
				<tr><td><b>Roll No.</td>
					 <td><b>Physics</td>
					 <td><b>Chemistry</td>
					 <td><b>Maths</td>
					 <td><b>Computer</td></tr>";
			echo "<tr><td>".$roll."</td>";
			echo "<td>".$phy[$roll]."</td>";
			echo "<td>".$chem[$roll]."</td>";
			echo "<td>".$math[$roll]."</td>";
			echo "<td>".$comp[$roll]."</td></tr>";
			echo "</table>";
		}
	}
?>
</div>
</body>
</html>
