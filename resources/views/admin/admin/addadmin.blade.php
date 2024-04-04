@extends('admin.admin.layouts.main')
@section('content')



<div class="addmember">
    <div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-10">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">
                                <h4 class="text-center">Add Team Member</h4>
                                <div class="tablet">
                                    <table class="table  table-hover">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Tel. No</th>

                                                <th scope="col"> Email</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $leaders = App\Leaders::all() ?>
                                            @foreach($leaders as $leader)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $leader->fullName }}</td>
                                                <td>{{ $leader->team }}</td>
                                                <td>{{ $leader->phone }}</td>
                                                <td>{{ $leader->email }}</td>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection