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
                            <th>#</th>

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Reason</th>
                            <th></th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $leaves = App\Leave::all() ?>

                        @if(count($leaves)>0)

                        @foreach($leaves as $leave)
                        @if($leave->status !== 1 && $leave->status !== 2)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $leave->firstname }}</td>
                            <td>{{ $leave->lastname }}</td>
                            <td>{{ $leave->from }}</td>
                            <td>{{ $leave->to }}</td>
                            <td>{{ $leave->reason }}</td>

                            <td>
                                <form action="{{ route('leave.accept', $leave->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Accept</button>
                                </form>

                                <form action="{{ route('leave.reject', $leave->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Reject</button>
                                </form>
                            </td>

                            <td>

                                @if($leave->status==0)
                                <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($leave->status==1)
                                <span class=" badge bg-success">Approved</span>
                                @else
                                <span class="badge bg-danger">Rejected</span>

                                @endif
                            </td>
                        </tr>
                        @endif
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