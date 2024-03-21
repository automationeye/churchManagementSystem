@extends('layouts.app')

@section('title')
Member Registration
@endsection

@section('link')
<link href="{{ URL::asset('css/cam-style.css') }}" rel="stylesheet">
<!-- inline style -->
<style media="screen">
    .element {
        display: inline-flex;
        align-items: center;
    }

    i.fa-camera {
        margin: 10px;
        cursor: pointer;
        font-size: 30px;
    }

    i:hover {
        opacity: 0.6;
    }

    input {
        display: none;
    }
</style>
@endsection

@section('content')

<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Member Registration</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i><a href="{{ route('dashboard') }}"> Dashboard</a>
            </li>
            <li class="active">Registration</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel rounded-top" style="background-color: #e8ddd3;">
                    <div class="panel-heading">
                        <h1 class="text-center" style="padding-top:5px">Register Member</h2>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        @endif
                    </div>
                    <div class="row panel-body" style="background-color: #e8ddd3;">
                        <div class="" style="border:1pt solid #090c5e; border-radius:25px;">
                            <!-- BASIC FORM ELEMENTS -->
                            <!--===================================================-->
                            <form id="register-form" method="POST" action="{{ route('member.register') }}" class="panel-body form-horizontal form-padding" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <!--Static-->

                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">Title</label>
                                        <div class="col-md-9">
                                            <select name="title" class="selectpicker col-xs-6 col-sm-4 col-md-6 col-lg-9" style="padding-left:0px !important" data-style="btn-primary">
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Dr (Mrs)">Dr (Mrs)</option>
                                                <option value="Chief">Chief</option>
                                                <option value="Chief (Mrs)">Chief (Mrs)</option>
                                                <option value="Engr">Engr</option>
                                                <option value="Elder">Elder</option>
                                                <option value="Surveyor"> Surveyor</option>
                                                <option value="Oba">Oba</option>
                                                <option value="Olori">Olori</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">First Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" name="firstname" value="{{ old('firstname') }}" class="form-control" placeholder="Firstname" required>

                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" name="lastname" class="form-control" placeholder="Lastname" required>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">Date Of
                                            Birth</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Date of Birth" name="dob" class="datepicker form-control" />

                                        </div>
                                    </div>



                                    <!--Email Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-email-input">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="demo-email-input" class="form-control" name="email" placeholder="Enter your email">
                                            <!--small class="help-block">Please enter your email</small-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-email-input">Phone
                                            Number</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="phone" placeholder="Enter your phone number" required>
                                        </div>
                                    </div>
                                    <!--Text Input-->




                                    <!--Textarea-->

                                </div>
                                <div class="col-md-6">
                                    <?php $ipInfo = app('App\Http\Controllers\VisitorController')->ip_info(app('App\Http\Controllers\VisitorController')->getUserIP(), 'Location'); ?>
                                    <?php if ($ipInfo && $ipInfo['continent'] != 'Africa') { ?>

                                    <?php } ?>




                                    <div class="form-group pad-ve">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">

                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input id="demo-form-radio" class="magic-radio" value="male" type="radio" name="sex" checked>
                                                <label for="demo-form-radio">Male</label>
                                                <input id="demo-form-radio-2" class="magic-radio" value="female" type="radio" name="sex">
                                                <label for="demo-form-radio-2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pad-ver">
                                        <label class="col-md-3 control-label">Marital Status</label>
                                        <div class="col-md-9">
                                            <div class="radio">
                                                <!-- Inline radio buttons -->
                                                <input id="demo-inline-form-radio" class="magic-radio" value="single" type="radio" name="marital_status" checked>
                                                <label for="demo-inline-form-radio">Single</label>

                                                <input id="demo-inline-form-radio-2" class="magic-radio" value="married" type="radio" name="marital_status">
                                                <label for="demo-inline-form-radio-2">Married</label>
                                            </div>
                                        </div>
                                    </div>






                                    <!-- <div class="row">
                                        <div class="col-md-3" style="padding-top:50px">
                                            <button class="btn btn-info pull-center" type="submit">REGISTER MEMBER</button>
                                        </div>
                                    </div>  !-->
                                    <div class="form-group" style="padding-top:50px">
                                        <div class="col-md-9">
                                            <span class=" pull-right">
                                                <button id="submit" class="btn btn-info pull-center" type="submit">REGISTER MEMBER</button>
                                            </span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class=" pull-left">
                                                <button class="btn-danger" onclick="resetForm('#register-form')">reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- END BASIC FORM ELEMENTS -->
                    <!--Default Bootstrap Modal-->
                    <!--===================================================-->


                    <!--===================================================-->
                    <!--End Default Bootstrap Modal-->
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

