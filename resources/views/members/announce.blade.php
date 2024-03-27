@extends('layouts.dashboard')

@section('content')

<div class="page-title-wrap typo-white">
    <div class="page-title-wrap-inner section-bg-img" data-bg="images/page-title.jpg">
        <span class="theme-overlay"></span>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper pad-none">
    <div class="content-inner">

        <div class="row">
            <div class="col-lg-12">






                @if(auth()->user()->team==null && auth()->user()->team_status==0)

                <div class="card card-primary card-outline alert alert-danger" style="text-align: left;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <p>You are currently not enrolled to a team, Click here to select a team and join one today</p>
                </div>
                @elseif(auth()->user()->team_status==0)

                <div class="card card-primary card-outline alert alert-warning" style="text-align: left;">
                    You belong to team {{ auth()->user()->team }} but awaiting confirmation from admin
                </div>

                @else

                <div class="card card-primary card-outline alert alert-success" style="text-align: left;">
                    You belong to team {{ auth()->user()->team }}
                </div>

                @endif



                <div class="card card-primary card-outline alert alert-success">

                    <h4>Bishop Announcement</h4>
                    <span style="text-align:center;"> Welcome to New Breed City Chapel.</span>
                </div>

                @if ($bishopAnnouncements !== null && count($bishopAnnouncements) > 0)
                @foreach ($bishopAnnouncements as $announcement)
                <div class="bishop-announcement">
                    <!-- Display announcement posted by the Bishop here -->
                    <p>{{ $announcement->details }}</p>
                </div>
                @endforeach
                @else
                <p>No announcements posted by the Bishop.</p>
                @endif


                <div class="card card-primary card-outline alert alert-success">

                    <h4>Leader Announcement</h4>
                    <marquee> 📣 We are pleased to announce the marriage of brother benard which will happen on 14th feb
                        2024 at new breed chapel starting from 10am.</marquee>
                </div>

            </div>
        </div>


        <div class="row" style="margin-left: 15px;">
            <div class="col-md-3 card card-primary card-outline" style="margin-right: 135px;">
                <div class="card-header">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-add"></i> My Team
                    </button>
                </div>

                <div class="card-body">
                    <div class="inner">

                        @if(auth()->user()->team==null)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Select team
                        </button>

                        @else
                        <h3>
                            {{ auth()->user()->team }}

                        </h3>
                        @endif

                    </div>


                </div>

            </div>


            <!-- Check In and Check Out -->



            <div class="col-md-6 card card-primary card-outline">
                <div class="card-header">
                    <a href="#" id="attendanceButton" class="btn btn-primary btn-block" onclick="toggleTimer()">
                        <i class="fas fa-add"></i> <span id="buttonText">Check In</span>
                    </a>
                </div>

                <script>
                    var startTime;
                    var endTime;
                    var timerInterval;
                    var timerRunning = false;
                    var elapsedTime = {
                        hours: 0,
                        minutes: 0,
                        seconds: 0
                    };

                    function toggleTimer() {
                        if (!timerRunning) {
                            getLocation();
                        } else {
                            stopTimer();
                        }
                    }

                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(startTimer, handleLocationError);
                        } else {
                            console.log("Geolocation is not supported by this browser.");
                        }
                    }

                    function startTimer(position) {
                        timerRunning = true;
                        startTime = new Date();
                        document.getElementById("buttonText").innerText = "Check Out";
                        displayLocation(position);
                        timerInterval = setInterval(updateTimer, 1000);
                        console.log("Latitude:", position.coords.latitude);
                        console.log("Longitude:", position.coords.longitude);
                        // You can send this location data to your backend for recording
                    }

                    function stopTimer() {
                        clearInterval(timerInterval);
                        timerRunning = false;
                        endTime = new Date();
                        calculateTimeDifference();
                        document.getElementById("buttonText").innerText = "Check In";
                    }

                    function updateTimer() {
                        elapsedTime.seconds++;
                        if (elapsedTime.seconds >= 60) {
                            elapsedTime.seconds = 0;
                            elapsedTime.minutes++;
                            if (elapsedTime.minutes >= 60) {
                                elapsedTime.minutes = 0;
                                elapsedTime.hours++;
                            }
                        }
                        document.getElementById("timeInfo").innerText = "Total Time: " + formatTime(elapsedTime.hours) + ":" + formatTime(elapsedTime.minutes) + ":" + formatTime(elapsedTime.seconds);
                    }

                    function formatTime(time) {
                        return time < 10 ? "0" + time : time;
                    }

                    function calculateTimeDifference() {
                        var timeDifferenceInSeconds = Math.floor((endTime - startTime) / 1000);
                        elapsedTime.hours = Math.floor(timeDifferenceInSeconds / 3600);
                        elapsedTime.minutes = Math.floor((timeDifferenceInSeconds % 3600) / 60);
                        elapsedTime.seconds = timeDifferenceInSeconds % 60;
                        console.log("Time Difference (hours:minutes:seconds):", elapsedTime.hours + ":" + elapsedTime.minutes + ":" + elapsedTime.seconds);
                        // You can send this time difference to your backend for recording or display it on the frontend as needed
                    }

                    function displayLocation(position) {
                        var locationInfo = "Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude;
                        document.getElementById("locationInfo").innerText = "Location: " + locationInfo;
                    }

                    function handleLocationError(error) {
                        console.log("Error getting location:", error.message);
                        // You can handle the error here, e.g., display a message to the user
                    }
                </script>


                <div class="card-body">
                    <div class="inner">

                        <h9 id="locationInfo" class="card-title m-0"></h9>
                        <h5 id="timeInfo" class="card-title m-0"></h5>

                    </div>


                </div>

            </div>


        </div>





    </div>
</div>



@endsection
@section('scripts')






@endsection