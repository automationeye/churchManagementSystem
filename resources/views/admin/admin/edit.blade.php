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
                                <h4 class="text-center">Edit Your Profile</h4>
                                <form method="POST" action=" ">

                                    <div class="form-group">
                                        <label>Full Name :</label>
                                        <input type="text" class="form-control" value="" name="name">

                                    </div>


                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input type="email" class="form-control" value=" " name="email">

                                    </div>

                                    <div class="form-group">
                                        <label>Date-of-Birth :</label>
                                        <input type="date" class="form-control" value=" " name="dob">

                                    </div>




                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group">
                                            <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes">
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