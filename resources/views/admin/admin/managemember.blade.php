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

<div class="container bg-white shadow">
    <div class="py-4 mt-5">
        <div class='text-center pb-2'>
            <h4> Members</h4>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Team</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <th scope="row">{{$member->id}}</th>
                    <td>{{$member->firstname}}</td>
                    <td>{{$member->team}}</td>

                    <td>
                    @if($member->team_status==0)
                  
                        <a href="{{url('approve')}}/{{$member->id}}" class="btn btn-warning">Approve</a>
                
                    @else
                   
                    <a href="/" class="btn btn-success">Approved</a>

                    <a href="{{url('remove')}}/{{$member->id}}" class="btn btn-info">Remove member</a>
                    
                    
                    @endif
                    </td>
                 
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>

@endsection
