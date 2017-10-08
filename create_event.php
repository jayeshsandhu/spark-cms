<!-- create event  -->
<?php 
include('dbconn/connect.php');

if ($_POST) {

	var_dump($_POST);
	echo "Received Post Success!";

	$eventTitle = mysqli_real_escape_string($conn,  $_POST['eventTitle']);
	$eventDate = mysqli_real_escape_string($conn,  $_POST['eventDate']);
	$eventDescription = mysqli_real_escape_string($conn,  $_POST['eventDescription']);
	// echo 'Event Title - '.$eventTitle.\n.'  Event Date - '.$eventDate.\n.'Event Description - '.$eventDescription;

	$sql_event = "INSERT INTO events (eventName, eventDate, eventDescription) VALUES ('$eventTitle', '$eventDate', '$eventDescription')";
	echo $sql_event;
	$result = $conn->query($sql_event);
	if ($result){
		echo "Successfully Updated Database";
	} else{
		echo "Database update failed";
	}

}else{
	//echo "No Post";
}
 ?>


<form id="create_event_form" action="" method="post">
	<div class="mdl-card mdl-shadow--2dp" style="width: 90%; padding: 2%">
		<div class="mdl-card__title">
			<h2 class="mdl-card__title-text">Create Event</h2>
		</div>
		<div class="mdl-card__supporting-text">
			This is the area where you describe the event, give it a title and provide further information, such as where and when.
		</div>
		<div class="mdl-card__supporting-text">
			<div class="mdl-textfield mdl-js-textfield">
				<input class="mdl-textfield__input" type="text" name="eventTitle" id="sample1" placeholder="Event Title">
				<!-- <label class="mdl-textfield__label" for="sample1">Event Title</label> -->
			</div>
		</div>
		<div class="mdl-card__supporting-text">
			<div class="mdl-textfield mdl-js-textfield">
				<input class="mdl-textfield__input" type="date" id="sample1" name="eventDate" placeholder="Select a date">
			</div>
		</div>
		<div class="mdl-card__supporting-text">
			<div class="mdl-textfield mdl-js-textfield">
				<textarea class="mdl-textfield__input" type="text" rows="5" id="sample1" name="eventDescription"></textarea>
				<label class="mdl-textfield__label" for="sample1">Event Description</label>
			</div>
		</div>

		<div class="mdl-card__actions">
			<input class="mdl-button mdl-js-button" type="submit" name="Submit">
		</div>
	</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		});

    // process the form
    $('#create_event_form').submit(function(event) {
    	// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var data = {
            'eventTitle'              : $('input[name=eventTitle]').val(),
            'eventDate'             : $('input[name=eventDate]').val(),
            'eventDescription'    : $('textarea[name=eventDescription]').val()
        };
        console.log('Processing Form');
        console.log(data); 
        // post the form data with jquery / ajax
        $.post( "create_event.php", data, function( data ) {
  			console.log(data);
  			alert('Success');
		})
         // using the done promise callback
        .done(function(data) {
                // log data to the console so we can see
                console.log('submitted post');
                $("#content_inload").load('events.php');
        // here we will handle errors and validation messages
        })
        .fail(function(e) {
        console.log(e); 
	    alert('error');
	  	})
	  	.always(function() {
	    alert( "finished" );
	 	 });
        
    });
</script>
