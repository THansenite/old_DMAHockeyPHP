<html>
<head>
	<link href="inputstyle.css" rel="stylesheet">

</head>
<body>
<h2>Game Input Submitted</h2>

<p>
<?php
	$ref1 = $_POST['referee1'];
	$ref2 = $_POST['referee2'];
	$statkeeper = $_POST['statkeeper'];
	$starttime = $_POST['startTime'];
	$homescore = $_POST['homescore'];
	$awayscore = $_POST['awayscore'];

	echo "Referee1: $ref1<br />";
	echo "Referee2: $ref2<br />";
	echo "Statkeeper: $statkeeper<br />";
	echo "Start time: $starttime<br />";
	echo "Home Score: $homescore<br />";

	if( isset($_POST['situation'])) 
	{
		$situation = $_POST['situation'];
		$n = count($situation);
		for($i=0; $i<$n;$i++) 
		{
    		echo "$situation[$i]<br />";
   		}
  	}
?>
</p>

</body>
</html>