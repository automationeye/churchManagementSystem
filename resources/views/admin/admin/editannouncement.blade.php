@extends('admin.admin.layouts.main')
@section('content')



<div style="">
    <div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-10">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">
                                <h4 class="text-center">Edit Announcement</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Announcement Title</th>
                                            <th>By Who</th>
                                            <th>Start Date</th>
                                            <th>Stop Date</th>
                                            <th>Start Time</th>
                                            <th>Stop Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $announcements = App\Announcement::where('by_who', 'Leader')->get(); ?>
                                        @foreach($announcements as $announcement)
                                        <tr>
                                            <td>{{ $announcement->details }}</td>
                                            <td>{{ $announcement->by_who }}</td>
                                            <td>{{ $announcement->start_date }}</td>
                                            <td>{{ $announcement->stop_date }}</td>
                                            <td>{{ $announcement->start_time }}</td>
                                            <td>{{ $announcement->stop_time }}</td>

                                            <td>



                                                <form action="{{ route('delete-announcement', ['announcement' => $announcement->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure you want to delete this announcement?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
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

@endsection