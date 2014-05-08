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

<table id="schedule_table">
<tr>
	<th colspan="3">Scheduled Game Info</th>
</tr>
<tr>
	<td><strong>Game ID:</strong> 5</td>
	<td><strong>Date:</strong> 5/05/2014</td>
	<td><strong>Time:</strong> 6:45PM</td>
</tr>
<tr>
	<td><strong>Home Team:</strong> <em>HomeTeam</em></td>
	<td></td>
	<td><strong>Away Team:</strong> <em>AwayTeam</em></td>
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
		<option value="1">Justin Sturtz</option>
		<option value="2">Derek Something</option>
		</select>
	</td>
	<td>
		<select name="referee2">
		<option>Select referee</option>
		<option value="0">- No referee -</option>
		<option value="1">Justin Sturtz</option>
		<option value="2">Derek Something</option>
		</select>
	</td>
	<td>
		<select name="statkeeper">
		<option>Select statkeeper</option>
		<option value="0">- No statkeeper -</option>
		<option value="3">Dawn Gorelik</option>
		<option value="4">Valerie Natale</option>
		</select>
	</td>
	<td><input type="text" name="startTime"></td>
</tr>
<tr>
	<td><strong><em>Home</em> Score:</strong></td>
	<td><input type="text" name="homescore" maxlength="2" size="2"></td>
	<td><strong><em>Away</em> Score:</strong></td>
	<td><input type="text" name="awayscore" maxlength="2" size="2"></td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="shootout" value="homeSOL"> <em>Home team</em> Lost in Shootout</td>
	<td colspan="2"><input type="checkbox" name="shootout" value="awaySOL"> <em>Away Team</em> Lost in Shootout</td>
</tr>
<tr>
	<td colspan="2"><input type="checkbox" name="forfeit" value="homeforfeit"> <em>Home Team</em> Forfeited Game</td>
	<td colspan="2"><input type="checkbox" name="forfeit" value="awayforfeit"> <em>Away Team</em> Forfeited Game</td>
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
	<td colspan="2"><strong><em>Home Team's</em> Goalie</strong></td>
	<td colspan="2"><strong><em>Away Team's</em> Goalie</strong></td>
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