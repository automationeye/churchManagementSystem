<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="admin/resorce/css/style.css" rel="stylesheet">

  <title>Admin Login </title>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bg {

      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: darkslateblue;

    }
  </style>
</head>

<body>



  <div class="">
    <div class="login-form-bg h-100">
      <div class="container mt-5 h-100">
        <div class="row justify-content-center h-100">
          <div class="col-xl-6">
            <div class="form-input-content">
              <div class="card login-form mb-0">
                <div class="card-body pt-5 shadow">

                  <h4 class="text-center">Admin </h4>
                  <div class="text-center my-5">



                  </div>

                  @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                  @endif

                  @if(session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif

                  <form method="POST" action=" {{ url('leader/login/post') }}">

                    @csrf

                    <div class="form-group">
                      <label>Phone Number:</label>
                      <input type="tel" class="form-control" value="" name="phone">

                    </div>

                    <div class="form-group">
                      <label>Password:</label>
                      <input type="password" class="form-control" name="password">


                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg w-100 " name="signin">
                    </div>
                    <p class=" login-form__footer"> <a href="/" class="text-primary"> </a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="./resorce/plugins/common/common.min.js"></script>
  <script src="./resorce/js/custom.min.js"></script>
  <script src="./resorce/js/settings.js"></script>
  <script src="./resorce/js/gleek.js"></script>
  <script src="./resorce/js/styleSwitcher.js"></script>
</body>

</html>