<!DOCTYPE html>
<html>
<head>
	<title>Des Moines Adult Hockey - DMAHockey.com</title>
	<link href="common/style.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
	<link type="text/css" rel="stylesheet" href="datatables/jquery.dataTables.css">
	<!-- jQuery -->
	<script type="text/javascript" charset="utf-8" src="datatables/jquery-1.8.2.min.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" charset="utf-8" src="datatables/jquery.dataTables.min.js"></script>

	<script type="text/javascript">

	/* This script will wait until the document has loaded, then format the
	data table. */
	$(document).ready(function(){
		//sorts data based on id number in modify column
		//$('#mailingList').dataTable( {"aaSorting": [[ 4, "asc" ]]});
		$('#standings').dataTable();
	});

	</script>
</head>

<body>

<div class="wrapper">

	<?php include 'common/header.php'; ?>

	<div class="middle">

		<div class="container">
			<main class="content">

			<h1>Standings</h1>

			<div class="tablecontainer">
			<table id="standings">
			<thead>
			  <tr>
			    <th>Team</th>
			    <th>GP</th>
			    <th>Wins</th>
			    <th>Losses</th>
			    <th>OTL</th>
			    <th>Pts</th>
			  </tr>
			</thead>

			<tbody>
			<?php
			// Include common db setup code
			include ("../setup/db_setup.php");

			// Pull all users from the database
			$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

			$query = "select t.name, (select count(*) from game join schedule on game.id = schedule.id where schedule.home=1 or schedule.away=1) as 'GP', (select count(*) from game as g join schedule as s on g.id = s.id where (t.id = s.home and g.homescore > g.awayscore) or (t.id = s.away and g.homescore < g.awayscore) or (t.id = s.home and g.awaysol = 1) or (t.id = s.away and g.homesol = 1)) as 'W', (select count(*) from game as g join schedule as s on g.id = s.id where (t.id = s.home and g.homescore < g.awayscore) or (t.id = s.away and g.homescore > g.awayscore)) as 'L', (select count(*) from game as g join schedule as s on g.id = s.id where (t.id = s.away and g.awaysol = 1) or (t.id = s.home and g.homesol = 1)) as 'SOL', ((select count(*) from game as g join schedule as s on g.id = s.id where (t.id = s.home and g.homescore > g.awayscore) or (t.id = s.away and g.homescore < g.awayscore) or (t.id = s.home and g.awaysol = 1) or (t.id = s.away and g.homesol = 1))*2) + (select count(*) from game as g join schedule as s on g.id = s.id where (t.id = s.away and g.awaysol = 1) or (t.id = s.home and g.homesol = 1)) as 'Pts'from team as t where season = 1";
			$result = mysqli_query($connection, $query) or die("Query failed");

	 		while ($row = mysqli_fetch_assoc($result)) {
	 			$teamname = $row['name'];
	 			$gamesplayed = $row['GP'];
	 			$wins = $row['W'];
	 			$losses = $row['L'];
	 			$otl = $row['SOL'];
	 			$points = $row['Pts'];

	 			echo "<tr><td>";
	 			echo htmlentities($teamname);
	 			echo "</td><td>";
	 			echo htmlentities($gamesplayed);
	 			echo "</td><td>";
	 			echo htmlentities($wins);
	 			echo "</td><td>";
	 			echo htmlentities($losses);
	 			echo "</td><td>";
	 			echo htmlentities($otl);
	 			echo "</td><td>";
	 			echo htmlentities($points);
	 			echo "</td></tr>";
	 		}
			mysqli_free_result($result);
	  		mysqli_close($connection);

	  		?>

			</tbody>
			</table>
			</div>
				


			</main><!-- .content -->
		</div><!-- .container-->
		<!-- left nav -->
		<?php include 'common/nav_menu.php'; ?>
	</div><!-- .middle-->
</div><!-- .wrapper -->


<!--<?php include 'common/footer.php'; ?>-->

</body>
</html>