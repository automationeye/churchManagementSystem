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
                                    <h4 class="text-center">Add New Admin</h4>
                                    <form method="POST" action="{{ url('leader/reg/post') }} ">

                                        <div class="form-group">
                                            <label>Full Name :</label>
                                            <input type="text" class="form-control" value=" " name="fullName" id="username" required>

                                        </div>


                                        <div class="form-group">
                                            <label>Phone Number :</label>
                                            <input type="tel" class="form-control" value=" " min="1" max="10" name="phone">

                                        </div>


                                        <div class="form-group">
                                            <label>Team :</label>
                                            <select class="form-control">
                                                <option> 1</option>
                                                <option> 2</option>
                                                <option> 3</option>
                                                <option> 4</option>
                                                <option> 5</option>
                                                <option> 6</option>
                                                <option> 7</option>
                                                <option> 8</option>
                                                <option> 9</option>
                                                <option> 10</option>
                                                <option> 11</option>
                                                <option> 12</option>
                                                <option> 13</option>
                                                <option> 14</option>
                                                <option> 15</option>
                                                <option> 16</option>
                                                <option> 17</option>
                                                <option> 18</option>
                                                <option> 19</option>
                                                <option> 20</option>
                                                <option> 21</option>
                                                <option> 22</option>
                                                <option> 23</option>
                                                <option> 24</option>
                                                <option> 25</option>
                                                <option> 26</option>
                                                <option> 27</option>
                                                <option> 28</option>
                                                <option> 29</option>
                                                <option> 30</option>
                                            </select>

                                        </div>






                                        <br>

                                        <button type="submit" class="btn btn-primary btn-block">Add</button>
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