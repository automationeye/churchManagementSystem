@extends('layouts.dashboard')
@section('title', 'Attendance')

@section('content')


<div class="page-title-wrap typo-white">
    <div class="page-title-wrap-inner section-bg-img" data-bg="web/rs-plugin/assets/global.jpg">
        <span class="theme-overlay"></span>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 content-wrapper pad-none">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="text-align: center; color:black; font-weight:700;">
                    Attendance
                </div>
                <div class="card-body" style=" color:black; font-weight:700;">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="fromDate" class="form-label">From:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="toDate" class="form-label">To:</label>
                            <input type="date" class="form-control" id="toDate" name="toDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason:</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>
</div>

@endsection