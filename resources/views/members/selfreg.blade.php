<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newbreed member registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles if needed */
        .registration-form {
            max-width: 400px;
            max-height: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #dc3545;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="registration-form">
                    <h2 class="text-center mb-4">Karibu New Breed City Chapel</h2>
                    <!-- Inside your register.blade.php file -->

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

                    <!-- Your registration form goes here -->

                    <form method="post" action="{{ url('member/registration/post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="Firstname" style="color: white; font-weight: 400;">Firstname</label>
                            <input type="text" name="firstname" class="form-control" id="username" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname" style="color: white; font-weight: 400;">Lastname</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: white; font-weight: 400;">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" style="color: white; font-weight: 400;">Phone</label>
                            <input type="tel" min="1" max="10" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: white; font-weight: 400;">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-block">Register</button>

                        <br>

                        <div class="form-group">
                            <p style="color: white; font-weight: 400;"> Already Registered As A Member? <span style="font-weight: 700; cursor: pointer; color: blue;"> <a href="/member/login" style="color: blue; font-weight:800;"> Log In </a> </span> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>