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

			<h1>FoDM/KB</h1>

			<div class="tablecontainer">
			<table id="standings">
			<thead>
			  <tr>
			    <th>First</th>
			    <th>Last</th>
			    <th>Goals</th>
			    <th>Assists</th>
			    <th>PM</th>
			  </tr>
			</thead>

			<tbody>
			<?php
			// Include common db setup code
			include ("common/db_setup.php");

			// Pull all users from the database
			$connection = mysqli_connect($server, $username, $password, $database) or die ("Connection failed");

			$query = "SELECT per.first, per.last, count(g.scorer) as 'goals', (select count(*) from goal as g2 where pla.id = g2.assist1) + (select count(*) from goal as g3 where pla.id = g3.assist2) as 'assist', TIME_FORMAT(sum(p.duration),'%i:%s') as 'penalty'from player as pla join person as per on per.id = pla.person left join goal as g on pla.id = g.scorer left join penalty as p on pla.id = p.player where pla.team = 2 group by per.last, per.first "; $result = mysqli_query($connection, $query) or die("Query failed");

	 		while ($row = mysqli_fetch_assoc($result)) {
	 			$first = $row['first'];
	 			$last = $row['last'];
	 			$goals = $row['goals'];
	 			$assists = $row['assist'];
	 			$penalty = $row['penalty'];

	 			echo "<tr><td>";
	 			echo htmlentities($first);
	 			echo "</td><td>";
	 			echo htmlentities($last);
	 			echo "</td><td align=center>";
	 			echo htmlentities($goals);
	 			echo "</td><td align=center>";
	 			echo htmlentities($assists);
	 			echo "</td><td align=center>";
	 			echo htmlentities($penalty);
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