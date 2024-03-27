@extends('admin.admin.layouts.main')
@section('content')

<div class=container>
    <div class="row ">
        <div class="col-4 ">
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card shadow" style="width: 20rem;">

                <div class="card-body">
                    <h2 class="text-center mb-4"> Admin Profile Details</h2>

                    <p class="card-text">Name: {{ $user->fullName }}</p>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Phone: {{ $user->phone }}</p>



                    <p class="text-center">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
                        <a href="{{ route('admin.password.change') }}" class="btn btn-outline-primary">Change Password</a>
                        <a href="{{ route('admin.profile.photo.change') }}" class="mt-2 btn btn-outline-primary">Change Profile Photo</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection