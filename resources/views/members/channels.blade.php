@extends('layouts.dashboard')
@section('title', 'Channels')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Channels</h5>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                    
                                <th>Expiry</th>
                                <th>Created at</th>
                              
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($channels as $key=>$channel)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $channel->channel_name }}</td>
                                    <td>{{ $channel->expiry }}</td>
                                    <td>{{ $channel->created_at }}</td>
                                  
                                   
                                </tr>
                            @endforeach
                            @if (count($channels) == 0)
                                <tr>
                                    <td colspan="6">No Channel found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $channels->links() }}
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