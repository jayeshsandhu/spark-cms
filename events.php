<?php 

include('dbconn/connect.php');
?>

<main>

<!-- Top events menu section -->
<div class='mdl-grid'>
	<button id="event_home" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
		Events Home
	</button>
	<button id="create_event" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
	Create Event
	</button>
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
		Button
	</button>
</div>
<div class='mdl-grid' id="content_events">
<?php

$sql = "SELECT * FROM events ORDER BY eventDate ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$id = $row["id"];
    	$eventName = $row["eventName"];
    	$eventDescription = $row["eventDescription"];
    	$eventDate = $row["eventDate"];
    	$id = $row['id'];


        // echo $id."<br>";
        // echo $eventName."<br>";
        // echo $eventDescription."<br>";

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

				<div class='mdl-card__supporting-text'>
				<button class="event_id mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="event_id" value="<?php echo $id ;?>">Event Page</button>
				</div>	
			</div>	
<?php
    }
} else {
	?>


        	<div class='mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col'>
        		<div class='mdl-card__title'>
        			<h2 class='mdl-card__title-text'>
        				Create an event
        			</h2>
        		</div>

				<div class='mdl-card__supporting-text'>
				Click below to create an event
				</div>

				<div class='mdl-card__supporting-text'>
				<a type='button' class="mdl-navigation__link" href="#" id="events"><i class="material-icons">event</i>Events</a>
				</div>
			</div>	
				<?php
    echo "0 results";
}

mysqli_close($conn);

?>


		
	</div>

</main>


<script type="text/javascript">

// Menu Navigation link functions
$(document).ready(function() {
	
});

	$("#event_home").click(function() {
		$("#content_inload").load('events.php');
	});

	$("#create_event").click(function() {
		$("#content_events").load('create_event.php');
	});

	$(".event_id").click(function() {
		var value = $(this).val();
		// for (var key in value) {
		// 	if (value.hasOwnProperty(key)) {
		// 		console.log(key + " -> " + value[key]);
		// 	}
		// }
		console.log('Event Id Clicked - ' + value);
		var postData = {
			'eventId'          : value
            // 'eventDate'           : $('input[name=eventDate]').val(),
            // 'eventDescription'    : $('textarea[name=eventDescription]').val()
        };
        $.post( "event_page.php", postData, function( data ) {
        	$( "#content_events" ).html( data );
        })
    });

</script>