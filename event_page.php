<!-- Hello! This is a test message -->

<?php 
include('dbconn/connect.php');

if ($_POST) {
	//var_dump($_POST);
	$eventId = mysqli_real_escape_string($conn, $_POST['eventId']);

	$sql = "SELECT * FROM events WHERE id = '$eventId'";

	if ($result=mysqli_query($conn,$sql))
	{
	//echo "results true";
	//var_dump($result);
  // Fetch one and one row
		$row = mysqli_fetch_assoc($result);

	//var_dump($row);
    //assign variables
		$eventName = $row["eventName"];
		$eventDescription = $row["eventDescription"];
		$eventDate = $row["eventDate"];

  // Free result set
		mysqli_free_result($result);
	}
}


?>

        	<div class='mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col'>
        		<div class='mdl-card__title'>
        			<h2 class='mdl-card__title-text'>
        				<?php echo $eventName; ?>
        			</h2>
        		</div>

				<div class='mdl-card__supporting-text'>
				<?php echo $eventDate; ?>
				</div>

				<div class='mdl-card__supporting-text'>
				<?php echo $eventDescription; ?>
				</div>

			
			</div>	







<!-- 

	<div class="mdl-card mdl-shadow--4dp" style="width: 90%; padding: 2%">
		<div class="mdl-card__title">
			<h2 class="mdl-card__title-text">Create Event</h2>
		</div>
		<div class="mdl-card__supporting-text">
		<h4 class="mdl-card__title-text">Description</h4>
			This is the area where you describe the event, give it a title and provide further information, such as where and when.
		</div>
		<div class="mdl-card__supporting-text">

		</div>
		<div class="mdl-card__supporting-text">

		</div>

		<div class="mdl-card__actions">
			<input class="mdl-button mdl-js-button" type="submit" name="Submit">
		</div>
	</div> -->