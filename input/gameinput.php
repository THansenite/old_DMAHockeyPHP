<html>
<head>
	<link href="inputstyle.css" rel="stylesheet">

</head>
<body>
<h2>Game Input</h2>

<form action="gameinput_process.php" method="post">
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
	<td>
		<select name="referee1">
		<option>Select referee</option>
		<option value="0">- No referee -</option>
		<?php
		include ("../../setup/db_setup.php");

		// Pull statkeepers from the database
		$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

		$query = "SELECT s.id, concat(p.first, ' ', p.last) as 'name' FROM staff as s JOIN person as p ON s.person = p.id WHERE s.active = 1 AND s.job = 1 ORDER BY p.last, p.first";
		$result = mysqli_query($connection, $query) or die("Query failed");

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$name = $row['name'];

			echo "<option value=\"";
			echo htmlentities($id);
			echo "\">";
			echo htmlentities($name);
			echo "</option>";
		}
		mysqli_free_result($result);
		mysqli_close($connection);
		?>
		</select>
	</td>
	<td>
		<select name="referee2">
		<option>Select referee</option>
		<option value="0">- No referee -</option><?php
		include ("../../setup/db_setup.php");

		// Pull statkeepers from the database
		$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

		$query = "SELECT s.id, concat(p.first, ' ', p.last) as 'name' FROM staff as s JOIN person as p ON s.person = p.id WHERE s.active = 1 AND s.job = 1 ORDER BY p.last, p.first";
		$result = mysqli_query($connection, $query) or die("Query failed");

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$name = $row['name'];

			echo "<option value=\"";
			echo htmlentities($id);
			echo "\">";
			echo htmlentities($name);
			echo "</option>";
		}
		mysqli_free_result($result);
		mysqli_close($connection);
		?>
		</select>
	</td>
	<td>
		<select name="statkeeper">
		<option>Select statkeeper</option>

		<!-- TODO: Add option for no statkeeper -->
		<option value="0">- No statkeeper -</option>
		<?php
		include ("../../setup/db_setup.php");

		// Pull statkeepers from the database
		$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

		$query = "SELECT s.id, concat(p.first, ' ', p.last) as 'name' FROM staff as s JOIN person as p ON s.person = p.id WHERE s.active = 1 AND s.job = 2 ORDER BY p.last, p.first";
		$result = mysqli_query($connection, $query) or die("Query failed");

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$name = $row['name'];

			echo "<option value=\"";
			echo htmlentities($id);
			echo "\">";
			echo htmlentities($name);
			echo "</option>";
		}
		mysqli_free_result($result);
		mysqli_close($connection);
		?>
		
		</select>
	</td>
	<td><input type="text" name="startTime"></td>
</tr>
<tr>
	<td><strong><?php echo "$home"; ?> Score:</strong></td>
	<td><input type="text" name="homescore" maxlength="2" size="2"></td>
	<td><strong><?php echo "$away"; ?> Score:</strong></td>
	<td><input type="text" name="awayscore" maxlength="2" size="2"></td>
</tr>
<tr>
<fieldset>
	<td colspan="2"><input type="checkbox" name="situation[]" value="homeSOL"> <?php echo "$home"; ?> Lost in Shootout</td>
	<td colspan="2"><input type="checkbox" name="situation[]" value="awaySOL"> <?php echo "$away"; ?> Lost in Shootout</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="situation[]" value="homeforfeit"> <?php echo "$home"; ?> Forfeited Game</td>
	<td colspan="2"><input type="checkbox" name="situation[]" value="awayforfeit"> <?php echo "$away"; ?> Forfeited Game</td>
</fieldset>
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
<input type="submit" value="Submit" />

</body>
</html>
