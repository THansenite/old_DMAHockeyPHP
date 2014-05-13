<html>
<head>
	<link href="inputstyle.css" rel="stylesheet">

</head>
<body>

<h2>Edit Games</h2>


<table id="select_game">
<thead>
<tr>
	<th>Date</th>
	<th>Time</th>
	<th>Home</th>
	<th>Away</th>
	<th>Edit</th>
</tr>
</thead>
<tbody>
<?php
include ("../../setup/db_setup.php");

$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

$query = "select date_format(sched.date,'%c/%e/%y') as 'date', time_format(sched.time,'%h:%i %p') as 'time', team1.name as 'home', team2.name as 'away', sched.id as 'id' from schedule sched join team team1 on sched.home = team1.id join team team2 on sched.away = team2.id order by sched.date, time";
$result = mysqli_query($connection, $query) or die ("Query failed");

while ($row = mysqli_fetch_assoc($result)) {
	$date = $row['date'];
	$time = $row['time'];
	$home = $row['home'];
	$away = $row['away'];
	$id = $row['id'];

	echo "<tr><td>";
	echo htmlentities($date);
	echo "</td><td>";
	echo htmlentities($time);
	echo "</td><td>";
	echo htmlentities($home);
	echo "</td><td>";
	echo htmlentities($away);
	echo "</td><td>";
	echo "<a href = \"gameinput.php?gameid=";
	echo htmlentities($id);
	echo "\">Edit game ";
	echo "</a></td></tr>";
}
mysqli_free_result($result);
mysqli_close($connection);
?>

</tbody>
</table>


</body>
</html>