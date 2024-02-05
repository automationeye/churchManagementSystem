@extends('layouts.dashboard')

@section('content')

<div class="button-section margin-top-35">
    <a class="btn btn-default" href=" " title=" ">Select Team</a>
    @if(auth()->user()->team==null)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Select team
    </button>

    @else
    <h3>
        {{ auth()->user()->team }}

    </h3>
    @endif
    <p>My Team</p>

</div>


<br><br><br><br>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group" method="POST" action="{{url('update/team')}}">
                @csrf
                <div class="modal-body">

                    <div class="md-6">
                        <label for="teamSelect" class="form-label">Select Team</label>
                        <div class="col-md-2 mb-2">
                            <select class="form-control" id="teamSelect" name="team">
                                <option value="1">Team 1</option>
                                <option value="2">Team 2</option>
                                <option value="3">Team 3</option>
                                <option value="4">Team 4</option>
                                <option value="5">Team 5</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                    </div>



                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit for Approval</button>
            </form>
        </div>

    </div>
</div>
</div>



@endsection
@section('scripts')


<script>
    $(function() {

    });

    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this member!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteRecord' + id).submit();
            }
        })
    }
</script>



@endsection