@endsection

@section('js')
<script src="{{ URL::asset('js/cam/DetectRTC.min.js') }}"></script>
<script src="{{ URL::asset('js/cam/adapter.min.js') }}"></script>
<script src="{{ URL::asset('js/cam/screenfull.min.js') }}"></script>
<script src="{{ URL::asset('js/cam/howler.core.min.js') }}"></script>
<script src="{{ URL::asset('js/cam/main.js') }}"></script>
<script>
    function uploadImg() {
        var input = document.querySelector('input[type=file]');
        var file = input.files[0];
        var form = new FormData(),
            xhr = new XMLHttpRequest();
        form.append('photo', blobs || file);
        form.append('_token', "{{ csrf_token() }}");
        xhr.open('post', "{{ route('member.upload.img') }}", true);
        xhr.send(form);
    }
    $(document).ready(function() {
        // Upload file section
        // $("i").click(function () {
        //   $("input[type='file']").trigger('click');
        // });

        $('input[type="file"]').on('change', function() {
            var val = $(this).val();
            $(this).siblings('span').text(val);
        })

        //new
        var input = document.querySelector('input[type=file]'); // see Example 4

        input.onchange = function() {
            var file = input.files[0];

            // upload(file);
            drawOnCanvas(file); // see Example 6
            // displayAsImage(file); // see Example 7
        };

        // toggle Anniversary
        $('input:radio[name="marital_status"]').change(
            function() {
                if (this.checked && this.value == 'married') {
                    $('#wedding').show();
                    $("#anniversary").prop('required', true);
                } else {
                    $('#wedding').hide();
                    $("#anniversary").prop('required', false);
                }
            });
        // toggle member since date
        $('#member_since').change(function() {
            let today = new Date();
            let member_date = this.value;
            let lastWeek = Date.parse(new Date(today.getFullYear(), today.getMonth(), today.getDate() -
                7));
            //check if date within 7 days
            //If nextWeek is smaller (earlier) than the value of the input date, alert...
            if (lastWeek > Date.parse(member_date)) {
                $('#member_status').val('old');
                $('#member_status').selectpicker('render');
                $('#member_status_div').show();
            } else {
                $('#member_status').val('new');
                $('#member_status').selectpicker('render');
                $('#member_status_div').show();
            }
        });

        // handle register form submission
        $('#register-form').on('submit', (e) => {
            e.preventDefault()
            toggleAble('#submit', true, 'registering member...')
            // let data = {}
            let input = document.querySelector('#img-input')
            data = $('#register-form').serializeArray()
            //send to db route
            $.ajax({
                    url: "{{ route('member.register') }}",
                    data,
                    type: 'POST'
                })
                .done((res) => {
                    if (res.status) {
                        swal("Success!", res.text, "success");
                        uploadImg()
                        resetForm('#register-form')
                        resetImgUpl()
                        toggleAble('#submit', false)
                    } else {
                        swal("Oops", res.text, "error");
                        toggleAble('#submit', false)
                    }
                })
                .fail((e) => {
                    swal("Oops", "Internal Server Error", "error");
                    toggleAble('#submit', false)
                    console.log(e);
                })
        })
    });
    let html = `<div class="form-group">
					<label class="col-md-3 control-label">Relative</label>
					<div class="col-md-9">
					<button id="add-relative-btn"  class="btn btn-danger"type="button">Add Relative</button>
					</div>
				</div>`;
    $('#add-relative-btn').on('click', function() {

        $('#open-modal-btn').trigger('click');


        //$('#add-relative-btn').parents('.form-group').after(html)
    })

    function remove_relative(id) {

        $(`#container_relative_${id}`).remove()
    }

    function add_relative(id, name) {
        $('#add-relative-btn').parents('.form-group').after(`<div class="form-group" id="container_relative_${id}">
					<label class="col-md-3 control-label">Added Relative</label>
					<div class="col-md-9">
	        <input  value="${name}" readonly>
	        <input name="relative_${id}" value="${id}" hidden=hidden>
					<select name="relationship_${id}" class="selectpicker" style="border:1px solid #ccc;display:inline !important;outline:none" data-style="btn-success" required>
					<option value="relative">Relationship</option>
						<option value="husband">Husband</option>
						<option value="wife">Wife</option>
						<option value="brother">Brother</option>
						<option value="sister">Sister</option>
						<option value="father">Father</option>
						<option value="mother">Mother</option>
						<option value="son">Son</option>
						<option value="daughter">Daughter</option>
					</select>
					<button  class="btn btn-xs btn-danger"type="button" onClick="remove_relative(${id})">Remove Relative</button>
					</div>
				</div>`)

        $('#close-modal-btn').trigger('click');
        $('#relatives-result-container').html('')
        $('#search-relative-input').val('')

    }
    $('#search-relative-input').on('keyup', function() {
        //alert('hello')
        $('#relatives-result-container').html(
            '<img class="center-block" width="50" height="50" src="../images/spinner.gif"/>')
        let search_term = $('#search-relative-input').val()
        $.ajax({
            url: `../get-relative/${search_term}`,

        }).done(function(data) {
            console.log(data.result)
            //console.log(typeof data)
            $('#relatives-result-container').html('')

            if (typeof data.result == 'string' || data.result.message) {
                $('#relatives-result-container').html(
                    '<span style="height:50px" class="text-info">No result found</span>')
                return
            }
            console.log(typeof data.result)
            for (let person in data.result) {
                console.log(data.result[person])
                let table = `<div class="col-md-12" style="margin-bottom:10px"><span class="text-info" style="margin-right:30px;width:100px !important">${data.result[person].firstname} ${data.result[person].lastname}</span> <button onClick="add_relative(${data.result[person].id},'${data.result[person].firstname} ${data.result[person].lastname}' )" type="button" class="btn-sm btn btn-info select-relativ
	e">Select Relative</button></div>
							`;
                $('#relatives-result-container').append(table)
            }
        }).fail(function() {
            $('#relatives-result-container').html(
                '<span style="height:50px" class="text-info">No result found</span>')
        })
    })

    $(document).ready(() => {
        init()
    })

    //--------------------
    // GET USER MEDIA CODE
    //--------------------
    navigator.getUserMedia = (navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);

    var video;
    var webcamStream;

    // function startWebcam() {
    // 	if (navigator.getUserMedia) {
    // 		 navigator.getUserMedia (
    //
    // 				// constraints
    // 				{
    // 					 video: true,
    // 					 audio: false
    // 				},
    //
    // 				// successCallback
    // 				function(localMediaStream) {
    // 						video = document.querySelector('video');
    // 					 video.src = window.URL.createObjectURL(localMediaStream);
    // 					 webcamStream = localMediaStream;
    // 				},
    //
    // 				// errorCallback
    // 				function(err) {
    // 					 console.log("The following error occured: " + err);
    // 				}
    // 		 );
    // 	} else {
    // 		 console.log("getUserMedia not supported");
    // 	}
    // }

    function stopWebcam() {
        // if (webcamStream) {
        //    webcamStream.getTracks().forEach(function (track) { track.stop(); });
        // }
        if (window.stream) {
            window.stream.getTracks().forEach(function(track) {
                track.stop();
            });
        }
        // webcamStream.stop();
    }
    //---------------------
    // TAKE A SNAPSHOT CODE
    //---------------------
    var canvas, ctx;

    function init() {
        // Get the canvas and obtain a context for
        // drawing in it
        canvas = document.getElementById("myCanvas");
        ctx = canvas.getContext('2d');
    }

    function snapshot() {
        // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    }
</script>
@endsection