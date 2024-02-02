@extends('layouts.dashboard')
@section('title', 'Channels')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Contributions</h5>
                    
                </div>
                <div class="card card-primary card-outline">
            <div class="card-header">
                
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>

                                <th>TransactionType</th>
                                <th>TransID</th>
                                <th>TransAmount</th>
                                <th>Member</th>
                                <th>Channel</th>
                                <th>Phone</th>
                                <th>FirstName</th>
                                <th>created at</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="8">No contributions found</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">

            </div>
        </div>
                <div class="d-flex justify-content-center">
               
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
                text: "You want to delete this channel!",
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