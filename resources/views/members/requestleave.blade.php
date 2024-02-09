@extends('layouts.dashboard')
@section('title', 'Leave request')

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
                <div class="card-header">
                    Leave Request Form
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('memberleaverequest') }}">
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
</div>

@endsection
