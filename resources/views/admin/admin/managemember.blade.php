@extends('admin.admin.layouts.main')
@section('content')
<style>
    table,
    th,
    td {
        border: 1px solid black;
        padding: 15px;
    }

    table {
        border-spacing: 10px;
    }
</style>

<div class=" bg-white shadow">
    <div class="">
        <div style="text-align: center;">
            <h4> Members</h4>
        </div>

        <div class="col-lg-10 col-lg-offset-2">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                // Automatically reload the page after 3 seconds if a success message is displayed
                setTimeout(function() {
                    location.reload();
                }, 500); // Adjust the delay (in milliseconds) as needed
            </script>
            @endif

            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
        </div>




        <form id="users-form" onsubmit="return false;">
            <div class="table-responsive">
                <table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name:</th>
                            <th>Last Name:</th>
                            <th>Email:</th>
                            <th>Phone:</th>
                            <th>Team:</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $members = App\Member::all() ?>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->firstname }}</td>
                            <td>{{ $member->lastname }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->team }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </form>


    </div>
</div>

@endsection