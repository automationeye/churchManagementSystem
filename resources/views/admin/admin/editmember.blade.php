@extends('admin.admin.layouts.main')
@section('content')





<div style="">
    <div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">
                                <h4 class="text-center">Edit Employee profile</h4>
                                <form method="POST" action=" ">

                                    <div class="form-group">
                                        <label>Full Name :</label>
                                        <input type="text" class="form-control" value="" name="name">

                                    </div>


                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input type="email" class="form-control" value="" name="email">

                                    </div>

                                    <div class="form-group">
                                        <label>Password: </label>
                                        <input type="password" class="form-control" value="" name="pass">

                                    </div>


                                    <div class="form-group">
                                        <label>Date-of-Birth :</label>
                                        <input type="date" class="form-control" value="" name="dob">

                                    </div>

                                    <div class="form-group form-check form-check-inline">
                                        <label class="form-check-label">Gender :</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" selected>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Other">
                                        <label class="form-check-label">Other</label>
                                    </div>


                                    <br>

                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
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