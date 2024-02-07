@extends('admin.admin.layouts.main')
@section('content')

<div class=container>
    <div class="row ">
        <div class="col-4 ">
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card shadow" style="width: 20rem;">

                <div class="card-body">
                    <h2 class="text-center mb-4">Admin Profile Details </h2>

                    <p class="card-text">Name: </p>
                    <p class="card-text">Email: </p>
                    <p class="card-text">Phone: </p>
                    <p class="card-text">Team: </p>
                    <p class="card-text">Age:
                    </p>

                    <p class="text-center">
                        <a href="" class="btn btn-outline-primary">Edit Profile</a>
                        <a href="" class="btn btn-outline-primary">Change Password</a>
                        <a href="" class="mt-2 btn btn-outline-primary">Change profile photo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection