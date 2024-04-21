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
     /* Add custom styles if needed */

/* General Styles */
.registration-form {
    max-width: 80%;
    margin: 150px auto 0 auto;
    padding: 20px;
    background-color: #dc3545; /* Semi-transparent background */
    border-radius: 10px;
    backdrop-filter: blur(10px); /* Blur effect */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Box shadow for depth */
}

.registration-form h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}

.registration-form label {
    display: block;
    margin-bottom: 10px;
    color: #fff;
}

.registration-form input[type="tel"],
.registration-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
}

.registration-form button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.registration-form button:hover {
    background-color: #0056b3;
}

.registration-form .form-group {
    margin-bottom: 20px;
}

.registration-form .form-group p {
    color: #fff;
    text-align: center;
    margin-top: 10px;
}

.registration-form .form-group a {
    font-weight: 700;
    color: #fff;
    text-decoration: none;
}

.registration-form .form-group a:hover {
    text-decoration: underline;
}

/* Media Query for Mobile */
@media (max-width: 576px) {
    .registration-form {
        max-width: 90%;
        margin-top: 50px; /* Adjusted margin for better appearance on mobile */
        padding: 15px; /* Adjusted padding for better appearance on mobile */
    }
}

/* Additional Styling for Computer View */
@media (min-width: 768px) {
    .registration-form {
        max-width: 400px; /* Adjusted width for better appearance on larger screens */
        margin-top: 150px; /* Adjusted margin for better appearance on larger screens */
    }
}



  </style>
</head>

<body>



  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="registration-form">

                  <h3 class="text-center">New Breed City Chapel </h3>
                  <h4 class="text-center">Team Leader </h4>
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

                    <br>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg w-100 " name="signin">
                    </div>
                    <p class=" login-form__footer"> <a href="/" class="text-primary"> </a></p>
                  </form>
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
