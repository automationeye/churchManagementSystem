@extends('admin.admin.layouts.main')
@section('content')
<div class="container">
    <div class=" text-center my-3 ">
        <h2> <b> Schedule Meetings</b></h2>
    </div>
    <div class="container mt-5">

        <form>


            <div class="form-group">
                <label> Meeting Title :</label>
                <input type="text" class="form-control" value="" name="title">

            </div>


            <div class="form-group">
                <label>Meeting Details :</label>
                <input type="text" class="form-control" value=" " name="text">

            </div>

            <div class="form-group">

                <label for="meeting-date">Select Meeting Date and Time:</label>
                <input type="datetime-local" class="form-control" id="meeting-date" name="meeting-date">
            </div>
            <button type="submit" class="btn btn-primary">Schedule Meeting</button>
        </form>


        <!-- Meeting Table -->
        <h2 class="mt-5">Scheduled Meetings</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody id="meeting-table-body">
                <!-- Scheduled meetings will be inserted here -->
            </tbody>
        </table>
    </div>

</div>

<script>
    window.onload = function() {
        document.getElementById('meeting-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            // Get the values from the form
            const title = document.getElementById('meeting-title').value;
            const details = document.getElementById('meeting-details').value;
            const meetingDateTime = document.getElementById('meeting-date').value;
            // Split date and time
            const [date, time] = meetingDateTime.split('T');
            // Create a new table row with the meeting details
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${title}</td>
                <td>${details}</td>
                <td>${date}</td>
                <td>${time}</td>
            `;
            // Append the new row to the table body
            document.getElementById('meeting-table-body').appendChild(newRow);
            // Optionally, you can perform additional actions here, such as sending the data to a server
        });
    };
</script>



@endsection