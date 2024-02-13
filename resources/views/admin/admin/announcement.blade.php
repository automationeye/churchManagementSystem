@extends('admin.admin.layouts.main')
@section('content')




<div style="">
    <div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                                <h4 class="text-center">Create Announcement</h4>
                                <form method="POST" action=" {{ url('announcement/post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label> Announcement Details :</label>
                                        <input type="text" class="form-control" value="" name="details">

                                    </div>


                                    <div class="form-group">
                                        <label>By Who :</label>
                                        <input type="text" class="form-control" value=" " name="by_who">

                                    </div>

                                    <div class="form-group">
                                        <label for="start-date">Select Start Date:</label>
                                        <input type="date" class="form-control" id="start-date" name="start_date">
                                    </div>

                                    <div class="form-group">
                                        <label for="stop-date">Select Stop Date:</label>
                                        <input type="date" class="form-control" id="stop-date" name="stop_date">
                                    </div>

                                    <div class="form-group">
                                        <label for="start-time">Select Start Time:</label>
                                        <input type="time" class="form-control" id="start-time" name="start_time">
                                    </div>

                                    <div class="form-group">
                                        <label for="stop-time">Select Stop Time:</label>
                                        <input type="time" class="form-control" id="stop-time" name="stop_time">
                                    </div>

                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group">
                                            <input type="submit" value="Save" class="btn btn-primary w-20 " name="save_changes">
                                        </div>
                                        <div class="input-group">
                                            <a href="" class="btn btn-primary w-20">Close</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection