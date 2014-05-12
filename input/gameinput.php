<html>
<head>
<style>
table {
	width: 700px;
	border: 2px solid black;
	border-collapse: collapse;
}

td, th {
	border: 1px solid black;
	padding: 4px;
}

th {
	border-bottom: 2px solid black;
}

</style>

</head>
<body>
<h2>Game Input</h2>

<table id="schedule_table">
<tr>
	<th colspan="3">Scheduled Game Info</th>
</tr>

<?php
include ("../../setup/db_setup.php");

$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

$gameid = $_GET['gameid'];
$query = "select sched.id as 'id', date_format(sched.date,'%c/%e/%y') as 'date', time_format(sched.time,'%h:%i %p') as 'time', team1.name as 'home', team2.name as 'away' from schedule sched join team team1 on sched.home = team1.id join team team2 on sched.away = team2.id where sched.id=$gameid";
$result = mysqli_query($connection, $query) or die ("Query failed");

while ($row = mysqli_fetch_assoc($result)) {
	$id = $row['id'];
	$date = $row['date'];
	$time = $row['time'];
	$home = $row['home'];
	$away = $row['away'];

	echo "<tr>";
	echo "	<td><strong>Game ID:</strong> $id</td>";
	echo "  <td><strong>Date:</strong> $date</td>";
	echo "  <td><strong>Time:</strong> $time</td>";
	echo "</tr>";
	echo "<tr>";
	echo "  <td><strong>Home Team:</strong> $home</td>";
	echo "  <td></td>";
	echo "  <td><strong>Away Team:</strong> $away</td>";
	echo "</tr>";
	}
	mysqli_free_result($result);
	mysqli_close($connection);
	?>

</table>


</body>
</html>
