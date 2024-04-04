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
                    <p class="card-text">Team: {{ $user->team }}</p>



                </div>

            </div>
        </div>
    </div>
</div>
@endsection