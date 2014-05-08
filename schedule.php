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
		$('#schedule').dataTable();
	});

	</script>
</head>

<body>

<div class="wrapper">

	<?php include 'common/header.php'; ?>

	<div class="middle">

		<div class="container">
			<main class="content">

			<h1>Schedule</h1>

			<div class="tablecontainer">
			<table id="schedule">
			<thead>
			  <tr>
			    <th>Date</th>
			    <th>Time</th>
			    <th>Home Team</th>
			    <th>Away Team</th>
			  </tr>
			</thead>

			<tbody>
			<?php
			// Include common db setup code
			include ("common/db_setup.php");

			// Pull all users from the database
			$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

			$query = "select date_format(sched.date,'%c/%e/%y') as 'date', time_format(sched.time,'%h:%i %p') as 'time', team1.name as 'home', team2.name as 'away' from schedule sched	join team team1	on sched.home = team1.id join team team2 on sched.away = team2.id";

	 		$result = mysqli_query($connection, $query) or die("Query failed");

	 		while ($row = mysqli_fetch_assoc($result)) {
	 			$date = $row['date'];
	 			$time = $row['time'];
	 			$home = $row['home'];
	 			$away = $row['away'];

	 			echo "<tr><td align=center>";
	 			echo htmlentities($date);
	 			echo "</td><td align=center>";
	 			echo htmlentities($time);
	 			echo "</td><td align=center>";
	 			echo htmlentities($home);
	 			echo "</td><td align=center>";
	 			echo htmlentities($away);
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

<!-- <?php include 'common/footer.php'; ?> -->

</body>
</html>