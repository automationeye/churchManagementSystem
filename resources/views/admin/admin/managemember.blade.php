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
        <table style="width:100%" class="table-hover text-center ">
            <tr class="bg-dark">
              
                <th>Members Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                      
                <th>Action</th>
            </tr>

            @foreach($members as $member)
            
                    <tr>
                        
                        <td>{{$member->id}}<td>
                        <td>{{$member->firstname}}<td>

                        <td>{{$member->lastname}}<td>
                      

                        <td>
                        @if($member->team_status==0)

                        <a href="/aprove/{{$member->id}}" class="btn btn-warning">Approve</a>

                        @else

                        <a href="/managemember" class="btn btn-success">Approved</a>

                        @endif
                        </td>
                        


                    </tr>

            @endforeach
        </table>
    </div>
</div>

@endsection