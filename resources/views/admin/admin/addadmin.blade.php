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
                                <h4 class="text-center">Add New Admin</h4>
                                <form method="POST" action="{{ url('admin/registration/post') }} ">

                                    <div class="form-group">
                                        <label>Full Name :</label>
                                        <input type="text" class="form-control" value=" " name="firstname" id="username" required>

                                    </div>


                                    <div class="form-group">
                                        <label>Phone Number :</label>
                                        <input type="tel" class="form-control" value=" " min="1" max="10" name="phone">

                                    </div>


                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input type="email" class="form-control" value=" " name="email" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label>Password: </label>
                                        <input type="password" class="form-control" name="password" id="password">

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