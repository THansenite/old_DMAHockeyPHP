<html>
<head>
	<link href="inputstyle.css" rel="stylesheet">

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

	//mysqli_free_result($result);
	mysqli_close($connection);
	}
	?>

<tr>
  <td><strong>Game ID:</strong> <?php echo "$id"; ?></td>
  <td><strong>Date:</strong> <?php echo "$date"; ?></td>
  <td><strong>Time:</strong> <?php echo "$time"; ?></td>
</tr>
<tr>
  <td><strong>Home Team:</strong> <?php echo "$home"; ?></td>
  <td></td>
  <td><strong>Away Team:</strong> <?php echo "$away"; ?></td>
</tr>

<!-- 	echo "<tr>";
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
	?> -->


</table>

<br />

<table id="game_table">
<tr>
	<th colspan="4">Game Data</th>
</tr>
<tr>
	<td><strong>Referee 1</strong></td>
	<td><strong>Referee 2</strong></td>
	<td><strong>Statkeeper</strong></td>
	<td><strong>Start Time</strong></td>
</tr>
<tr>
	<td><strong><?php echo "$home"; ?> Score:</strong></td>
	<td><input type="text" name="homescore" maxlength="2" size="2"></td>
	<td><strong><?php echo "$away"; ?> Score:</strong></td>
	<td><input type="text" name="awayscore" maxlength="2" size="2"></td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="shootout" value="homeSOL"> <?php echo "$home"; ?> Lost in Shootout</td>
	<td colspan="2"><input type="checkbox" name="shootout" value="awaySOL"> <?php echo "$away"; ?> Lost in Shootout</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="forfeit" value="homeforfeit"> <?php echo "$home"; ?> Forfeited Game</td>
	<td colspan="2"><input type="checkbox" name="forfeit" value="awayforfeit"> <?php echo "$away"; ?> Forfeited Game</td>
</tr>
<tr colspan=4>
	<td>Game Notes:</td>
	<td colspan="3"><textarea name="gamenotes" cols="50" rows="5"></textarea></td>
</tr>
</table>

<br />

<table id="goalie_table">
<tr>
	<th colspan="4">Goalie Data</th>
</tr>
<tr>
	<td colspan="2"><strong><?php echo "$home"; ?> Goalie</strong></td>
	<td colspan="2"><strong><?php echo "$away"; ?> Goalie</strong></td>
</tr>
<tr>
	<td colspan="2">
		<select name="homegoalie">
		<option>Select goalie</option>
		<option>- No goalie -</option>
		<option>Tony Hansen</option>
		<option>Scott Anderson</option>
		<option>Rich Pentico</option>
		</select>
	</td>
	<td colspan="2">
		<select name="awaygoalie">
		<option>Select goalie</option>
		<option>- No goalie -</option>
		<option>Tony Hansen</option>
		<option>Scott Anderson</option>
		<option>Rich Pentico</option>
		</select>
	</td>
</tr>
<tr>
	<td><strong>Goals Scored on <em>GoalieName</em>:</strong></td>
	<td><input type="text" name="homeGA" maxlength="2" size="2"></td>
	<td><strong>Goals Scored on <em>GoalieName</em>:</strong></td>
	<td><input type="text" name="awayGA" maxlength="2" size="2"></td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="fullGame" value="homeGoalie" checked="true"> <em>GoalieName</em> played full game?</td>
	<td colspan="2"><input type="checkbox" name="fullGame" value="homeGoalie" checked="true"> <em>GoalieName</em> played full game?</td>
</tr>
</table>

</body>
</html>
