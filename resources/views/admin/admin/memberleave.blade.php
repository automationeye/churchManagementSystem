@extends('admin.admin.layouts.main')
@section('content')
<div class="container">


    <div class="">


        <div class="card-body">
            <div class="table-responsive">
                <h3 class="" style="text-align: center;">Leave Requests</h3>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Reason</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $leaves = App\Leave::all() ?>

                        @if(count($leaves)>0)

                        @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $leave->user_id }}</td>
                            <td>{{ $leave->firstname }}</td>
                            <td>{{ $leave->lastname }}</td>
                            <td>{{ $leave->from }}</td>
                            <td>{{ $leave->to }}</td>
                            <td>{{ $leave->reason }}</td>

                            <td>



                                <form action="" method="GET" style="display: inline;">
                                    <button type="submit" class="btn btn-info">Accept</button>
                                </form>


                                <form action="" method="GET" style="display: inline;">
                                    <button type="submit" class="btn btn-info">Reject</button>
                                </form>


                            </td>

                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="8">No Leave Request found</td>
                        </tr>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection