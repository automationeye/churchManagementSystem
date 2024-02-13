@extends('layouts.dashboard')
@section('title', 'Channels')

@section('content')



<div class="page-title-wrap typo-white">
    <div class="page-title-wrap-inner section-bg-img" data-bg="images/page-title.jpg">
        <span class="theme-overlay"></span>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="title-wrap text-center">
            <div class="section-title">

                <h2 class="section-title margin-top-5">
                    <a href="/team">
                        Channels
                    </a>
                </h2>
                <span class="border-bottom center"></span>
            </div>
        </div>
    </div>
    <div class="col-md-3">




        <div class="ministries-box-style-2">
            <!-- Ministries Inner -->
            <div class="ministries-inner">
                <div class="ministries-thumb">
                    <img class="img-fluid squared w-100" src="web/rs-plugin/assets/nbc.jpg" width="360" height="240" alt="Agricultural Processing">
                </div>

                <!-- Ministries Content -->
                <div class="ministries-content pad-lr-30 pad-top-20">
                    <div class="ministries-title margin-bottom-15">
                        <h4 class="text-center"><a href="/channels" class="ministries-link">New Breed TV</a></h4>
                    </div>
                    <div class="ministries-desc text-center">
                        <p>Catch All Our Sermons and Programmes On This Platform.</p>
                    </div>
                    <div class="ministries-link margin-top-15 margin-bottom-30 text-center">
                        <a target="_blank" href="/channels" class="link">View</a>
                    </div>
                </div>
            </div>
            <!-- Ministries Inner Ends -->


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