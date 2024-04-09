<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newbreed member Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles if needed */



        .registration-form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #dc3545;
            border-radius: 10px;
            margin-top: 150px;
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

                    <form method="post" action="{{ url('member/login/post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="phone" style="color: white;">Phone Number</label>
                            <input type="tel" min="1" max="10" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: white;">Password</label>

                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>

                        <br>

                        <div class="form-group">
                            <p style="color: white;"> Not Yet A Member? <span style="font-weight: 700; cursor: pointer; color: blue;"> <a href="/member/registration" style="color: blue;">Register Here </a> </span> </p>
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